<?php
require_once 'functions/utils.php';

session_start();

try {
    if (
        !empty($_POST) && 
        !empty($_POST['submit_stop'])
    )  {
        $lot = new Lot(get_input_integer(INPUT_POST, 'submit_stop'));
        $stop_result = $lot->stop();
        $stop_result->store_in_session();
    }

    if (
        !empty($_POST) && 
        !empty($_POST['submit_delete'])
    )  {
        $lot = new Lot(get_input_integer(INPUT_POST, 'submit_delete'));
        $delete_result = $lot->delete();
        $delete_result->store_in_session();
    }
} catch (Exception $ex) {
}

header("location:user_lots.php");