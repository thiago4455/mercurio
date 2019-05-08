<?php

    set_time_limit(0);

    # Informa qual o conjunto de caracteres será usado.
    header('Content-Type: text/html; charset=utf-8');

    $csvTable = $_POST['csv'];

    $filename = "../csv/".time().".csv";
    $myfile = fopen($filename, "w");
    fwrite($myfile, $csvTable);
    fclose($myfile);

    if($csvTable!=''){
        require_once('../class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "root", "dbmercurio");

        $query = "LOAD DATA LOCAL INFILE '".str_replace("\\",'/',__DIR__)."/".$filename."' REPLACE INTO TABLE Alunos FIELDS TERMINATED BY ',' IGNORE 1 LINES (Ra,Nome,DataNasc,Idade,Sexo,GrauInstrucao,Rua,Numero,Complemento,Bairro,Estado,Cidade,Cep,Telefone1,Identidade,Cpf,Email,CarteiraTrabalho,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,NomePai,TelefonePai,@dummy,@dummy,@dummy,@dummy,NomeMae,TelefoneMae,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,NomeCurso,@dummy,CodTurma,@dummy,Status,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,Telefone2,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy) SET Semestre = '".date("m.y") ."';";
        echo $query;
        $objConexao->executarComandoSQL($query);   
    }
?>