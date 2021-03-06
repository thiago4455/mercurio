<?php
class ClassLogin {

    private $email;
    private $senha;

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    public function Login($objLogin) {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass();

        # MySQL UTF-8
        $objConexao->executarComandoSQL("SET NAMES 'utf8'");
        $objConexao->executarComandoSQL('SET character_set_connection=utf8');
        $objConexao->executarComandoSQL('SET character_set_client=utf8');
        $objConexao->executarComandoSQL('SET character_set_results=utf8');   

        $email = $objLogin->getEmail();
        $senha = $objLogin->getSenha();
        try {
            $tableLogin = $objConexao->selecionarDados("SELECT * FROM Funcionarios WHERE emailFunc = '$email' AND senhaFunc = '$senha'");

            if($tableLogin === "ERRO") {          
                return 'Incorrect login';             
            }
            else {
                return $tableLogin;
            }
        }
        catch(Exception $err) {
            return "Problem System";
        }
    }

    public function RecuperarSenha($objRecuperar) {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass();

        # MySQL UTF-8
        $objConexao->executarComandoSQL("SET NAMES 'utf8'");
        $objConexao->executarComandoSQL('SET character_set_connection=utf8');
        $objConexao->executarComandoSQL('SET character_set_client=utf8');
        $objConexao->executarComandoSQL('SET character_set_results=utf8');   

        $email = $objRecuperar->getEmail();
        try {
            $queryRecuperar = $objConexao->selecionarDados("SELECT * FROM Funcionarios WHERE emailFunc = '$email'");

            if($queryRecuperar === "ERRO") {          
                return 'User not exist';             
            }
            else {
                return $queryRecuperar;
            }
        }
        catch(Exception $err) {
            return "Problem System";
        }
    }
}