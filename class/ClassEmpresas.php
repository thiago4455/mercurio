<?php
class ClassEmpresas {

    private $nomeFantasia;
    private $razaoSocial;
    private $nomeResponsavel;
    private $cnpj;
    private $email;
    private $telefone;
    private $cep;
    private $endereco;
    private $numero;
    private $bairro;
    private $cidade;
    private $estado;
    private $apelido;

    function getNomeFantasia() {
        return $this->nomeFantasia;
    }

    function getRazaoSocial() {
        return $this->razaoSocial;
    }

    function getNomeResponsavel() {
        return $this->nomeResponsavel;
    }

    function getCnpj() {
        return $this->cnpj;
    }

    function getEmail() {
        return $this->email;
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

    function getApelido() {
        return $this->apelido;
    }

    function setNomeFantasia($nomeFantasia) {
        $this->nomeFantasia = $nomeFantasia;
    }

    function setRazaoSocial($razaoSocial) {
        $this->razaoSocial = $razaoSocial;
    }

    function setNomeResponsavel($nomeResponsavel) {
        $this->nomeResponsavel = $nomeResponsavel;
    }

    function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    function setEmail($email) {
        $this->email = $email;
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

    function setApelido($apelido) {
        $this->apelido = $apelido;
    }

    

    public function VerificarDuplicidade($objCadastro) {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "root", "dbmercurio");

        $cnpj = $objCadastro->getCnpj();
        $apelido = $objCadastro->getApelido();

        $verificarCnpj = $objConexao->selecionarDados("SELECT * FROM Empresas WHERE cnpj = '$cnpj'");
        $verificarApelido = $objConexao->selecionarDados("SELECT * FROM Empresas WHERE codEmpresa = '$apelido'");

        if(($verificarCnpj != 'ERRO') && ($verificarApelido != 'ERRO')) {
            return 'cnpj e apelido ja utilizados';
        }
        else if ($verificarCnpj != 'ERRO') {
            return 'cnpj ja utilizado';
        }
        else if($verificarApelido != 'ERRO') {
            return 'apelido ja utilizado';
        }
        else {
            $queryCadastro = $this->CadastrarEmpresa($objCadastro);

            return $queryCadastro;
        }
    }

    public function CadastrarEmpresa($objCadastro) {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "root", "dbmercurio");

        $objConexao->executarComandoSQL("SET NAMES 'utf8'");
        $objConexao->executarComandoSQL('SET character_set_connection=utf8');
        $objConexao->executarComandoSQL('SET character_set_client=utf8');
        $objConexao->executarComandoSQL('SET character_set_results=utf8');    

        $nomeFantasia = $objCadastro->getNomeFantasia();
        $razaoSocial = $objCadastro->getRazaoSocial();
        $nomeResponsavel = $objCadastro->getNomeResponsavel();
        $cnpj = $objCadastro->getCnpj();
        $email = $objCadastro->getEmail();
        $telefone = $objCadastro->getTelefone();
        $cep = $objCadastro->getCep();
        $endereco = $objCadastro->getEndereco();
        $numero = $objCadastro->getNumero();
        $bairro = $objCadastro->getBairro();
        $cidade = $objCadastro->getCidade();
        $estado = $objCadastro->getEstado();
        $apelido = $objCadastro->getApelido();

        try {
            if($objConexao->executarComandoSQL("INSERT INTO `empresas` (`codEmpresa`, `cnpj`, `nomeFantasia`, `razaoSocial`, `telefone`, `email`, `responsavel`, `cep`, `rua`, `numero`, `bairro`, `cidade`, `estado`) VALUES ('$apelido', '$cnpj', '$nomeFantasia', '$razaoSocial', '$telefone', '$email', '$nomeResponsavel', '$cep', '$endereco', '$numero', '$bairro', '$cidade', '$estado');")) {
                return true;
            }
        }
        catch(Exception $err) {
            return $err;
        }
    }

    public function RetEmpresas() {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "root", "dbmercurio");
        # MySQL UTF-8
        $objConexao->executarComandoSQL("SET NAMES 'utf8'");
        $objConexao->executarComandoSQL('SET character_set_connection=utf8');
        $objConexao->executarComandoSQL('SET character_set_client=utf8');
        $objConexao->executarComandoSQL('SET character_set_results=utf8');        
        try {
            $tableAlunos = $objConexao->selecionarDados("SELECT * FROM Empresas ORDER BY codEmpresa ASC");

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

    public function BuscaEmpresas($busca) {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "root", "dbmercurio");
                # MySQL UTF-8
                $objConexao->executarComandoSQL("SET NAMES 'utf8'");
                $objConexao->executarComandoSQL('SET character_set_connection=utf8');
                $objConexao->executarComandoSQL('SET character_set_client=utf8');
                $objConexao->executarComandoSQL('SET character_set_results=utf8');        
        try {
            $tableEmpresas = $objConexao->selecionarDados("SELECT * FROM Empresas WHERE (codEmpresa LIKE '%$busca%') OR (cnpj LIKE '%$busca%') OR (nomeFantasia LIKE '%$busca%') OR (razaoSocial LIKE '%$busca%') ORDER BY codEmpresa ASC");

            if($tableEmpresas === "ERRO") {          
                return 'Not found';             
            }
            else {
                return $tableEmpresas;
            }
        }
        catch(Exception $err) {
            return "Problem System";
        }
    }
}