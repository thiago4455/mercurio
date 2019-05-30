<?php
    require_once('../models/ClassNecessidades.php');
    $objNecessidades = new ClassNecessidades();
    $queryResp = $objNecessidades->RetNecessidades();

    echo json_encode($queryResp);
?>