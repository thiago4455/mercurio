<?php
class ClassAlunos {
    public function RetAlunos() {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "root", "dbaprendizagem");
        try {
            $tableAlunos = $objConexao->selecionarDados("SELECT * FROM Alunos");

            if($tableAlunos === "ERRO") {          
                return 'Not found';             
            }
            else {
                return $tableAlunos;
            }
        }
        catch(Exception $err) {
            return "Problem System";
        }
    }

    public function BuscaAlunos($nome) {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "root", "dbaprendizagem");
        try {
            $tableAlunos = $objConexao->selecionarDados("SELECT * FROM Alunos WHERE Nome LIKE '%$nome%'");

            if($tableAlunos === "ERRO") {          
                return 'Not found';             
            }
            else {
                return $tableAlunos;
            }
        }
        catch(Exception $err) {
            return "Problem System";
        }
    }
}