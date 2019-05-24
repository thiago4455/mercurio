<?php

    session_start();

    $idLog = ($_SESSION['idLog']);
    $senha = ($_POST['senha']);

    require_once('../models/ClassFuncionarios.php');
    $objFuncionarios = new ClassFuncionarios();

    $objFuncionarios->setIdFunc($idLog);
    $objFuncionarios->setSenha(md5($senha));

    $query = $objFuncionarios->AlterarSenha($objFuncionarios);

    echo json_encode($query);

?>