<!doctype html>
<html lang="pt-br">

<head>
    <title>Senai - Sistema FIEMG</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/icons/favicon.ico" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Fontes -->
    <link rel="stylesheet" href="../fonts/fontes.css">

    <!-- Relatórios.css -->
    <link rel="stylesheet" href="css/relatorios.css"> 

</head>

<body>

    <div class="div-not-found">
            <i class="fas fa-exclamation-triangle"></i>
            <h1 id="msg-notFound">Nenhum Relatório Encontrado</h1>
        </div>

    <div id="main">
        <h1>Relatórios</h1>

        <div class="table-responsive">
            <table id='tableBody' class="table">
                <thead class="thead">
                    <tr>
                        <th>Nome do Relatório</th>
                        <th>Data</th>
                        <th>Tamanho</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $arrayFiles = scandir('../relatorios/');

                        if(sizeof($arrayFiles) > 3) {
                            
                            for ($i = 2; $i < sizeof($arrayFiles); $i++) {
                                if($arrayFiles[$i]!='README.md'){
                                    $caminho = '../relatorios/'. $arrayFiles[$i];
                                    $tamanho = (filesize($caminho) / 1000);
                                    $nome = $arrayFiles[$i];
                                    $length = strlen($nome);
                                    $data = $nome[$length-22] . $nome[$length-21] . '/' . $nome[$length-19] . $nome[$length-18] . '/20' . $nome[$length-16] . $nome[$length-15]; 
        
        
                                    echo '<tr>';
                                    echo '<td> <a href="'. $caminho .'">'. $nome .'</a> </td>';
                                    echo '<td> '. $data .' </td>';
                                    echo '<td> '. $tamanho .' kb</td>';
                                    echo '</tr>';
                                }
                            }
                        }
                        else {
                            echo '<script> tabela = document.querySelector("#main"); tabela.style.display = "none" ; notFound = document.querySelector(".div-not-found"); notFound.style.display = "flex"; </script>';
                        }
                        
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
        src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</body>

</html>