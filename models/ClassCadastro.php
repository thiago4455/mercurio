<?php
class ClassCadastro {

    private $nome;
    private $email;
    private $senha;
    private $cpf;

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getCpf() {
        return $this->cpf;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function VerificarEmailOrCpf($objCadastro) {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass();

        $email = $objCadastro->getEmail();
        $cpf = $objCadastro->getCpf();

        $tableCadastro = $objConexao->selecionarDados("SELECT * FROM users WHERE emailUser = '$email' OR cpfUser = '$cpf'");

            if($tableCadastro === "ERRO") {          
                return true;             
            }
            else {
                return false;
            }
    }

    public function Cadastrar($objCadastro) {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass();

        $nome = $objCadastro->getNome();
        $email = $objCadastro->getEmail();
        $senha = $objCadastro->getSenha();
        $cpf = $objCadastro->getCpf();

        try {
            if($objConexao->executarComandoSQL("INSERT INTO `users` (`idUser`, `nomeUser`, `emailUser`, `senhaUser`, `cpfUser`) VALUES (NULL, '$nome', '$email', '$senha', '$cpf')")) {
                return true;
            }
        }
        catch(Exception $err) {
            return false;
        }
    }
}