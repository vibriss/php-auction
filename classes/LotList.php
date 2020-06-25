<?php

abstract class LotList {
    protected $_lots = [];
    
    public function __construct($lot_ids) {
        foreach ($lot_ids as $lot_id) {
            $this->_lots[] = new Lot($lot_id);
        }
    }
    
    public function get_lots() {
        return $this->_lots;
    }
}