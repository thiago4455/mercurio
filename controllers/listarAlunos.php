<?php
    session_start();

    require_once('../models/ClassAlunos.php');
    $ciclo = ($_POST['ciclo']);
    $objAlunos = new ClassAlunos();
    $queryResp = $objAlunos->RetAlunos($ciclo);

    echo json_encode($queryResp);
?>