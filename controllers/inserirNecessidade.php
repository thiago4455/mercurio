<?php

    session_start();
    $codEmpresa = ($_POST['codEmpresa']);
    $tipoContrato = ($_POST['tipoContrato']);
    $quantidade = ($_POST['quantidade']);
    $ciclo = ($_POST['ciclo']);
    $descricao = ($_POST['descricao']);

    require_once('../models/ClassNecessidades.php');
    $objNecessidade = new ClassNecessidades();
    
    $objNecessidade->setCodEmpresa($codEmpresa);
    $objNecessidade->setTipoContrato($tipoContrato);
    $objNecessidade->setQuantidade($quantidade);
    $objNecessidade->setCiclo($ciclo);
    $objNecessidade->setDescricao($descricao);

    $query = $objNecessidade->InserirNecessidade($objNecessidade);

    echo json_encode($query);

?>