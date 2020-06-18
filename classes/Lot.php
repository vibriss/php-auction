<?php

class Lot{
    protected $_id;
    protected $_user_id;  
    protected $_login;  
    protected $_name;
    protected $_description;
    protected $_price;
    protected $_winner_id;
    protected $_start_time;
    protected $_end_time;

    public function __construct($id) {
        $lot = DB::getInstance()->select_one('SELECT * FROM lots JOIN users ON(lots.user_id = users.id) WHERE lots.id = ?', [$id]);
        if (!$lot) {
            throw new Exception("лот с id = $id отсутствует в базе");
        }
        $this->_id = $id;
        $this->_user_id = $lot['user_id'];
        $this->_login = $lot['login'];
        $this->_name = $lot['name'];
        $this->_description = $lot['description'];
        $this->_price = $lot['price'];
        $this->_start_time = $lot['start_time'];
        $this->_end_time = $lot['end_time'];
    }

    public function get_id() {
        return $this->_id;
    }
    
    public function get_user_id() {
        return $this->_user_id;
    }
    
    public function get_login() {
        return $this->_login;
    }
    
    public function get_name() {
        return $this->_name;
    }
    
    public function get_description() {
        return $this->_description;
    }
    
    public function get_images() {
        return Image::get_images($this->_id);
    }
    
    public function get_price() {
        return $this->_price;
    }
    
    public function get_winner() {
        return (User::get_by_id(Bid::get_winner_id($this->_id)));
    }
    
    public function get_start_time() {
        return $this->_start_time;
    }
    
    public function get_end_time() {
        return $this->_end_time;
    }
    
    public function get_time_to_end() {
        $now = new DateTime();
        $end = new DateTime($this->get_end_time());
        $interval = $now->diff($end);
        if (!$interval->invert) {
            return $interval->format('%H:%i:%s');
        }
        return null;
    }
    
    public static function add( 
        $login,
        $name,
        $description,
        $start_price,
        $lifetime,
        $files = []
    ) {
        $result = new Result;
        $name = trim($name);
        $description = trim($description);
        $start_price = trim($start_price);
        $files = normalize_files_array($files);

        if (!strlen($name)) {
            $result->add_error('необходимо указать название');     
        }
        
        if (!strlen($lifetime)) {
            $result->add_error('необходимо указать время лота');
        }
        
        if (!strlen($start_price)) {
            $result->add_error('необходимо указать начальную цену');     
        }
        
        if (!preg_match('/^[0-9]+$/', $start_price)) {
            $result->add_error('в цене допускаются только цифры');
        }
        
        if (!preg_match('/^[0-9]+$/', $lifetime)) {
            $result->add_error('во времени лота допускаются только цифры');
        }
        
        if (!$result->is_successful()) {
            return $result;
        }
        
        $time = new DateTime;
        $time->add(new DateInterval("PT{$lifetime}M"));
                
        $lot_id = DB::getInstance()->insert(
            'INSERT INTO lots ('
                . 'user_id, '
                . 'name, '
                . 'description, '
                . 'price, '
                . 'end_time'
            . ') values ('
                . ':user_id,'
                . ':name, '
                . ':description, '
                . ':price, '
                . ':end_time'
            . ')',
            [
                'user_id'     => User::get_user_id_by_login($login),
                'name'        => $name,
                'description' => $description,
                'price'       => $start_price,
                'end_time'    => $time->format('Y-m-d H:i:s')
            ]
        );
        
        foreach ($files as $file) {
            $result->add_result(Image::add($file, $lot_id));
        }

        $result->add_message('лот добавлен');
        return $result;
    }
    
    public function edit($name, $description, $image_ids = [], $files = []) {
        $result = new Result;
        $name = trim($name);
        $description = trim($description);
        $files = normalize_files_array($files);
        if (strlen($name)) {
            DB::getInstance()->update('UPDATE lots SET name = ? WHERE id = ?', [$name, $this->_id]);
            $result->add_message('название сохранено');
        } else {
            $result->add_warning('необходимо указать название');     
        }
        
        DB::getInstance()->update('UPDATE lots SET description = ? WHERE id = ?', [$description, $this->_id]);
        $result->add_message('описание сохранено');
        
        foreach ($image_ids as $image_id) {
            $image = new Image($image_id);
            $image->delete();
            $result->add_message('картинка удалена');
        }
 
        foreach ($files as $file) {
            $result->add_result(Image::add($file, $this->_id));
        }
       
        return $result;
    }
    
    public function stop() { 
        $result = new Result;
        $result->set_source($this->_id);
        
        if ($this->get_login() == $_SESSION['login']) {
            DB::getInstance()->update('UPDATE lots SET end_time = current_timestamp WHERE id = ?', [$this->_id]);
            $result->add_message("лот {$this->_name} завершён");
        } else {
            $result->add_error('нельзя завершить лот чужого пользователя');
        }
        return $result;
    }
    
    public function delete() { 
        $result = new Result;

        $images = Image::get_images($this->_id);
        if (!empty($images)){
            foreach ($images as $image) {
                $image->delete();
            }
        }

        Bid::delete_all($this->_id);
        
        DB::getInstance()->delete('DELETE FROM lots WHERE id = ?', [$this->_id]);
        
        $result->add_message("лот {$this->_name} удалён");
        return $result;
    }
    
    public function place_bid($bid, $user) {
        $result = new Result;
        $result->set_source($this->_id);
        $bid = trim($bid);
               
        if (!$user->get_id()) {
            $result->add_error('нелья сделать ставку без учетной записи');
            return $result;
        }
        
        if ($user->get_login() == $this->_login) {
            $result->add_error('нелья сделать ставку на свой лот');
            return $result;
        }
        
        if ($bid <= Bid::get_highest_bid($this->_id)) {
            $result->add_error('ставка должна быть больше текущей');
            return $result;
        }
        
        if ($bid <= $this->_start_price) {
            $result->add_error('ставка должна быть больше начальной цены');
            return $result;
        }
        
        $current_time = new DateTime;
        $current_time = $current_time->format('Y-m-d H:i:s');
        if ($this->_end_time < $current_time) {
            $result->add_error('нельзя сделать ставку после окончания времени лота');
            return $result;
        }
        
        if (!preg_match('/^[0-9]+$/', $bid)) {
            $result->add_error('в ставке допускаются только цифры');
            return $result;
        }
        
        Bid::place_bid($this->_id, $bid, $user->get_id());
            
        $result->add_message('ставка принята');
        return $result;
    }
} 