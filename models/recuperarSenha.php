<?php
    session_start();
    $email = ($_POST['ipt-emailRecuperar']);

    require_once('../class/ClassLogin.php');
    $objRecuperar = new ClassLogin();
    $objRecuperar->setEmail($email);
    $queryResp = $objRecuperar->RecuperarSenha($objRecuperar);

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