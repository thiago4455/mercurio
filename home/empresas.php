<!doctype html>
<html lang="pt-br">

<head>
    <title>Senai - Sistema FIEMG</title>
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

    <!-- Empresas.css -->
    <link rel="stylesheet" href="css/empresas.css"> 

</head>

<body>

    <!-- Modal Cadastrar -->
    <div class="modal fade modal-cadastrar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cadastrar Empresa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group col-12 col-md-12">
                            <label for="ipt-razaoSocial">Razão Social</label>
                            <input type="text" class="form-control" id="ipt-razaoSocial" placeholder="Digite a Razão Social da Empresa" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success">Concluir Cadastro</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
        </div>
    </div>

    <div id="fast-search">
        <h1 id="title-search">Buscar Empresas</h1>
        <div id="busca">
            <input type="text" id="inputSearch" placeholder="Pesquise Código, Razão Social ou Representante" autocomplete="off">
            <div id="search-avanced" class="btn">Busca Avançada</div>
        </div>
    </div>

    <div id="fast-actions">
        <button id="btn-cadastrar" type="button" class="btn btn-success" data-toggle="modal" data-target=".modal-cadastrar">Cadastrar Nova Empresa</button>
    </div>

    <script
        src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script>
        $(window).on('load', function(){
            $('#loading').css('display', 'none');
        })
    </script>

</body>

</html>