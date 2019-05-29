<?php
    session_start();

    $ra = ($_POST['ra']);
    require_once('../models/ClassAlunos.php');
    $objAluno = new ClassAlunos();
    $queryResp = $objAluno->BuscaHistoricoRa($ra);

    echo json_encode($queryResp);
?>