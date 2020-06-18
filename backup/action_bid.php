<?php
require_once 'functions/utils.php';

session_start();

if (!empty($_POST) &&
    !empty($_POST['id']) &&
    !empty($_POST['bid'])
)  {
    try {
        $lot = new Lot(get_input_integer(INPUT_POST, 'id'));
        $bid_result = Bids::place_bid(User::get_current_user(), $lot, (get_input_integer(INPUT_POST, 'bid')));
        if ($bid_result->is_successful()) {
            $bid_result->show_messages();
        } else {
            $bid_result->show_errors();
        }
        
    } catch (Exception $ex) {
        $bid_result = new Result;
        $bid_result->add_error($ex->getMessage());
        $bid_result->show_errors();
    }
}


/*if (!empty($_POST) &&
    !empty($_POST['id']) &&
    !empty($_POST['bid'])
)  {
//    try {
        $lot = new Lot(get_input_integer(INPUT_POST, 'id'));
        $bid_result = $lot->place_bid(User::get_current_user(), get_input_integer(INPUT_POST, 'bid'));
        if ($bid_result->is_successful()) {
            $bid_result->show_messages();
        } else {
            $bid_result->show_errors();
        }
        
//    } catch (Exception $ex) {
//    }
}*/


header("location:index.php");