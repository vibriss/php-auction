<?php
require_once 'functions/utils.php';

session_start();

if (!empty($_POST) && isset($_POST['login']) && isset($_POST['password'])) {
    try {
        $login_result = User::login($_POST['login'], $_POST['password']);
        $login_result->send_to_template();
    } catch (Exception $ex) {
    }
}

header("location:index.php");