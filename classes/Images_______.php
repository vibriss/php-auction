<?php

class Images {
    const PATH = 'img\\';
    
    protected $_lot_id;
    protected $_ids = [];
    
    public function __construct($lot_id) {
        $this->_lot_id = $lot_id;
        $this->_ids = DB::getInstance()->select_all('SELECT id FROM images WHERE lot_id = ?', [$lot_id], 'id');
    }
    
    public function get_ids() {
        return $this->_ids;
    }
    
    public static function get_image_path_by_id($id) {
        $image = DB::getInstance()->select_one('SELECT image FROM images WHERE id = ?', [$id], 'image');
        if ($image) {
            return self::PATH . $image;
        }
        return null;
    }
    
    public static function add_images($files, $lot_id) {
        $images = [];
        $result = new Result;
        
        $files = normalize_files_array($files);
        
        foreach ($files as $key => $file) {
            if (empty($file['name'])) {
                continue;
            }
            if ($file['size'] == 0) {
                $result->add_warning('файл слишком большой');
                continue;
            }
            if ($file['type'] != 'image/jpeg') {
                $result->add_warning('к загрузке допускаются файлы с расширением .jpg');
                continue;
            }
            $images[$key] = [
                'tmp_name' => $file['tmp_name'],
                'name'     => uniqid() . '.jpg'
            ];
        }
        
        $user_id = User::get_current_user()->get_id();
        
        foreach ($images as $key => $image) {
            move_uploaded_file($image['tmp_name'], 'img\\' . $image['name']);
            DB::getInstance()->insert('INSERT INTO images (lot_id, user_id, image) VALUES (:lot_id, :user_id, :image)',
                ['lot_id' => $lot_id, 'user_id' => $user_id, 'image' => $image['name']]);
            $result->add_message('картинка добавлена');
        }
        
        return $result;
    }
    
    public function delete_by_id($id) {
        unlink(self::get_image_path_by_id($id));
        DB::getInstance()->delete('DELETE FROM images WHERE id = ?', [$id]);
    }
    
    public function delete_all() {
        foreach ($this->_ids as $id) {
            unlink(self::get_image_path_by_id($id));
        }
        DB::getInstance()->delete('DELETE FROM images WHERE lot_id = ?', [$this->_lot_id]);
    }
}