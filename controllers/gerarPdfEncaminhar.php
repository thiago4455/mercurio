<?php
    session_start();

    $alunosSelecionados = $_GET['alunosSelecionados'];
    $empresa = $_GET['empresa'];

    $alunosSelecionados = explode("," , $alunosSelecionados);

    require_once('../models/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "root", "dbmercurio");

        # MySQL UTF-8
        $objConexao->executarComandoSQL("SET NAMES 'utf8'");
        $objConexao->executarComandoSQL('SET character_set_connection=utf8');
        $objConexao->executarComandoSQL('SET character_set_client=utf8');
        $objConexao->executarComandoSQL('SET character_set_results=utf8');   

        $length = sizeof($alunosSelecionados);
        $queryBusca = "SELECT * From alunos WHERE";

        $i = 0;
        foreach($alunosSelecionados as $aluno) {
            $i = $i + 1;
            if($i != $length) {
                $queryBusca = $queryBusca . " Ra = ". $aluno ." OR";
            } else {
                $queryBusca = $queryBusca . " Ra = ". $aluno .";";
            }
        }

        $queryBuscaEmpresa = "SELECT * From Empresas WHERE codEmpresa LIKE '" . $empresa . "';";

        $queryResp = $objConexao->selecionarDados($queryBusca);
        $queryRespNomeEmpresa = $objConexao->selecionarDados($queryBuscaEmpresa);

        $dataRelatorio = date("d/m/Y");        

        $tabela = '<html> <header> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> <meta http-equiv="X-UA-Compatible" content="ie=edge"> <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> </header> <body> <style> th {font-size: 12px}; td {font-size: 10px}; </style> <img style="width: 140px; height: 35px" src="../assets/img/logo_grande.jpg" alt="Logo Senai"/> <h1 style="text-align: center; font-size: 1.5rem; font-weight: bold; margin: 30px 0 50px"> Lista de Encaminhamento para '. $queryRespNomeEmpresa[0]['nomeFantasia'] .'</h1>  <p> Segue abaixo o relatório do encaminhamento de '. $length .' aluno(s) para a empresa '. $queryRespNomeEmpresa[0]['nomeFantasia'] .', de razão social '. $queryRespNomeEmpresa[0]['razaoSocial'] .' e cnpj '. $queryRespNomeEmpresa[0]['cnpj'] .': </p> <table class="table table-sm" style="margin: 30px 0 100px"> <tr> <th> Registro Academico </th> <th> Nome </th> <th> Cpf </th> <th> Idade </th> <th> Sexo </th> <th> Nome Curso </th> </tr>';

        foreach($queryResp as $item) {
            $tabela = $tabela . '<tr> <td style="font-size: 10px"> '. $item['Ra'] .' </td> <td style="font-size: 10px"> '. $item['Nome'] .' </td> <td style="font-size: 10px"> '. $item['Cpf'] .' </td> <td style="font-size: 10px"> '. $item['Idade'] .' </td> <td style="font-size: 10px"> '. $item['Sexo'] .' </td> <td style="font-size: 10px"> '. $item['NomeCurso'] .' </td> </tr>';
        }

        $tabela = $tabela . '</table> <hr style="width: 300px;margin: 0 auto 10px; background: #222"> <h6 style="font-size: 14px; text-align:center"> '. $_SESSION['nomeLog'] .' </h6> <h6  style="font-size: 10px; text-align:center"> '. $dataRelatorio. ' </h6> </body> </html>';

        $data = date("m-d-y H.i.s");
        $time = time();

        $nomeArquivo = "Relatório de Encaminhamento para ". $queryRespNomeEmpresa[0]['nomeFantasia'] ." (" . $data . ")";

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