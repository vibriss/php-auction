<?php
require_once 'functions/utils.php';

try {
    TPL::getInstance()->assign([
        'return_url' => get_input_url(INPUT_SERVER, 'HTTP_REFERER'),
        'id'         => get_input_integer(INPUT_GET, 'id')
    ]);
    TPL::getInstance()->display('show_image.tpl');    
} catch (Exception $ex) {
    echo $ex->getMessage();
}