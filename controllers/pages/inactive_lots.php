<?php
require_once 'functions/utils.php';

session_start();

try {
    $lot_list = new MainLotList(false);
    
    TPL::getInstance()->assign([
        'user'     => User::get_current_user(),
        'lot_list' => $lot_list->get_lots()
    ]);
    TPL::getInstance()->display('inactive_lots.tpl');
} catch (Exception $ex) {
    echo $ex->getMessage();
}