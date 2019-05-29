<?php
    session_start();

    require_once('../models/ClassAlunos.php');

    $ra = ($_POST['ra']);
    $status = ($_POST['status']);
    $reprovado = ($_POST['reprovado']);
    $idFunc = ($_SESSION['idLog']);

    $objAlunos = new ClassAlunos();
    $queryResp = $objAlunos->MudarStatus($ra, $status, $reprovado, $idFunc);

    echo json_encode($queryResp);
?>