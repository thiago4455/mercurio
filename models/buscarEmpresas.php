<?php
    session_start();

    $nome = ($_POST['nome']);
    require_once('../class/ClassEmpresas.php');
    $objEmpresas = new ClassEmpresas();
    $objEmpresas->setNomeFantasia($nome);
    $queryResp = $objEmpresas->BuscaEmpresas($nome);

    echo json_encode($queryResp);
?>