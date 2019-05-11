<?php

    session_start();

    $nome = ($_POST['nome']);
    $cpf = ($_POST['cpf']);
    $email = ($_POST['email']);
    $senha = ($_POST['senha']);
    $telefone = ($_POST['telefone']);
    $cep = ($_POST['cep']);
    $endereco = ($_POST['endereco']);
    $numero = ($_POST['numero']);
    $bairro = ($_POST['bairro']);
    $cidade = ($_POST['cidade']);
    $estado = ($_POST['estado']);
    $tipoFunc = ($_POST['tipoFunc']);

    require_once('../class/ClassFuncionarios.php');
    $objFuncionarios = new ClassFuncionarios();

    $objFuncionarios->setNome($nome);
    $objFuncionarios->setCpf($cpf);
    $objFuncionarios->setEmail($email);
    $objFuncionarios->setSenha($senha);
    $objFuncionarios->setTelefone($telefone);
    $objFuncionarios->setCep($cep);
    $objFuncionarios->setEndereco($endereco);
    $objFuncionarios->setNumero($numero);
    $objFuncionarios->setBairro($bairro);
    $objFuncionarios->setCidade($cidade);
    $objFuncionarios->setEstado($estado);
    $objFuncionarios->setTipoFunc($tipoFunc);

    $query = $objFuncionarios->VerificarDuplicidade($objFuncionarios);

    echo json_encode($query);

?>