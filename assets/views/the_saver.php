<?php

define('DATA_PATH', './data/');

define('SUCCESS','success');
define('FAIL', 'failed');

$command = $_GET;

switch ($command['action']) {
    case "save_jstree" :
        save_tree($command['data']);
        break;
    case "get_jstree" :
        echo get_tree();
        break;
    case "save_text" :
        echo save_text();
        break;
    case "get_text" :
        echo get_text();
        break;
    case 'delete_file' :
        echo delete_file();
    default :
        break;
}

function save_tree($data) {
    $jstree = fopen('../js/data/root.json', 'w');
    fwrite($jstree, $data);
    echo 'Finished !';
    fclose($jstree);
}

function get_tree() {
    $jstree = fopen('../data/root.json', 'r');
    $data = fread($jstree, filesize($jstree));
    fclose($jstree);
    return $data;
}

function save_text() {
    $file_name = $_GET['fileName'];
    $text = $_GET['data'];



    if (isset($file_name) && !empty($file_name)) {
        file_put_contents(DATA_PATH . $file_name, $text);
        return SUCCESS;
    } else {
        return FAIL;
    }
}

function get_text() {
    $file_name = $_GET['fileName'];

    if (isset($file_name) && !empty($file_name)) {
        if (file_exists(DATA_PATH . $file_name)) {
           return file_get_contents(DATA_PATH . $file_name);
        } else {
            return '';
        }
    } else {
        return FAIL;
    }
}

function delete_file(){
    $file_name = $_GET['fileName'];
    
    if(isset($file_name) && !empty($file_name) && file_exists(DATA_PATH . $file_name)){
        unlink(DATA_PATH . $file_name);
        return SUCCESS;
    }else{
        return 'nothing';
    }
}