<?php




$command = $_POST;

switch ($command['action']){
    case 'save' :
        echo saveJsTree();
    case 'getTree':
        return getJsTree();
    default :
        return;
}


function getJsTree(){
    $js_tree = fopen('./assets/js/data/tree.json', 'r') or die();
    $data = fread($js_tree,  filesize($js_tree));
    fclose($js_tree);
    return $data;
}

function saveJsTree(){
    if(isset($_POST['data']) && !empty($_POST['data'])){
        $js_tree = fopen('./assets/js/data/tree.json', 'w') or die();
        if(!fwrite($js_tree, $_POST['data'])){
            return '';
        }else{
            return 'OK';
        }
    }else{
        return '';
    }
}