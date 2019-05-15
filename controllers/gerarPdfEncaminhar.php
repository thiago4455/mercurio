<?php
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

        $queryBuscaNomeEmpresa = "SELECT nomeFantasia From empresas WHERE codEmpresa LIKE '" . $empresa . "';";

        $queryResp = $objConexao->selecionarDados($queryBusca);
        $queryRespNomeEmpresa = $objConexao->selecionarDados($queryBuscaNomeEmpresa);

        

        $tabela = '<html> <table> <tr> <th> Lista de Encaminhamento para '. $queryRespNomeEmpresa[0]['nomeFantasia'] .'</th> </tr> <tr> <th> Registro Academico </th> <th> Nome </th> <th> Cpf </th> <th> Idade </th> <th> Sexo </th> <th> Nome Curso </th> </tr>';

        foreach($queryResp as $item) {
            $tabela = $tabela . '<tr> <td> '. $item['Ra'] .' </td> <td> '. $item['Nome'] .' </td> <td> '. $item['Cpf'] .' </td> <td> '. $item['Idade'] .' </td> <td> '. $item['Sexo'] .' </td> <td> '. $item['NomeCurso'] .' </td> </tr>';
        }

        $tabela = $tabela . '</table> </html>';

        use Dompdf\Dompdf;
        require_once 'dompdf/autoload.inc.php';
        $dompdf = new DOMPDF();
        $dompdf->load_html($tabela);
        $dompdf->render();
        $dompdf->stream(
            "teste.pdf",
            array(
                "Attachment" => false
            )
        );

?>