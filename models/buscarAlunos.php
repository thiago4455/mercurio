<?php
    session_start();

    $nome = ($_POST['nome']);
    require_once('../class/ClassAlunos.php');
    $objAlunos = new ClassAlunos();
    $queryResp = $objAlunos->BuscaAlunos($nome);

    echo json_encode($queryResp);
?>