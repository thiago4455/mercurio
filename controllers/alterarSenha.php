<?php
    session_start();

    $email = ($_POST['email']);
    $novaSenha = ($_POST['novaSenha']);

    require_once('../models/ClassFuncionarios.php');
    $objFuncionarios = new ClassFuncionarios();

    $query = $objFuncionarios->RecuperarSenha($email, md5($novaSenha));
    
    echo json_encode($query);
?>