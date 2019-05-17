<?php
    $alunosSelecionados = $_POST['alunosSelecionados'];

    require_once('../models/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "root", "dbmercurio");

        # MySQL UTF-8
        $objConexao->executarComandoSQL("SET NAMES 'utf8'");
        $objConexao->executarComandoSQL('SET character_set_connection=utf8');
        $objConexao->executarComandoSQL('SET character_set_client=utf8');
        $objConexao->executarComandoSQL('SET character_set_results=utf8');   

        $length = sizeof($alunosSelecionados);

        $queryBusca = "SELECT Nome From Alunos WHERE";

        $i = 0;
        foreach($alunosSelecionados as $aluno) {
            $i = $i + 1;
            if($i != $length) {
                $queryBusca = $queryBusca . " Ra = ". $aluno ." OR";
            } else {
                $queryBusca = $queryBusca . " Ra = ". $aluno .";";
            }
        }

        $queryResp = $objConexao->selecionarDados($queryBusca);
    

    echo json_encode($queryResp);
?>