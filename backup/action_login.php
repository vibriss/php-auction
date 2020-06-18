<?php
require_once 'functions/utils.php';

session_start();

if (!empty($_POST) && isset($_POST['login']) && isset($_POST['password'])) {
    $login_result = User::login($_POST['login'], $_POST['password']);
    if ($login_result->is_successful()) {
        $_SESSION['login'] = $_POST['login'];
    } else {
        $login_result->show_errors();
    }
}

header("location:index.php");