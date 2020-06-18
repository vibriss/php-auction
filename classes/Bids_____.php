<?php

class Bids {
    protected $_lot_id;
    
    public function __construct($lot_id) {
        $this->_lot_id = $lot_id;
    }
    
    public function delete() {
        DB::getInstance()->delete('DELETE FROM bids WHERE lot_id = ?', [$this->_lot_id]);
    }
    
    public function get_highest_bid() {
        return DB::getInstance()->select_one('SELECT MAX(bid) as bid FROM bids WHERE lot_id = ?', [$this->_lot_id], 'bid');
    }
    
    public function get_winner_id() {
        return DB::getInstance()->select_one('SELECT user_id FROM bids WHERE lot_id = ? ORDER BY bid DESC', [$this->_lot_id], 'user_id');
    }
    
    public static function set_start_price($start_price, $lot_id) {
        $result = new Result;

        DB::getInstance()->update('INSERT INTO bids (lot_id, bid) VALUES (:lot_id, :bid)',
            ['lot_id' => $lot_id, 'bid' => $start_price]);

        $result->add_message('начальная цена установлена');
        return $result;
        
    }
    
    public static function place_bid($user, $lot, $bid) {
        $result = new Result;
        
        if ($user->get_login() == $lot->get_login()) {
            $result->add_error('нелья сделать ставку на свой лот');
            return $result;
        }
    
        if ($lot->get_end_time() < $current_time) {
            $result->add_error('нельзя сделать ставку после окончания времени лота');
            return $result;
        }
        
        if (!preg_match('/^[0-9]+$/', $bid)) {
            $result->add_error('в ставке допускаются только цифры');
            return $result;
        }
        
        $current_price = DB::getInstance()->select_one('SELECT MAX(bid) as bid FROM bids WHERE lot_id = ?', [$lot->get_id()], 'bid');
        if ($bid <= $current_price) {
            $result->add_error('ставка должна быть больше текущей');
            return $result; //TODO4 проверка ставки в запросе
        }
        
        $winner_id = $user->get_id();
        DB::getInstance()->update('INSERT INTO bids (lot_id, bid, user_id) VALUES (:lot_id, :bid, :user_id)',
            ['lot_id' => $lot->get_id(), 'bid' => $bid, 'user_id' => $user->get_id()]);
            
        $result->add_message('ставка принята');
        return $result;
    }    
}
