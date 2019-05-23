<?php
    session_start();

    $codigo = ($_POST['codigo']);
    $email = ($_POST['email']);

    require_once('../models/ClassFuncionarios.php');
    $objFuncionarios = new ClassFuncionarios();

    $query = $objFuncionarios->SalvarCodigo($email, $codigo);
    
    echo json_encode($query);
?>