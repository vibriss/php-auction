<?php
require_once 'functions/utils.php';

session_start();

if (!empty($_POST) && isset($_POST['login']) && isset($_POST['password'])) {
    try {
        $registration_result = User::registration($_POST['login'], $_POST['password']);
        if ($registration_result->is_successful()) { //TODO здесь пришлось оставить
            header("location:index.php");
            exit();
        }
        $registration_result->send_to_template();
    } catch (Exception $ex) {
    }
}

header("location:registration.php");