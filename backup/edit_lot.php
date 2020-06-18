<?php
require_once 'functions/utils.php';

session_start();

$lot = new Lot(get_input_integer(INPUT_GET, 'lot'));

TPL::getInstance()->assign('lot', $lot);
TPL::getInstance()->display('edit_lot.tpl');