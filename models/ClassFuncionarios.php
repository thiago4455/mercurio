<?php
class ClassFuncionarios {

    private $idFunc;
    private $nome;
    private $cpf;
    private $email;
    private $senha;
    private $telefone;
    private $cep;
    private $endereco;
    private $numero;
    private $bairro;
    private $cidade;
    private $estado;
    private $tipoFunc;

    function getIdFunc() {
        return $this->idFunc;
    }

    function getNome() {
        return $this->nome;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getCep() {
        return $this->cep;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getNumero() {
        return $this->numero;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getEstado() {
        return $this->estado;
    }

    function getTipoFunc() {
        return $this->tipoFunc;
    }

    function setIdFunc($idFunc) {
        $this->idFunc = $idFunc;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setTipoFunc($tipoFunc) {
        $this->tipoFunc = $tipoFunc;
    }

    

    public function VerificarDuplicidade($objCadastro) {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass();

        $cpf = $objCadastro->getCpf();
        $email = $objCadastro->getEmail();

        # MySQL UTF-8
        $objConexao->executarComandoSQL("SET NAMES 'utf8'");
        $objConexao->executarComandoSQL('SET character_set_connection=utf8');
        $objConexao->executarComandoSQL('SET character_set_client=utf8');
        $objConexao->executarComandoSQL('SET character_set_results=utf8');     

        $verificarCpf = $objConexao->selecionarDados("SELECT * FROM Funcionarios WHERE cpfFunc = '$cpf'");
        $verificarEmail = $objConexao->selecionarDados("SELECT * FROM Funcionarios WHERE emailFunc = '$email'");

        if(($verificarCpf != 'ERRO') && ($verificarEmail != 'ERRO')) {
            return 'cpf e email ja utilizados';
        }
        else if ($verificarCpf != 'ERRO') {
            return 'cpf ja utilizado';
        }
        else if($verificarEmail != 'ERRO') {
            return 'email ja utilizado';
        }
        else {
            $queryCadastro = $this->CadastrarFuncionario($objCadastro);

            return $queryCadastro;
        }
    }

    public function EditarFuncionario($objCadastro){
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass();

        # MySQL UTF-8
        $objConexao->executarComandoSQL("SET NAMES 'utf8'");
        $objConexao->executarComandoSQL('SET character_set_connection=utf8');
        $objConexao->executarComandoSQL('SET character_set_client=utf8');
        $objConexao->executarComandoSQL('SET character_set_results=utf8');     

        $idFunc= $objCadastro->getIdFunc();
        $nome = $objCadastro->getNome();
        $cpf = $objCadastro->getCpf();
        $email = $objCadastro->getEmail();
        $telefone = $objCadastro->getTelefone();
        $cep = $objCadastro->getCep();
        $endereco = $objCadastro->getEndereco();
        $numero = $objCadastro->getNumero();
        $bairro = $objCadastro->getBairro();
        $cidade = $objCadastro->getCidade();
        $estado = $objCadastro->getEstado();

        try {
            $query = $objConexao->executarComandoSQL("UPDATE `Funcionarios` SET `nomeFunc` = '$nome', `cpfFunc` = '$cpf', `emailFunc` = '$email', `telefoneFunc` = '$telefone', `cepFunc` = '$cep', `ruaFunc` = '$endereco', `numeroFunc` = '$numero', `bairroFunc` = '$bairro', `cidadeFunc` = '$cidade', `estadoFunc` = '$estado' WHERE `idFunc` = '$idFunc'");
            if($query){
                return $query;
            }
        }
        catch(Exception $err) {
            return $err;
        }
    }

    public function AlterarSenha($objFuncionario){

        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass();

        # MySQL UTF-8
        $objConexao->executarComandoSQL("SET NAMES 'utf8'");
        $objConexao->executarComandoSQL('SET character_set_connection=utf8');
        $objConexao->executarComandoSQL('SET character_set_client=utf8');
        $objConexao->executarComandoSQL('SET character_set_results=utf8');

        $senha = $objFuncionario->getSenha();
        $idFunc = $objFuncionario->getIdFunc();

        try {
            $query = $objConexao->executarComandoSQL("UPDATE `Funcionarios` SET `senhaFunc` ='$senha' WHERE `idFUnc` = $idFunc;");
            return $query;
            
        }
        catch(Exception $err) {
            return $err;
        }
    }

    public function CadastrarFuncionario($objCadastro) {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass();

       # MySQL UTF-8
       $objConexao->executarComandoSQL("SET NAMES 'utf8'");
       $objConexao->executarComandoSQL('SET character_set_connection=utf8');
       $objConexao->executarComandoSQL('SET character_set_client=utf8');
       $objConexao->executarComandoSQL('SET character_set_results=utf8');     

        $nome = $objCadastro->getNome();
        $cpf = $objCadastro->getCpf();
        $email = $objCadastro->getEmail();
        $senha = md5($objCadastro->getSenha());
        $telefone = $objCadastro->getTelefone();
        $cep = $objCadastro->getCep();
        $endereco = $objCadastro->getEndereco();
        $numero = $objCadastro->getNumero();
        $bairro = $objCadastro->getBairro();
        $cidade = $objCadastro->getCidade();
        $estado = $objCadastro->getEstado();
        $tipoFunc = $objCadastro->getTipoFunc();

        try {
            $query = $objConexao->executarComandoSQL("INSERT INTO `Funcionarios` (`nomeFunc`, `cpfFunc` , `emailFunc`, `senhaFunc`, `telefoneFunc`, `cepFunc`, `ruaFunc`, `numeroFunc`, `bairroFunc`, `cidadeFunc`, `estadoFunc`, `tipoFunc`) VALUES ('$nome', '$cpf', '$email', '$senha', '$telefone', '$cep', '$endereco', '$numero', '$bairro', '$cidade', '$estado', '$tipoFunc');");
            return $query;
            
        }
        catch(Exception $err) {
            return $err;
        }
    }

    public function RetFuncionarios() {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass();
        # MySQL UTF-8
        $objConexao->executarComandoSQL("SET NAMES 'utf8'");
        $objConexao->executarComandoSQL('SET character_set_connection=utf8');
        $objConexao->executarComandoSQL('SET character_set_client=utf8');
        $objConexao->executarComandoSQL('SET character_set_results=utf8');        
        try {
            $tableFuncionarios = $objConexao->selecionarDados("SELECT * FROM Funcionarios ORDER BY idFunc ASC");

            if($tableFuncionarios === "ERRO") {          
                return 'Not found';             
            }
            else {
                return $tableFuncionarios;
            }
        }
        catch(Exception $err) {
            return "Problem System";
        }
    }

    public function RetornarPerfil($objPerfil) {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass();
        # MySQL UTF-8
        $objConexao->executarComandoSQL("SET NAMES 'utf8'");
        $objConexao->executarComandoSQL('SET character_set_connection=utf8');
        $objConexao->executarComandoSQL('SET character_set_client=utf8');
        $objConexao->executarComandoSQL('SET character_set_results=utf8');        

        $idFunc = $objPerfil->getIdFunc();

        try {
            $tableFuncionarios = $objConexao->selecionarDados("SELECT * FROM Funcionarios WHERE idFunc = '$idFunc'");

            if($tableFuncionarios === "ERRO") {          
                return 'Not found';             
            }
            else {
                return $tableFuncionarios;
            }
        }
        catch(Exception $err) {
            return "Problem System";
        }
    }

    public function BuscaFuncionarios($busca) {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass();
                # MySQL UTF-8
                $objConexao->executarComandoSQL("SET NAMES 'utf8'");
                $objConexao->executarComandoSQL('SET character_set_connection=utf8');
                $objConexao->executarComandoSQL('SET character_set_client=utf8');
                $objConexao->executarComandoSQL('SET character_set_results=utf8');        
        try {
            $tableFuncionarios = $objConexao->selecionarDados("SELECT * FROM Funcionarios WHERE (idFunc LIKE '%$busca%') OR (cpfFunc LIKE '%$busca%') OR (nomeFunc LIKE '%$busca%') OR (emailFunc LIKE '%$busca%') OR (telefoneFunc LIKE '%$busca%') OR (bairroFunc LIKE '%$busca%') OR (cidadeFunc LIKE '%$busca%') ORDER BY idFunc ASC");

            if($tableFuncionarios === "ERRO") {          
                return 'Not found';             
            }
            else {
                return $tableFuncionarios;
            }
        }
        catch(Exception $err) {
            return "Problem System";
        }
    }
}