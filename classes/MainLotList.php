<?php

class MainLotList extends LotList{
    
    public function __construct($active = true) {
        if ($active) {
            $lot_ids = DB::getInstance()->select_all('SELECT id FROM lots WHERE end_time > CURRENT_TIMESTAMP()', [], 'id');
        } else {
            $lot_ids = DB::getInstance()->select_all('SELECT id FROM lots WHERE end_time < CURRENT_TIMESTAMP()', [], 'id');
        }
        parent::__construct($lot_ids);
    }
}