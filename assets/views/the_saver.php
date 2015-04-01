<?php

define('DATA_PATH', './data/');

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

function save_text(){
    $file_name = $_GET['fileName'];
    $text = $_GET['data'];
   
    
    
    if(isset($file_name) && !empty($file_name) ){        
        file_put_contents(DATA_PATH . $file_name, $text);
        return 'success';
    }else{
        return 'failed';
    }
}

function get_text(){
    $file_name = $_GET['fileName'];
    
    if(isset($file_name) && !empty($file_name)){
        $text = file_get_contents(DATA_PATH . $file_name);
        return $text;
    }else{
        return 'failed';
    }
}