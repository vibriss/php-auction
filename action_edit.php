<?php
require_once 'functions/utils.php';

session_start();

try {
    if (
        !empty($_POST) &&
        isset($_POST['submit_edit'])
    )  {
        $lot = new Lot(get_input_integer(INPUT_POST, 'id'));
        $edit_result = $lot->edit($_POST['name'], $_POST['description'], $_POST['image_id'] ?? [], $_FILES['file'] ?? []); //TODO4 спросить
        $edit_result->store_in_session();
    }
} catch (Exception $ex) {
}

header("location:edit_lot.php?lot={$_POST['id']}");