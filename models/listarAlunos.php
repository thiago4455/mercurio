<?php
    session_start();

    require_once('../class/ClassAlunos.php');
    $objAlunos = new ClassAlunos();
    $queryResp = $objAlunos->RetAlunos();

    echo json_encode($queryResp);
?>