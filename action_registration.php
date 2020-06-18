<?php
require_once 'functions/utils.php';

session_start();

try {
    if (
        !empty($_POST) &&
        isset($_POST['login']) &&
        isset($_POST['password'])
    ) {
        $registration_result = User::registration($_POST['login'], $_POST['password']);
        if ($registration_result->is_successful()) {
            header("location:index.php");
            exit();
    }
    $registration_result->store_in_session();
}
} catch (Exception $ex) {
}

header("location:registration.php");