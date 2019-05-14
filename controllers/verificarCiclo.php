<?php
    session_start();

    require_once('../models/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "root", "dbmercurio");
                # MySQL UTF-8
                $objConexao->executarComandoSQL("SET NAMES 'utf8'");
                $objConexao->executarComandoSQL('SET character_set_connection=utf8');
                $objConexao->executarComandoSQL('SET character_set_client=utf8');
                $objConexao->executarComandoSQL('SET character_set_results=utf8');        
        try {
            $tableAlunos = $objConexao->selecionarDados("SELECT * FROM Alunos WHERE Semestre = '".date("m.y") ."'");

            if($tableAlunos === "ERRO") {          
                echo json_encode(false);            
            }
            else {
                echo json_encode(true);
            }
        }
        catch(Exception $err) {
            echo json_encode("Problem System");
        }

       
?>