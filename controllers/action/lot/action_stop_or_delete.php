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
        
        if ($stop_result->is_successful()) {
            $stop_result->show_messages();
        } else {
            $stop_result->show_errors();
        }
    } catch (Exception $ex) {
    }
}

if (!empty($_POST) && !empty($_POST['submit_delete']))  {
    try {
        $lot = new Lot(get_input_integer(INPUT_POST, 'submit_delete'));
        $delete_result = $lot->delete();
        
        if ($delete_result->is_successful()) {
            $delete_result->show_messages();
        } else {
            $delete_result->show_errors(); //TODO2 так-то эта строка не нужна, т.к. delete не добавляет ошибок в result
        }
    } catch (Exception $ex) {
    }
}

header("location:user_lots.php");