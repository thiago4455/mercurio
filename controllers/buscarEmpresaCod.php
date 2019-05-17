<?php
    session_start();

    $codEmpresa = ($_POST['codEmpresa']);
    require_once('../models/ClassEmpresas.php');
    $objEmpresas = new ClassEmpresas();
    $objEmpresas->setApelido($codEmpresa);
    $queryResp = $objEmpresas->BuscaEmpresas($codEmpresa);

    echo json_encode($queryResp);
?>