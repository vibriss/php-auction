<?php

function debug($var) {
    echo '<pre>';
    if ($var) {
        print_r ($var);
    } else {
        var_dump($var);
    }
    echo '</pre>';
}

function get_input_integer($source, $name) {
    $integer = filter_input($source, $name, FILTER_VALIDATE_INT);
    if ($integer === false) {
        throw new Exception("параметр $name не целое число");
    }
    return $integer;
}

function get_input_url($source, $name) {
    $url = filter_input($source, $name, FILTER_VALIDATE_URL);
    if (!$url) {
        throw new Exception("параметр $name не URL");
    }
    return $url;
}

spl_autoload_register(
    function($className) {
        require_once __DIR__ . '/../vendor/Smarty/Smarty.class.php';
        
        if (file_exists(__DIR__ . "/../classes/$className.php")) {
            require_once(__DIR__ . "/../classes/$className.php");
        }
    }
);

function normalize_files_array($files = []) {
    $normalized_array = [];

    if (empty($files['name'][0])) {
        return [];
    }
    
    if (!is_array($files['name'])) {
        return $files;
    }
    
    foreach ($files['name'] as $key => $name) {
        $normalized_array[$key] = [
            'name'     => $name,
            'type'     => $files['type'][$key],
            'tmp_name' => $files['tmp_name'][$key],
            'error'    => $files['error'][$key],
            'size'     => $files['size'][$key]
        ];
    }
    return $normalized_array;

}