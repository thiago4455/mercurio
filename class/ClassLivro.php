<?php
class ClassLivro {

    private $nomeLivro;
    private $nomeAutor;
    private $categoria;
    private $idLivro;

    function getNomeLivro() {
        return $this->nomeLivro;
    }

    function getNomeAutor() {
        return $this->nomeAutor;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getIdLivro() {
        return $this->idLivro;
    }

    function setNomeLivro($nomeLivro) {
        $this->nomeLivro = $nomeLivro;
    }

    function setNomeAutor($nomeAutor) {
        $this->nomeAutor = $nomeAutor;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setIdLivro($idLivro) {
        $this->idLivro = $idLivro;
    }

    public function CreateId($objLivro) {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "root", "dbbiblioteca");

        $idRand = mt_rand(000000, 999999);

        $queryResp = $objConexao->selecionarDados("SELECT * FROM Livros WHERE idLivro = '$idRand'");

        if($queryResp === "ERRO") {         
            $objLivro->setIdLivro($idRand); 
            return $objLivro;
        }
        else {
            return false;
        }
    }

    public function CadastrarLivro($objLivro) {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "root", "dbbiblioteca");

        $idLivro = $objLivro->getIdLivro();
        $nomeLivro = $objLivro->getNomeLivro();
        $nomeAutor = $objLivro->getNomeAutor();
        $categoria = $objLivro->getCategoria();

        try {
            $objConexao->executarComandoSQL("INSERT INTO Livros (idLivro, nomeLivro, autorLivro, categoriaLivro) VALUES ('$idLivro', '$nomeLivro', '$nomeAutor', '$categoria')");
            return true;
            
        }
        catch(Exception $err) {
            return false;
        }
    }

    public function ListarTodosLivros() {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "root", "dbbiblioteca");

        $queryResp = $objConexao->selecionarDados("SELECT * FROM Livros ORDER BY nomeLivro ASC");

        if($queryResp === "ERRO") {         
            return false;
        }
        else {
            return $queryResp;
        }
    }

    public function BuscarLivro($termoBusca) {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "root", "dbbiblioteca");

        $queryResp = $objConexao->selecionarDados("SELECT * FROM Livros WHERE nomeLivro LIKE '%$termoBusca%' OR autorLivro LIKE '%$termoBusca%' ORDER BY nomeLivro ASC");

        if($queryResp === "ERRO") {         
            return false;
        }
        else {
            return $queryResp;
        }
    }
}