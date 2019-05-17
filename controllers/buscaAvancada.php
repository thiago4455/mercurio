<?php
    session_start();

    $Nome = ($_POST['nome']);
    $Ra = ($_POST['ra']);
    $Idade1 = ($_POST['idade1']);
    $Idade2 = ($_POST['idade2']);
    $Sexo = ($_POST['sexo']);
    $GrauInstrucao = ($_POST['grauInstrucao']);
    $Bairro = ($_POST['bairro']);
    $Estado = ($_POST['estado']);
    $Cidade = ($_POST['cidade']);
    $Cep = ($_POST['cep']);
    $Telefone = ($_POST['telefone']);
    $Identidade = ($_POST['identidade']);
    $Cpf = ($_POST['cpf']);
    $Email = ($_POST['email']);
    $CarteiraTrabalho = ($_POST['carteiraTrabalho']);
    $NomePai = ($_POST['nomePai']);
    $NomeMae = ($_POST['nomeMae']);
    $NomeCurso = ($_POST['nomeCurso']);
    $CodTurma = ($_POST['codTurma']);
    $Status = ($_POST['status']);
    $Ciclo = ($_POST['ciclo']);

    require_once('../models/ClassAlunos.php');
    $objAlunos = new ClassAlunos();
    $objAlunos->setNome($Nome);
    $objAlunos->setRa($Ra);
    $objAlunos->setIdade1($Idade1);
    $objAlunos->setIdade2($Idade2);
    $objAlunos->setSexo($Sexo);
    $objAlunos->setGrauInstrucao($GrauInstrucao);
    $objAlunos->setBairro($Bairro);
    $objAlunos->setEstado($Estado);
    $objAlunos->setCidade($Cidade);
    $objAlunos->setCep($Cep);
    $objAlunos->setTelefone($Telefone);
    $objAlunos->setIdentidade($Identidade);
    $objAlunos->setCpf($Cpf);
    $objAlunos->setEmail($Email);
    $objAlunos->setCarteiraTrabalho($CarteiraTrabalho);
    $objAlunos->setNomePai($NomePai);
    $objAlunos->setNomeMae($NomeMae);
    $objAlunos->setNomeCurso($NomeCurso);
    $objAlunos->setCodTurma($CodTurma);
    $objAlunos->setStatus($Status);
    $objAlunos->setSemestre($Ciclo);
    $queryResp = $objAlunos->BuscaAvancada($objAlunos);

    echo json_encode($queryResp);
?>