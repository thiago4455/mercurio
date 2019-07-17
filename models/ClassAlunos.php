<?php
class ClassAlunos {    
    //Getters
    function getNome(){
        return $this->nome;
    }    
    function getRa(){
        return $this->ra;
    }
    function getIdade1(){
        return $this->idade1;
    }
    function getIdade2(){
        return $this->idade2;
    }
    function getSexo(){
        return $this->sexo;
    }
    function getGrauInstrucao(){
        return $this->grauInstrucao;
    }
    function getBairro(){
        return $this->bairro;
    }
    function getEstado(){
        return $this->estado;
    }
    function getCidade(){
        return $this->cidade;
    }
    function getCep(){
        return $this->cep;
    }
    function getTelefone(){
        return $this->telefone;
    }
    function getIdentidade(){
        return $this->identidade;
    }
    function getCpf(){
        return $this->cpf;
    }
    function getEmail(){
        return $this->email;
    }
    function getCarteiraTrabalho(){
        return $this->carteiraTrabalho;
    }
    function getNomePai(){
        return $this->nomePai;
    }
    function getNomeMae(){
        return $this->nomeMae;
    }
    function getNomeCurso(){
        return $this->nomeCurso;
    }
    function getCodTurma(){
        return $this->codTurma;
    }
    function getStatus(){
        return $this->status;
    }
    
    //Setters
    function setNome($nome){
        $this->nome = $nome;
    }    
    function setRa($ra){
        $this->ra = $ra;
    }
    function setIdade1($idade){
        $this->idade1 = $idade;
    }
    function setIdade2($idade){
        $this->idade2 = $idade;
    }
    function setSexo($sexo){
        $this->sexo = $sexo;
    }
    function setGrauInstrucao($grauInstrucao){
        $this->grauInstrucao = $grauInstrucao;
    }
    function setBairro($bairro){
        $this->bairro = $bairro;
    }
    function setEstado($estado){
        $this->estado = $estado;
    }
    function setCidade($cidade){
        $this->cidade = $cidade;
    }
    function setCep($cep){
        $this->cep = $cep;
    }
    function setTelefone($telefone){
        $this->telefone = $telefone;
    }
    function setIdentidade($identidade){
        $this->identidade = $identidade;
    }
    function setCpf($cpf){
        $this->cpf = $cpf;
    }
    function setEmail($email){
        $this->email = $email;
    }
    function setCarteiraTrabalho($carteiraTrabalho){
        $this->carteiraTrabalho = $carteiraTrabalho;
    }
    function setNomePai($nomePai){
        $this->nomePai = $nomePai;
    }
    function setNomeMae($nomeMae){
        $this->nomeMae = $nomeMae;
    }
    function setNomeCurso($nomeCurso){
        $this->nomeCurso = $nomeCurso;
    }
    function setCodTurma($codTurma){
        $this->codTurma = $codTurma;
    }
    function setStatus($status){
        $this->status = $status;
    }


    public function RetAlunos() {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "root", "dbmercurio");
                # MySQL UTF-8
                $objConexao->executarComandoSQL("SET NAMES 'utf8'");
                $objConexao->executarComandoSQL('SET character_set_connection=utf8');
                $objConexao->executarComandoSQL('SET character_set_client=utf8');
                $objConexao->executarComandoSQL('SET character_set_results=utf8');        
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

    public function RetCiclos() {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "root", "dbmercurio");
                # MySQL UTF-8
                $objConexao->executarComandoSQL("SET NAMES 'utf8'");
                $objConexao->executarComandoSQL('SET character_set_connection=utf8');
                $objConexao->executarComandoSQL('SET character_set_client=utf8');
                $objConexao->executarComandoSQL('SET character_set_results=utf8');        
        try {
            $tableAlunos = $objConexao->selecionarDados("SELECT DISTINCT(Semestre) FROM Alunos");

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


    public function BuscaAlunos($busca) {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "root", "dbmercurio");
                # MySQL UTF-8
                $objConexao->executarComandoSQL("SET NAMES 'utf8'");
                $objConexao->executarComandoSQL('SET character_set_connection=utf8');
                $objConexao->executarComandoSQL('SET character_set_client=utf8');
                $objConexao->executarComandoSQL('SET character_set_results=utf8');        
        try {
            $tableAlunos = $objConexao->selecionarDados("SELECT * FROM Alunos WHERE (Nome LIKE '%$busca%') OR (Ra LIKE '%$busca%') OR (Cpf LIKE '%$busca%') OR (Telefone1 LIKE '%$busca%') OR (Telefone2 LIKE '%$busca%')");

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

    public function BuscaAvancada($objAlunos) {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "root", "dbmercurio");
                # MySQL UTF-8
                $objConexao->executarComandoSQL("SET NAMES 'utf8'");
                $objConexao->executarComandoSQL('SET character_set_connection=utf8');
                $objConexao->executarComandoSQL('SET character_set_client=utf8');
                $objConexao->executarComandoSQL('SET character_set_results=utf8');        
        try {

            $busca = "SELECT * FROM Alunos WHERE (Nome != '') ";

            if($objAlunos->getNome()!='') $busca = $busca . " AND (Nome LIKE '%".$objAlunos->getNome()."%')";
            if($objAlunos->getRa()!='') $busca = $busca . " AND (Ra LIKE '%".$objAlunos->getRa()."%')";
            if($objAlunos->getIdade1()!='' && $objAlunos->getIdade2()!='') $busca = $busca . " AND (Idade BETWEEN ".$objAlunos->getIdade1()." AND ".$objAlunos->getIdade2().")";
            else if($objAlunos->getIdade1()!='') $busca = $busca . " AND (Idade = ".$objAlunos->getIdade1().")";
            if($objAlunos->getSexo()!='') $busca = $busca . " AND (Sexo LIKE '%".$objAlunos->getSexo()."%')";
            if($objAlunos->getGrauInstrucao()!='') $busca = $busca . " AND (GrauInstrucao LIKE '%".$objAlunos->getGrauInstrucao()."%') AND";            
            if($objAlunos->getBairro()!='') $busca = $busca . " AND (Bairro LIKE '%".$objAlunos->getBairro()."%')";   
            if($objAlunos->getEstado()!='') $busca = $busca . " AND (Estado LIKE '%".$objAlunos->getEstado()."%')";   
            if($objAlunos->getCidade()!='') $busca = $busca . " AND (Cidade LIKE '%".$objAlunos->getCidade()."%')";   
            if($objAlunos->getTelefone()!='') $busca = $busca . " AND ((Telefone1 LIKE '%".$objAlunos->getTelefone()."%') OR (Telefone2 LIKE '%".$objAlunos->getTelefone()."%') OR (TelefonePai LIKE '%".$objAlunos->getTelefone()."%') OR (TelefoneMae LIKE '%".$objAlunos->getTelefone()."%'))";   
            if($objAlunos->getIdentidade()!='') $busca = $busca . " AND (Identidade LIKE '%".$objAlunos->getIdentidade()."%')";   
            if($objAlunos->getCpf()!='') $busca = $busca . " AND (Cpf LIKE '%".$objAlunos->getCpf()."%')";   
            if($objAlunos->getEmail()!='') $busca = $busca . " AND (Email LIKE '%".$objAlunos->getEmail()."%\')";   
            if($objAlunos->getCarteiraTrabalho()!='') $busca = $busca . " AND (CarteiraTrabalho LIKE \'%".$objAlunos->getCarteiraTrabalho()."%\') AND";   
            if($objAlunos->getNomePai()!='') $busca = $busca . " AND (NomePai LIKE '%".$objAlunos->getNomePai()."%')";   
            if($objAlunos->getNomeMae()!='') $busca = $busca . " AND (NomeMae LIKE '%".$objAlunos->getNomeMae()."%')"; 
            if($objAlunos->getCodTurma()!='') $busca = $busca . " AND (CodTurma LIKE '%".$objAlunos->getCodTurma()."%')"; 
            if($objAlunos->getStatus()!='') $busca = $busca . " AND (Status LIKE '%".$objAlunos->getStatus()."%')"; 
            


            $tableAlunos = $objConexao->selecionarDados($busca);
            //return $busca;
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