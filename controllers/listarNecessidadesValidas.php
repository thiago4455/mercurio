<?php
    session_start();
    $quant = $_POST['quantidade'];

    require_once('../models/ClassNecessidades.php');
    $objNecessidades = new ClassNecessidades();
    $queryResp = $objNecessidades->RetNecessidadesValidas($quant);

    echo json_encode($queryResp);
?>