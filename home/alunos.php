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

    <!-- Alunos.css -->
    <link rel="stylesheet" href="css/alunos.css"> 

</head>

<body>
    <div id="fast-search">
        <h1>Buscar Alunos</h1>
        <div id="busca">
            <input type="text" id="inputSearch" placeholder="Pesquise por RA, Nome, Email ou CPF" autocomplete="off">
            <div id="search-avanced" class="btn">Busca Avançada</div>
        </div>
        <div id="busca-avancada">

        </div>
    </div>

    <div id="fast-actions">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="check-todos">
            <label class="custom-control-label" for="check-todos">Selecionar Todos</label>
        </div>
        <button id="btn-encaminhar" type="button" class="btn btn-success" href="#">Encaminhar Selecionados</button>
    </div>

    <table id='tableBody' class="table">
    </table>
    <div id='lds' class="lds-ring"><div>

    <div id="div-not-found">
        <i class="fas fa-exclamation-triangle"></i>
        <h1 id="msg-notFound">Aluno não Encontrado</h1>
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

    <script src="../js/alunos.js"></script>

</body>

</html>