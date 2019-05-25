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

    function getSemestre(){
        return $this->semestre;
    }

    function setSemestre($semestre){
        $this->semestre = $semestre;
    }


    public function RetAlunos($ciclo) {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass();
                # MySQL UTF-8
                $objConexao->executarComandoSQL("SET NAMES 'utf8'");
                $objConexao->executarComandoSQL('SET character_set_connection=utf8');
                $objConexao->executarComandoSQL('SET character_set_client=utf8');
                $objConexao->executarComandoSQL('SET character_set_results=utf8');        
        try {
            $tableAlunos = $objConexao->selecionarDados("SELECT A.Ra, A.Nome, A.DataNasc, A.Idade, A.Sexo, A.GrauInstrucao, A.Rua, A.Numero, A.Complemento, A.Bairro, A.Estado, A.Cidade, A.Cep,A.Telefone1, A.Telefone2, A.Identidade, A.Cpf, A.Email, A.CarteiraTrabalho, A.NomePai, A.TelefonePai, A.NomeMae, A.TelefoneMae, A.NomeCurso, A.CodTurma, A.Semestre, IFNULL(E.Status,'Em Espera') AS Status FROM Alunos AS A LEFT JOIN Encaminhados AS E ON (A.Ra = E.Alunos_ra) WHERE A.Semestre='".$ciclo."' AND A.Ra NOT IN (Select Alunos_ra FROM Encaminhados WHERE Status != 'Reprovado');");

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
    
    public function RetHistoricos($ciclo) {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass();
                # MySQL UTF-8
                $objConexao->executarComandoSQL("SET NAMES 'utf8'");
                $objConexao->executarComandoSQL('SET character_set_connection=utf8');
                $objConexao->executarComandoSQL('SET character_set_client=utf8');
                $objConexao->executarComandoSQL('SET character_set_results=utf8');        
        try {
            $tableAlunos = $objConexao->selecionarDados("SELECT A.Ra, A.Nome, A.DataNasc, A.Idade, A.Sexo, A.GrauInstrucao, A.Rua, A.Numero, A.Complemento, A.Bairro, A.Estado, A.Cidade, A.Cep,A.Telefone1, A.Telefone2, A.Identidade, A.Cpf, A.Email, A.CarteiraTrabalho, A.NomePai, A.TelefonePai, A.NomeMae, A.TelefoneMae, A.NomeCurso, A.CodTurma, A.Semestre AS Status, COUNT(H.alunoRa) AS Reprovacoes FROM Alunos AS A RIGHT JOIN Historico AS H ON (A.Ra = H.alunoRa) WHERE H.ciclo='".$ciclo."' GROUP BY H.alunoRa;");

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

    public function BuscaHistoricoRa($ra){
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass();
                # MySQL UTF-8
                $objConexao->executarComandoSQL("SET NAMES 'utf8'");
                $objConexao->executarComandoSQL('SET character_set_connection=utf8');
                $objConexao->executarComandoSQL('SET character_set_client=utf8');
                $objConexao->executarComandoSQL('SET character_set_results=utf8');        
        try {
            $tableAlunos = $objConexao->selecionarDados("SELECT A.Ra, A.Nome, H.descricao FROM Alunos AS A RIGHT JOIN Historico AS H ON (A.Ra = H.alunoRa) WHERE H.alunoRa='$ra';");

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

    public function RetEncaminhados($ciclo){

        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass();
                # MySQL UTF-8
                $objConexao->executarComandoSQL("SET NAMES 'utf8'");
                $objConexao->executarComandoSQL('SET character_set_connection=utf8');
                $objConexao->executarComandoSQL('SET character_set_client=utf8');
                $objConexao->executarComandoSQL('SET character_set_results=utf8');        
        try {
            $tableAlunos = $objConexao->selecionarDados("SELECT A.Ra, A.Nome, A.DataNasc, A.Idade, A.Sexo, A.GrauInstrucao, A.Rua, A.Numero, A.Complemento, A.Bairro, A.Estado, A.Cidade, A.Cep,A.Telefone1, A.Telefone2, A.Identidade, A.Cpf, A.Email, A.CarteiraTrabalho, A.NomePai, A.TelefonePai, A.NomeMae, A.TelefoneMae, A.NomeCurso, A.CodTurma, A.Semestre, E.Empresas_codEmpresa AS codEmpresa, IFNULL(E.Status,'Em Espera') AS Status FROM Alunos AS A LEFT JOIN Encaminhados AS E ON (A.Ra = E.Alunos_ra) WHERE A.Semestre='".$ciclo."' AND A.Ra IN (Select Alunos_ra FROM Encaminhados);");

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
        $objConexao = new ConexaoClass();
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

    public function RetCiclosHistorico() {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass();
                # MySQL UTF-8
                $objConexao->executarComandoSQL("SET NAMES 'utf8'");
                $objConexao->executarComandoSQL('SET character_set_connection=utf8');
                $objConexao->executarComandoSQL('SET character_set_client=utf8');
                $objConexao->executarComandoSQL('SET character_set_results=utf8');        
        try {
            $tableAlunos = $objConexao->selecionarDados("SELECT DISTINCT(ciclo) FROM Historico");

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

    public function BuscaAlunos($busca, $semestre) {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass();
                # MySQL UTF-8
                $objConexao->executarComandoSQL("SET NAMES 'utf8'");
                $objConexao->executarComandoSQL('SET character_set_connection=utf8');
                $objConexao->executarComandoSQL('SET character_set_client=utf8');
                $objConexao->executarComandoSQL('SET character_set_results=utf8');     
        try {
            $tableAlunos = $objConexao->selecionarDados("SELECT A.Ra, A.Nome, A.DataNasc, A.Idade, A.Sexo, A.GrauInstrucao, A.Rua, A.Numero, A.Complemento, A.Bairro, A.Estado, A.Cidade, A.Cep,A.Telefone1, A.Telefone2, A.Identidade, A.Cpf, A.Email, A.CarteiraTrabalho, A.NomePai, A.TelefonePai, A.NomeMae, A.TelefoneMae, A.NomeCurso, A.CodTurma, A.Semestre, IFNULL(E.Status,'Em Espera') AS Status FROM Alunos AS A LEFT JOIN Encaminhados AS E ON (A.Ra = E.Alunos_ra) WHERE ((A.Nome LIKE '%$busca%') OR (A.Ra LIKE '%$busca%') OR (A.Cpf LIKE '%$busca%') OR (A.Email LIKE '%$busca%') OR (A.Telefone1 LIKE '%$busca%') OR (A.Telefone2 LIKE '%$busca%')) AND A.Semestre='$semestre' AND Ra NOT IN (Select Alunos_ra FROM Encaminhados WHERE Status != 'Reprovado')");
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
    
    public function BuscaEncaminhados($busca, $semestre) {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass();
                # MySQL UTF-8
                $objConexao->executarComandoSQL("SET NAMES 'utf8'");
                $objConexao->executarComandoSQL('SET character_set_connection=utf8');
                $objConexao->executarComandoSQL('SET character_set_client=utf8');
                $objConexao->executarComandoSQL('SET character_set_results=utf8');     
        try {
            $tableAlunos = $objConexao->selecionarDados("SELECT A.Ra, A.Nome, A.DataNasc, A.Idade, A.Sexo, A.GrauInstrucao, A.Rua, A.Numero, A.Complemento, A.Bairro, A.Estado, A.Cidade, A.Cep,A.Telefone1, A.Telefone2, A.Identidade, A.Cpf, A.Email, A.CarteiraTrabalho, A.NomePai, A.TelefonePai, A.NomeMae, A.TelefoneMae, A.NomeCurso, A.CodTurma, A.Semestre, E.Empresas_codEmpresa AS codEmpresa, IFNULL(E.Status,'Em Espera') AS Status FROM Alunos AS A LEFT JOIN Encaminhados AS E ON (A.Ra = E.Alunos_ra) WHERE ((A.Nome LIKE '%$busca%') OR (A.Ra LIKE '%$busca%') OR (A.Cpf LIKE '%$busca%') OR (A.Email LIKE '%$busca%') OR (A.Telefone1 LIKE '%$busca%') OR (A.Telefone2 LIKE '%$busca%')) AND A.Semestre='$semestre' AND Ra IN (Select Alunos_ra FROM Encaminhados)");
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
    public function MudarStatus($ra, $status, $reprovado, $idFunc){
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass();
                # MySQL UTF-8
                $objConexao->executarComandoSQL("SET NAMES 'utf8'");
                $objConexao->executarComandoSQL('SET character_set_connection=utf8');
                $objConexao->executarComandoSQL('SET character_set_client=utf8');
                $objConexao->executarComandoSQL('SET character_set_results=utf8');        
        try {

            $query = "UPDATE Encaminhados SET `Status` = '$status' WHERE Alunos_ra IN ($ra)";
            $ras = explode(',',$ra);
            if($reprovado != ''){
                $query2 = "INSERT INTO Historico(alunoRa,empresaCod,funcionarioId,descricao, ciclo) VALUES ";
                for ($i = 0; $i < count($ras); $i++){
                    $query2 .= ("('" . $ras[$i] . "',(SELECT Empresas_codEmpresa FROM Encaminhados WHERE Alunos_ra = '" . $ras[$i] . "'),$idFunc,'$reprovado',(SELECT Semestre FROM Alunos WHERE Ra = '" . $ras[$i] . "'))". (($i < (count($ras)-1))?",":";"));
                }
                $objConexao->executarComandoSQL($query2);
            }
            return $objConexao->executarComandoSQL($query);
        }
        catch(Exception $err) {
            return $err;
        }
    }

    public function BuscaAvancada($objAlunos) {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass();
                # MySQL UTF-8
                $objConexao->executarComandoSQL("SET NAMES 'utf8'");
                $objConexao->executarComandoSQL('SET character_set_connection=utf8');
                $objConexao->executarComandoSQL('SET character_set_client=utf8');
                $objConexao->executarComandoSQL('SET character_set_results=utf8');        
        try {

            $busca = "SELECT A.Ra, A.Nome, A.DataNasc, A.Idade, A.Sexo, A.GrauInstrucao, A.Rua, A.Numero, A.Complemento, A.Bairro, A.Estado, A.Cidade, A.Cep,A.Telefone1, A.Telefone2, A.Identidade, A.Cpf, A.Email, A.CarteiraTrabalho, A.NomePai, A.TelefonePai, A.NomeMae, A.TelefoneMae, A.NomeCurso, A.CodTurma, A.Semestre, E.Empresas_codEmpresa AS codEmpresa, IFNULL(E.Status,'Em Espera') AS Status FROM Alunos AS A LEFT JOIN Encaminhados AS E ON (A.Ra = E.Alunos_ra) WHERE (A.Semestre = '".$objAlunos->getSemestre()."') ";

            if($objAlunos->getNome()!='') $busca = $busca . " AND (A.Nome LIKE '%".$objAlunos->getNome()."%')";
            if($objAlunos->getRa()!='') $busca = $busca . " AND (A.Ra LIKE '%".$objAlunos->getRa()."%')";
            if($objAlunos->getIdade1()!='' && $objAlunos->getIdade2()!='') $busca = $busca . " AND (A.Idade BETWEEN ".$objAlunos->getIdade1()." AND ".$objAlunos->getIdade2().")";
            else if($objAlunos->getIdade1()!='') $busca = $busca . " AND (A.Idade = ".$objAlunos->getIdade1().")";
            if($objAlunos->getSexo()!='') $busca = $busca . " AND (A.Sexo LIKE '%".$objAlunos->getSexo()."%')";
            if($objAlunos->getGrauInstrucao()!='') $busca = $busca . " AND (A.GrauInstrucao LIKE '%".$objAlunos->getGrauInstrucao()."%')";            
            if($objAlunos->getBairro()!='') $busca = $busca . " AND (A.Bairro LIKE '%".$objAlunos->getBairro()."%')";   
            if($objAlunos->getEstado()!='') $busca = $busca . " AND (A.Estado LIKE '%".$objAlunos->getEstado()."%')";   
            if($objAlunos->getCidade()!='') $busca = $busca . " AND (A.Cidade LIKE '%".$objAlunos->getCidade()."%')";   
            if($objAlunos->getTelefone()!='') $busca = $busca . " AND ((A.Telefone1 LIKE '%".$objAlunos->getTelefone()."%') OR (A.Telefone2 LIKE '%".$objAlunos->getTelefone()."%') OR (A.TelefonePai LIKE '%".$objAlunos->getTelefone()."%') OR (A.TelefoneMae LIKE '%".$objAlunos->getTelefone()."%'))";   
            if($objAlunos->getIdentidade()!='') $busca = $busca . " AND (A.Identidade LIKE '%".$objAlunos->getIdentidade()."%')";   
            if($objAlunos->getCpf()!='') $busca = $busca . " AND (A.Cpf LIKE '%".$objAlunos->getCpf()."%')";   
            if($objAlunos->getEmail()!='') $busca = $busca . " AND (A.Email LIKE '%".$objAlunos->getEmail()."%\')";   
            if($objAlunos->getCarteiraTrabalho()!='') $busca = $busca . " AND (A.CarteiraTrabalho LIKE \'%".$objAlunos->getCarteiraTrabalho()."%\') AND";   
            if($objAlunos->getNomePai()!='') $busca = $busca . " AND (A.NomePai LIKE '%".$objAlunos->getNomePai()."%')";   
            if($objAlunos->getNomeMae()!='') $busca = $busca . " AND (A.NomeMae LIKE '%".$objAlunos->getNomeMae()."%')"; 
            if($objAlunos->getCodTurma()!='') $busca = $busca . " AND (A.CodTurma LIKE '%".$objAlunos->getCodTurma()."%')"; 
            if($objAlunos->getStatus()!='') $busca = $busca . " AND (E.Status LIKE '%".$objAlunos->getStatus()."%')"; 

            $busca = $busca . "AND A.Ra NOT IN (Select Alunos_ra FROM Encaminhados WHERE Status != 'Reprovado')";
            


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

    public function BuscaAvancadaEncaminhados($objAlunos) {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass();
                # MySQL UTF-8
                $objConexao->executarComandoSQL("SET NAMES 'utf8'");
                $objConexao->executarComandoSQL('SET character_set_connection=utf8');
                $objConexao->executarComandoSQL('SET character_set_client=utf8');
                $objConexao->executarComandoSQL('SET character_set_results=utf8');        
        try {

            $busca = "SELECT A.Ra, A.Nome, A.DataNasc, A.Idade, A.Sexo, A.GrauInstrucao, A.Rua, A.Numero, A.Complemento, A.Bairro, A.Estado, A.Cidade, A.Cep,A.Telefone1, A.Telefone2, A.Identidade, A.Cpf, A.Email, A.CarteiraTrabalho, A.NomePai, A.TelefonePai, A.NomeMae, A.TelefoneMae, A.NomeCurso, A.CodTurma, A.Semestre, E.Empresas_codEmpresa AS codEmpresa, IFNULL(E.Status,'Em Espera') AS Status FROM Alunos AS A LEFT JOIN Encaminhados AS E ON (A.Ra = E.Alunos_ra) WHERE (A.Semestre = '".$objAlunos->getSemestre()."') ";

            if($objAlunos->getNome()!='') $busca = $busca . " AND (A.Nome LIKE '%".$objAlunos->getNome()."%')";
            if($objAlunos->getRa()!='') $busca = $busca . " AND (A.Ra LIKE '%".$objAlunos->getRa()."%')";
            if($objAlunos->getIdade1()!='' && $objAlunos->getIdade2()!='') $busca = $busca . " AND (A.Idade BETWEEN ".$objAlunos->getIdade1()." AND ".$objAlunos->getIdade2().")";
            else if($objAlunos->getIdade1()!='') $busca = $busca . " AND (A.Idade = ".$objAlunos->getIdade1().")";
            if($objAlunos->getSexo()!='') $busca = $busca . " AND (A.Sexo LIKE '%".$objAlunos->getSexo()."%')";
            if($objAlunos->getGrauInstrucao()!='') $busca = $busca . " AND (A.GrauInstrucao LIKE '%".$objAlunos->getGrauInstrucao()."%')";            
            if($objAlunos->getBairro()!='') $busca = $busca . " AND (A.Bairro LIKE '%".$objAlunos->getBairro()."%')";   
            if($objAlunos->getEstado()!='') $busca = $busca . " AND (A.Estado LIKE '%".$objAlunos->getEstado()."%')";   
            if($objAlunos->getCidade()!='') $busca = $busca . " AND (A.Cidade LIKE '%".$objAlunos->getCidade()."%')";   
            if($objAlunos->getTelefone()!='') $busca = $busca . " AND ((A.Telefone1 LIKE '%".$objAlunos->getTelefone()."%') OR (A.Telefone2 LIKE '%".$objAlunos->getTelefone()."%') OR (A.TelefonePai LIKE '%".$objAlunos->getTelefone()."%') OR (A.TelefoneMae LIKE '%".$objAlunos->getTelefone()."%'))";   
            if($objAlunos->getIdentidade()!='') $busca = $busca . " AND (A.Identidade LIKE '%".$objAlunos->getIdentidade()."%')";   
            if($objAlunos->getCpf()!='') $busca = $busca . " AND (A.Cpf LIKE '%".$objAlunos->getCpf()."%')";   
            if($objAlunos->getEmail()!='') $busca = $busca . " AND (A.Email LIKE '%".$objAlunos->getEmail()."%\')";   
            if($objAlunos->getCarteiraTrabalho()!='') $busca = $busca . " AND (A.CarteiraTrabalho LIKE \'%".$objAlunos->getCarteiraTrabalho()."%\') AND";   
            if($objAlunos->getNomePai()!='') $busca = $busca . " AND (A.NomePai LIKE '%".$objAlunos->getNomePai()."%')";   
            if($objAlunos->getNomeMae()!='') $busca = $busca . " AND (A.NomeMae LIKE '%".$objAlunos->getNomeMae()."%')"; 
            if($objAlunos->getCodTurma()!='') $busca = $busca . " AND (A.CodTurma LIKE '%".$objAlunos->getCodTurma()."%')"; 
            if($objAlunos->getStatus()!='') $busca = $busca . " AND (E.Status LIKE '%".$objAlunos->getStatus()."%')"; 

             
            $busca = $busca . "AND A.Ra IN (Select Alunos_ra FROM Encaminhados)";
            


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