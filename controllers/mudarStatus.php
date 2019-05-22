<?php
    session_start();

    require_once('../models/ClassAlunos.php');

    $ra = ($_POST['ra']);
    $status = ($_POST['status']);
    
    $objAlunos = new ClassAlunos();
    $queryResp = $objAlunos->MudarStatus($ra, $status);

    echo json_encode($queryResp);
?>