<?php
require_once '../../../functions/utils.php';

session_start();

if (!empty($_POST) && isset($_POST['login']) && isset($_POST['password'])) {
    $registration_result = User::registration($_POST['login'], $_POST['password']);
    if ($registration_result->is_successful()) {
        $_SESSION['login'] = $_POST['login'];
        header("location:../../../index.php");
        exit();
    } else {
        $registration_result->show_errors();
    }
}

header("location:registration.php");