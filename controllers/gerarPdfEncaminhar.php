<?php
    session_start();

    $alunosSelecionados = $_GET['alunosSelecionados'];
    $id = $_GET['necessidade'];

    $alunosSelecionados = explode("," , $alunosSelecionados);

    require_once('../models/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "root", "dbmercurio");

        # MySQL UTF-8
        $objConexao->executarComandoSQL("SET NAMES 'utf8'");
        $objConexao->executarComandoSQL('SET character_set_connection=utf8');
        $objConexao->executarComandoSQL('SET character_set_client=utf8');
        $objConexao->executarComandoSQL('SET character_set_results=utf8');   

        $length = sizeof($alunosSelecionados);
        $queryBusca = "SELECT * From Alunos WHERE";

        // Monta Query Select
        $i = 0;
        foreach($alunosSelecionados as $aluno) {
            $i = $i + 1;
            if($i != $length) {
                $queryBusca = $queryBusca . " Ra = ". $aluno ." OR";
            } else {
                $queryBusca = $queryBusca . " Ra = ". $aluno .";";
            }
        }

        $queryBuscaEmpresa = "SELECT E.*, N.id, N.tipoContrato From Empresas AS E RIGHT JOIN Necessidade AS N ON (N.codEmpresa = E.codEmpresa) WHERE N.id = '" . $id . "';";
        $queryRespNomeEmpresa = $objConexao->selecionarDados($queryBuscaEmpresa);


        // Monta Query Update
        $queryEncaminhados = "INSERT INTO `Encaminhados` (`Alunos_ra`, `idNecessidade`, `Status`, `tipoContrato`) VALUES";
        $i = 0;
        foreach($alunosSelecionados as $aluno) {
            $i = $i + 1;
            if($i != $length) {
                $queryEncaminhados = $queryEncaminhados . " ('". $aluno ."',  ". $queryRespNomeEmpresa[0]['id'] . ",'Aguardando Aprovação', '".$queryRespNomeEmpresa[0]['tipoContrato']."') ,";
            } else {
                $queryEncaminhados = $queryEncaminhados . " ('". $aluno ."',  ". $queryRespNomeEmpresa[0]['id'] . ",'Aguardando Aprovação', '".$queryRespNomeEmpresa[0]['tipoContrato']."') ON DUPLICATE KEY UPDATE tipoContrato = VALUES(tipoContrato), idNecessidade = VALUES(idNecessidade), Status = 'Aguardando Aprovação';";
            }
        }

        $queryResp = $objConexao->selecionarDados($queryBusca);
        $queryRespEncaminhados = $objConexao->executarComandoSQL($queryEncaminhados);

        $dataRelatorio = date("d/m/Y");        

        $tabela = '<html> <header> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> <meta http-equiv="X-UA-Compatible" content="ie=edge"> <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> </header> <body> <style> th {font-size: 12px}; td {font-size: 10px}; </style> <img style="width: 140px; height: 35px" src="../assets/img/logo_grande.jpg" alt="Logo Senai"/> <h1 style="text-align: center; font-size: 1.5rem; font-weight: bold; margin: 30px 0 50px"> Lista de Encaminhamento para '. $queryRespNomeEmpresa[0]['nomeFantasia'] .'</h1>  <p> Segue abaixo o relatório do encaminhamento de '. $length .' aluno(s) para a empresa '. $queryRespNomeEmpresa[0]['nomeFantasia'] .', de razão social '. $queryRespNomeEmpresa[0]['razaoSocial'] .' e cnpj '. $queryRespNomeEmpresa[0]['cnpj'] .': </p> <table class="table table-sm" style="margin: 30px 0 100px"> <tr> <th> Registro Academico </th> <th> Nome </th> <th> Cpf </th> <th> Idade </th> <th> Sexo </th> <th> Nome Curso </th> </tr>';

        foreach($queryResp as $item) {
            $tabela = $tabela . '<tr> <td style="font-size: 10px"> '. $item['Ra'] .' </td> <td style="font-size: 10px"> '. $item['Nome'] .' </td> <td style="font-size: 10px"> '. $item['Cpf'] .' </td> <td style="font-size: 10px"> '. $item['Idade'] .' </td> <td style="font-size: 10px"> '. $item['Sexo'] .' </td> <td style="font-size: 10px"> '. $item['NomeCurso'] .' </td> </tr>';
        }

        $tabela = $tabela . '</table> <hr style="width: 300px;margin: 0 auto 10px; background: #222"> <h6 style="font-size: 14px; text-align:center"> '. $_SESSION['nomeLog'] .' </h6> <h6  style="font-size: 10px; text-align:center"> '. $dataRelatorio. ' </h6> </body> </html>';

        $data = date("d-m-y H.i.s");
        $time = time();

        $nomeArquivo = "Relatorio de Encaminhamento para ". $queryRespNomeEmpresa[0]['nomeFantasia'] ." (" . $data . ")";

        use Dompdf\Dompdf;
        require_once 'dompdf/autoload.inc.php';
        $dompdf = new DOMPDF();
        $dompdf->load_html($tabela);
        $dompdf->render();
        $dompdf->stream(
            $nomeArquivo,
            array(
                "Attachment" => false
            )
        );
        $output = $dompdf->output();
        $filename = "../relatorios/".$nomeArquivo.".pdf";
        file_put_contents($filename, $output);

?>