<?php
    session_start();

    require_once('../class/ClassFuncionarios.php');
    $objFuncionarios = new ClassFuncionarios();
    $queryResp = $objFuncionarios->RetFuncionarios();

    echo json_encode($queryResp);
?>