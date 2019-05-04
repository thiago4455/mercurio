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
    <link rel="stylesheet" href="fonts/fontes.css">

    <!-- Home.css -->
    <link rel="stylesheet" href="css/home.css">

    <!-- Navbar.css -->
    <link rel="stylesheet" href="css/navbar.css">
</head>

<body>

    <?php
        session_start();
        if($_SESSION['idLog'] == "") {
            header('Location: index.php');
        }
	?>

    <!-- Navbars -->
    <div id="nav">
        <div id="nav-logo">
            <img src="assets/img/logo_grande.jpg" alt="Logo Senai">
        </div>
        <div id="nav-log-info">
            <h1>Logado como: </h1>
            <h2 id="log-info-nome"><?php echo $_SESSION['nomeLog'] ?></h2>
        </div>
        <div class="dropdown">
            <button id="btn-drop" class="btn dropdown-toggle" type="button" id="btn-drop" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
            </button>
            <div class="dropdown-menu" aria-labelledby="btn-drop">
                <a class="dropdown-item" href="#">Meu Perfil</a>
                <a class="dropdown-item" id="sair" href="signout.php">Sair</a>
            </div>
        </div>
        
    </div>

    <!-- --------------------------- -->
    <div id="main">
        <div id="nav-lateral">
            <div id="title-navlat">Opções</div>
            <div id="nav-ciclos" class="item-nav item-nav-active"><i class="fas fa-redo"></i><p>Novo Ciclo</p></div>
            <div id="nav-alunos" class="item-nav"><i class="fas fa-users"></i><p>Alunos</p></div>
            <div id="nav-empresas" class="item-nav"><i class="fas fa-building"></i><p>Empresas</p></div>
            <div id="nav-relatorios" class="item-nav"><i class="fas fa-list-alt"></i><p>Relatórios</p></div>
        </div>

        <div id="center">
            <iframe src="home/alunos.php" frameborder="0" id="iframe-home"></iframe>
        </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script>
    $(window).on('load', () => {
        pageHide = () => {
            $('#page-load').css('display', 'none')
        }

        setTimeout(pageHide, 500)
    })

    $(document).ready(() => {

        $('.item-nav').click(function() {
            $('.item-nav').removeClass('item-nav-active')
            id = $(this).attr("id");
            $('#'+id).addClass('item-nav-active')

            if(id == 'nav-ciclos') {
                $('#iframe-home').attr('src', 'home/ciclos.php'); 
            } else if (id == 'nav-alunos') {
                $('#iframe-home').attr('src', 'home/alunos.php'); 
            } else if (id == 'nav-empresas') {
                $('#iframe-home').attr('src', 'home/empresas.php'); 
            } else if(id == 'nav-relatorios') {
                $('#iframe-home').attr('src', 'home/relatorios.php'); 

            }
        })

        $('#nav-logo').click(() => {
            window.location.href = 'index.php'
        })

    })
    </script>

</body>

</html>