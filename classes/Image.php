<?php

class Image {
    const PATH = 'img\\';
    
    protected $_id;
    protected $_path;

    public function __construct($id) {
        $image = DB::getInstance()->select_one('SELECT * FROM images WHERE id = ?', [$id]);
        if (!$image) {
            throw new Exception('нет картинки с таким id');
        }
        $this->_id = $id;
        $this->_path = self::PATH . $image['image'];
    }
    
    public static function get_images($lot_id) {
        $image_ids = DB::getInstance()->select_all('SELECT id FROM images WHERE lot_id = ?', [$lot_id], 'id');
        foreach ($image_ids as $id) {
            $images[] = new Image($id);
        }
        return $images;
    }
    
    public function get_id() {
        return $this->_id;
    }
    
    public function get_path() {
        return $this->_path;
    }
    
    public static function get_path_by_id($id) {
        $image = new Image($id);
        return $image->get_path();
    }
    
    public static function add($file, $lot_id) {
        $result = new Result;
        
        if ($file['size'] == 0) {
            $result->add_error('файл слишком большой');
            return $result;
        }
        if ($file['type'] != 'image/jpeg') {
            $result->add_error('к загрузке допускаются файлы с расширением .jpg');
            return $result;
        }

        $image = [
                'tmp_name' => $file['tmp_name'],
                'name'     => uniqid() . '.jpg'
            ];

        move_uploaded_file($image['tmp_name'], 'img\\' . $image['name']);
        DB::getInstance()->insert('INSERT INTO images (lot_id, image) VALUES (:lot_id, :image)',
            ['lot_id' => $lot_id, 'image' => $image['name']]);
        
        $result->add_message('картинка добавлена');
        
        return $result;
    }
    
    public function delete() {
        unlink($this->get_path());
        DB::getInstance()->delete('DELETE FROM images WHERE id = ?', [$this->_id]);
    }
}