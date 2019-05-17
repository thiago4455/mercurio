<?php

    session_start();
    $nomeFantasia = ($_POST['nomeFantasia']);
    $razaoSocial = ($_POST['razaoSocial']);
    $nomeResponsavel = ($_POST['nomeResponsavel']);
    $cnpj = ($_POST['cnpj']);
    $email = ($_POST['email']);
    $telefone = ($_POST['telefone']);
    $cep = ($_POST['cep']);
    $endereco = ($_POST['endereco']);
    $numero = ($_POST['numero']);
    $bairro = ($_POST['bairro']);
    $cidade = ($_POST['cidade']);
    $estado = ($_POST['estado']);
    $apelido = ($_POST['apelido']);

    require_once('../models/ClassEmpresas.php');
    $objEmpresas = new ClassEmpresas();

    $objEmpresas->setNomeFantasia($nomeFantasia);
    $objEmpresas->setRazaoSocial($razaoSocial);
    $objEmpresas->setNomeResponsavel($nomeResponsavel);
    $objEmpresas->setCnpj($cnpj);
    $objEmpresas->setEmail($email);
    $objEmpresas->setTelefone($telefone);
    $objEmpresas->setCep($cep);
    $objEmpresas->setEndereco($endereco);
    $objEmpresas->setNumero($numero);
    $objEmpresas->setBairro($bairro);
    $objEmpresas->setCidade($cidade);
    $objEmpresas->setEstado($estado);
    $objEmpresas->setApelido($apelido);
    
    $query = $objEmpresas->EditarEmpresa($objEmpresas);

    echo json_encode($query);

?>