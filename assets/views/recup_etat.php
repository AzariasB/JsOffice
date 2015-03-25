<?php

    $fich = fopen('../js/data/etat.json', 'r');
    $data = fgets($fich);
    echo($data);
    fclose($fich);
?>