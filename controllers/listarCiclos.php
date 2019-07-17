<?php
    session_start();

    require_once('../models/ClassAlunos.php');
    $objAlunos = new ClassAlunos();
    $queryResp = $objAlunos->RetCiclos();

    echo json_encode($queryResp);
?>