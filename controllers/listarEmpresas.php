<?php
    session_start();

    require_once('../models/ClassEmpresas.php');
    $objEmpresas = new ClassEmpresas();
    $queryResp = $objEmpresas->RetEmpresas();

    echo json_encode($queryResp);
?>