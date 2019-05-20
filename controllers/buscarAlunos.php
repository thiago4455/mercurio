<?php
    session_start();

    $nome = ($_POST['nome']);
    $ciclo = ($_POST['ciclo']);
    $encaminhado = ($_POST['encaminhado']);

    require_once('../models/ClassAlunos.php');
    $objAlunos = new ClassAlunos();
    $objAlunos->setNome($nome);
    $queryResp = $objAlunos->BuscaAlunos($nome, $ciclo, $encaminhado);

    echo json_encode($queryResp);
?>