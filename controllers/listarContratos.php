<?php
    session_start();

    require_once('../models/ConexaoClass.php');
    $objConexao = new ConexaoClass();
    $objConexao->executarComandoSQL("SET NAMES 'utf8'");
    $objConexao->executarComandoSQL('SET character_set_connection=utf8');
    $objConexao->executarComandoSQL('SET character_set_client=utf8');
    $objConexao->executarComandoSQL('SET character_set_results=utf8');     
    $queryResp = $objConexao->selecionarDados('SELECT nomeContrato FROM `Contratos`;');

    echo json_encode($queryResp);
?>