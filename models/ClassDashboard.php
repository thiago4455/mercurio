<?php
class ClassDashboard {

    public function ListarItens() {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "root", "dbmercurio");

        # MySQL UTF-8
        $objConexao->executarComandoSQL("SET NAMES 'utf8'");
        $objConexao->executarComandoSQL('SET character_set_connection=utf8');
        $objConexao->executarComandoSQL('SET character_set_client=utf8');
        $objConexao->executarComandoSQL('SET character_set_results=utf8');   

        try {
            $dashCiclos = $objConexao->selecionarDados("SELECT DISTINCT(Semestre) FROM Alunos");

            if($dashCiclos == "ERRO") {
                $dashCiclos = 0;
            }

            $dashAlunos = $objConexao->selecionarDados("SELECT Ra FROM Alunos");

            if($dashAlunos == "ERRO") {
                $dashAlunos = 0;
            }

            $dashFunc = $objConexao->selecionarDados("SELECT idFunc FROM Funcionarios");

            if($dashFunc == "ERRO") {
                $dashFunc = 0;
            }

            $dashEmp = $objConexao->selecionarDados("SELECT codEmpresa FROM Empresas");

            if($dashEmp == "ERRO") {
                $dashEmp = 0;
            }
                        

            $dados = [$dashCiclos, $dashAlunos, $dashFunc, $dashEmp];

            return $dados;
            
        }
        catch(Exception $err) {
            return "Problem System";
        }
    }
}