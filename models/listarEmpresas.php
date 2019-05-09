<?php
    session_start();

    require_once('../class/ClassEmpresas.php');
    $objEmpresas = new ClassEmpresas();
    $queryResp = $objEmpresas->RetEmpresas();

    echo json_encode($queryResp);
?>