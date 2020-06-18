<?php

class Bid {
    public static function delete_all($lot_id) {
        DB::getInstance()->delete('DELETE FROM bids WHERE lot_id = ?', [$lot_id]);
    }
    
    public static function get_highest_bid($lot_id) {
        return DB::getInstance()->select_one('SELECT MAX(bid) as bid FROM bids WHERE lot_id = ?', [$lot_id], 'bid');
    }
    
    public static function get_winner_id($lot_id) {
        return DB::getInstance()->select_one('SELECT user_id FROM bids WHERE lot_id = ? ORDER BY bid DESC', [$lot_id], 'user_id');
    }
    
    public static function place_bid($lot_id, $bid, $user_id) {
        DB::getInstance()->update('INSERT INTO bids (lot_id, bid, user_id) VALUES (:lot_id, :bid, :user_id)',
            ['lot_id' => $lot_id, 'bid' => $bid, 'user_id' => $user_id]);
    }    
}
