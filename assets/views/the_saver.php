<?php

$command = $_GET;

switch ($command['action']) {
    case "save_jstree" :
        save_tree($command['data']);
        break;
    case "get_jstree" :
        echo get_tree();
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
