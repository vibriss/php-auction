<?php
require_once 'functions/utils.php';

session_start();

if (!empty($_POST) &&
    !empty($_POST['id']) &&
    !empty($_POST['bid'])
)  {
    try {
        $lot = new Lot(get_input_integer(INPUT_POST, 'id'));
        $bid_result = $lot->place_bid(get_input_integer(INPUT_POST, 'bid'), User::get_current_user());
        $bid_result->send_to_template();
    } catch (Exception $ex) {
        $bid_result = new Result;
        $bid_result->add_error($ex->getMessage());
        $bid_result->send_to_template();
    }
}

header("location:index.php");