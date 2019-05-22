<?php
    session_start();

    require_once('../models/ClassAlunos.php');
    $ciclo = ($_POST['ciclo']);
    $objAlunos = new ClassAlunos();
    $encaminhado = ($_POST['encaminhado']);
    $queryResp = $objAlunos->RetEncaminhados($ciclo);

    echo json_encode($queryResp);
?>