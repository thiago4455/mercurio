<?php
    session_start();

    require_once('../models/ConexaoClass.php');
    $objConexao = new ConexaoClass();
    $queryResp = $objConexao->selecionarDados('SELECT * FROM `Contratos`;');

    echo json_encode($queryResp);
?>