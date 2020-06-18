<?php

abstract class LotList {
//    const TEMPLATE = '';
    protected $_lots = [];
    
    public function __construct($lot_ids) {
        foreach ($lot_ids as $lot_id) {
            $this->_lots[] = new Lot($lot_id);
        }
    }
    
    public function get_lots() {
        return $this->_lots;
    }
    
    /*    public function show() {
        $template = TPL::getInstance();
        $template->assign('lots', $this->_lots);
        return $template->fetch(static::TEMPLATE);
    }*/
}