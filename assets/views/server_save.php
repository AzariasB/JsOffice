<?php


    $str = $_POST['data'];
    echo $str;
    $fich = fopen('../js/data/etat.json', 'w');
    fputs($fich, $str);
    fclose($fich);

?>