<?php
    session_start();

    $nome = ($_POST['nome']);
    require_once('../models/ClassFuncionarios.php');
    $objFuncionarios = new ClassFuncionarios();
    $objFuncionarios->setNome($nome);
    $queryResp = $objFuncionarios->BuscaFuncionarios($nome);

    echo json_encode($queryResp);
?>