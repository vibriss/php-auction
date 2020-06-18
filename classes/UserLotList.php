<?php

class UserLotList extends LotList{
    protected $_login; 
    protected $_lot_list;
    
    public function __construct($login) {
        $this->_login = $login;
        $lot_ids = DB::getInstance()->select_all('SELECT lots.id FROM lots JOIN users ON (lots.user_id = users.id) WHERE login = ?', [$login], 'id');
        parent::__construct($lot_ids);
    }
}