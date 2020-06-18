<?php
require_once 'functions/utils.php';

session_start();

try {
    if (
        !empty($_POST) &&
        isset($_POST['name']) &&
        isset($_POST['description']) &&
        isset($_POST['price']) &&
        isset($_POST['lifetime'])
    ) {
        $add_lot_result = Lot::add(
            $_SESSION['login'],
            $_POST['name'],
            $_POST['description'],
            $_POST['price'],
            $_POST['lifetime'],
            $_FILES['file']
        );
    }
    $add_lot_result->store_in_session();
} catch (Exception $ex) {
}

header("location:user_lots.php");