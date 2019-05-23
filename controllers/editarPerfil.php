<?php

    session_start();

    $idLog = ($_SESSION['idLog']);
    $nome = ($_POST['nome']);
    $cpf = ($_POST['cpf']);
    $email = ($_POST['email']);
    $telefone = ($_POST['telefone']);
    $cep = ($_POST['cep']);
    $endereco = ($_POST['endereco']);
    $numero = ($_POST['numero']);
    $bairro = ($_POST['bairro']);
    $cidade = ($_POST['cidade']);
    $estado = ($_POST['estado']);

    require_once('../models/ClassFuncionarios.php');
    $objFuncionarios = new ClassFuncionarios();

    $objFuncionarios->setIdFunc($idLog);
    $objFuncionarios->setNome($nome);
    $objFuncionarios->setCpf($cpf);
    $objFuncionarios->setEmail($email);
    $objFuncionarios->setTelefone($telefone);
    $objFuncionarios->setCep($cep);
    $objFuncionarios->setEndereco($endereco);
    $objFuncionarios->setNumero($numero);
    $objFuncionarios->setBairro($bairro);
    $objFuncionarios->setCidade($cidade);
    $objFuncionarios->setEstado($estado);

    $query = $objFuncionarios->EditarFuncionario($objFuncionarios);

    if($query){
        $_SESSION['nomeLog'] = $nome;
    }
    

    echo json_encode($query);

?>