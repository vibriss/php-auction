<?php
require_once 'functions/utils.php';

session_start();

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
    if ($add_lot_result->is_successful()) {    
        $add_lot_result->show_messages();
    } else {
        $add_lot_result->show_errors();
    }
}

header("location:user_lots.php");