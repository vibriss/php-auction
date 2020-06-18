<?php

class User{
    protected $_id;
    protected $_login;
    protected $_pwd_hash;
    protected static $_current_user;

    public function __construct($id, $login, $pwd_hash) {
        $this->_id = $id;
        $this->_login = $login;
        $this->_pwd_hash = $pwd_hash;
    }
 
    public static function get_current_user() {
        if (isset(self::$_current_user)) {
            return self::$_current_user;
        }
        if (isset($_SESSION['login'])) {
            self::$_current_user = self::get_by_login($_SESSION['login']);
        }
        if (!self::$_current_user) {
            self::$_current_user = new self(null, 'guest', null);
        }
        return self::$_current_user;
    }
    
    public static function get_by_login($login) {
        $user = DB::getInstance()->select_one('SELECT * FROM users WHERE login = ?', [$login]);
        if (!$user) {
            return null;
        }
        return $user = new User($user['id'], $user['login'], $user['password_hash']);
    }
    
    public static function get_by_id($id) {
        $user = DB::getInstance()->select_one('SELECT * FROM users WHERE id = ?', [$id]);
        if (!$user) {
            return null;
        }
        return $user = new User($user['id'], $user['login'], $user['password_hash']);
    }
    
    public function is_logged_in() {
        return isset($this->_id);
    }
    
    public function get_login() {
        return $this->_login;
    }
    
    public function get_id() {
        return $this->_id;
    }
    
    public static function login($login, $password) {
        $result = new Result;
        $login = trim($login);
        $password = trim($password);
        if (!strlen($login) || !strlen($password)) {
            $result->add_error('');
            return $result;
        }
        
        if (!self::login_exists_in_db($login) || !self::password_matches_login($login, $password)) {
            $result->add_error('логин или пароль неверный');
            return $result;
        }      
        
        $_SESSION['login'] = $login;
        return $result;
    }
    
    public static function registration($login, $password) {
        $result = new Result;
        $login = trim($login);
        $password = trim($password);
        
        if (!strlen($login)) {
            $result->add_error('поле ввода логина не может быть пустым');                
        } else {
            if (!preg_match("/^[a-zA-Z0-9]+$/", $login)) {
                $result->add_error('логин может состоять только из букв английского алфавита и цифр');   
            }
            if (strlen($login) < 3) {
                $result->add_error('логин должен содержать не менее 3 символов');
            }
            if (self::login_exists_in_db($login)) {
                $result->add_error('логин уже занят');
            }
        }
        
        if (!strlen($password)) {
            $result->add_error('поле ввода пароля не может быть пустым');
        } else {
            if(strlen($password) < 3) {
                $result->add_error('пароль должен содержать не менее 3 символов');
            }
        }
        
        if (!$result->is_successful()) {
            return $result;
        }
        
        DB::getInstance()->insert(
            'INSERT INTO users (login, password_hash) VALUES (:login, :password_hash)',
            ['login' => $login, 'password_hash' => password_hash($password, PASSWORD_DEFAULT)]
        );
        
        $_SESSION['login'] = $login;
        return $result;
    }
    
    protected static function login_exists_in_db($login) {
        $result = DB::getInstance()->select_one('SELECT count(login) AS exist FROM users WHERE login = ?', [$login], 'exist');
        return $result == 1;
    }
    
    protected static function password_matches_login($login, $password) {
        $result = DB::getInstance()->select_one('SELECT password_hash FROM users WHERE login = ?', [$login], 'password_hash');
        if ($result) {
            return password_verify($password, $result);
        } else {
            return false;
        }
    }
    
    public static function get_user_id_by_login($login) {
        return DB::getInstance()->select_one('SELECT id FROM users WHERE login = ?', [$login], 'id');
    }
}