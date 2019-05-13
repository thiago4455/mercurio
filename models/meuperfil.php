<?php

    session_start();

    $idLog = ($_POST['idLog']);

    require_once('../class/ClassFuncionarios.php');
    $objFuncionarios = new ClassFuncionarios();

    $objFuncionarios->setIdFunc($idLog);

    $query = $objFuncionarios->RetornarPerfil($objFuncionarios);

    echo json_encode($query);

?>