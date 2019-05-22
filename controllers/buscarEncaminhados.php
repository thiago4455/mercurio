<?php
    session_start();

    $nome = ($_POST['nome']);
    $ciclo = ($_POST['ciclo']);

    require_once('../models/ClassAlunos.php');
    $objAlunos = new ClassAlunos();
    $objAlunos->setNome($nome);
    $queryResp = $objAlunos->BuscaEncaminhados($nome, $ciclo);

    echo json_encode($queryResp);
?>