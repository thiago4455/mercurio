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
                        

            $dados = [$dashCiclos, $dashAlunos];

            return $dados;
            
        }
        catch(Exception $err) {
            return "Problem System";
        }
    }
}