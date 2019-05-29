<?php
    session_start();
    $email = ($_POST['email']);
    $codigo = ($_POST['codigo']);

    require_once('../models/ClassFuncionarios.php');
    $objRecuperar = new ClassFuncionarios();
    $objRecuperar->setEmail($email);
    $queryResp = $objRecuperar->ConferirCodigo($email,$codigo);

    if ($queryResp == "User not exists") {
        echo json_encode('User not exists');
    }
    else if ($queryResp == "Problem System") {
        echo json_encode('Problem System');
    }
    else {
        echo json_encode($queryResp);               
    }
    
?>