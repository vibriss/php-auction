<?php
require_once 'functions/utils.php';

session_start();

try { //TODO2 добавить везде try/catch?
    $user = User::get_current_user();

    if (!$user->is_logged_in()) {
        header("refresh: 3; url=index.php");
        print 'сначала нужно войти';
        exit();
    }

    $lot_list = new UserLotList($_SESSION['login']);

    TPL::getInstance()->assign([
        'user'     => $user,
        'lot_list' => $lot_list->get_lots() 
    ]);

    TPL::getInstance()->display('user_lots.tpl');
} catch (Exception $ex) {
    echo $ex->getMessage();
}