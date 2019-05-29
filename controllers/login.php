<?php
    session_start();
    $email = ($_POST['ipt_email']);
    $senha = ($_POST['ipt_senha']);

    if(($email == "") || ($senha == "")) {
        echo json_encode("Fill all inputs");
    } else {
        require_once('../models/ClassLogin.php');
        $objLogin = new ClassLogin();
        $objLogin->setEmail($email);
        $objLogin->setSenha(md5($senha));
        $queryResp = $objLogin->Login($objLogin);

        if ($queryResp == "Incorrect login") {
            echo json_encode('Incorrect login');
        }
        else if ($queryResp == "Problem System") {
            echo json_encode('Problem System');
        }
        else {
            $_SESSION['idLog'] = $queryResp[0]['idFunc'];
            $_SESSION['nomeLog'] = $queryResp[0]['nomeFunc'];
            $_SESSION['tipoLog'] = $queryResp[0]['tipoFunc'];
            echo json_encode('Success');
        }
    }
?>