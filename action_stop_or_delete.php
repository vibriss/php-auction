<?php
require_once 'functions/utils.php';

session_start();

if (
    !empty($_POST) && 
    !empty($_POST['submit_stop'])
)  {
    try {
        $lot = new Lot(get_input_integer(INPUT_POST, 'submit_stop'));
        $stop_result = $lot->stop();
        $stop_result->send_to_template();
    } catch (Exception $ex) {
    }
}

if (!empty($_POST) && !empty($_POST['submit_delete']))  {
    try {
        $lot = new Lot(get_input_integer(INPUT_POST, 'submit_delete'));
        $delete_result = $lot->delete();
        $delete_result->send_to_template();
    } catch (Exception $ex) {
    }
}

header("location:user_lots.php");