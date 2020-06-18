<?php

class MainLotList extends LotList{
//    const TEMPLATE = 'list/main.tpl';

/*    public function __construct($lot_count = 12, $random = false) {
        parent::__construct(self::initialize($lot_count, $random));
    }
    
    private static function initialize($lot_count, $random) {
        $query_string = "SELECT id FROM lots WHERE end_time > CURRENT_TIMESTAMP() ";
        if ($random) {
            $query_string .= 'ORDER BY rand() ';
        }
        $query_string .= 'LIMIT ' . $lot_count;
        return DB::getInstance()->select_all($query_string, [], 'id');
    }*/
    
    public function __construct($active = true) {
        if ($active) {
            $lot_ids = DB::getInstance()->select_all('SELECT id FROM lots WHERE end_time > CURRENT_TIMESTAMP()', [], 'id');
        } else {
            $lot_ids = DB::getInstance()->select_all('SELECT id FROM lots WHERE end_time < CURRENT_TIMESTAMP()', [], 'id');
        }
        parent::__construct($lot_ids);
    }
}