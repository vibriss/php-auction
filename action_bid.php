<?php
require_once 'functions/utils.php';

session_start();

try {
    if (
        !empty($_POST) &&
        !empty($_POST['id']) &&
        isset($_POST['bid'])
    )  {
        $lot = new Lot(get_input_integer(INPUT_POST, 'id'));
        $bid_result = $lot->place_bid(get_input_integer(INPUT_POST, 'bid'), User::get_current_user());
        $bid_result->store_in_session();
    }
} catch (Exception $ex) {
    $bid_result = new Result;
    $bid_result->set_source($lot->get_id());
    $bid_result->add_error($ex->getMessage());
    $bid_result->store_in_session();
}

header("location:index.php");