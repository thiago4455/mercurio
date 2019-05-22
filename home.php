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
        if(!isset($_SESSION['idLog'])) {
            header('Location: index.php');
        }
	?>

    <!-- Navbars -->
    <div id="nav">
        <div id="nav-menu-cel">
            <i class="fas fa-bars"></i>
        </div>
        <div id="nav-menu">
            <i class="fas fa-bars"></i>
        </div>
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
                <a class="dropdown-item" id="profile" href="#">Meu Perfil</a>
                <a class="dropdown-item" id="sair" href="signout.php">Sair</a>
            </div>
        </div>
    </div>

    <!-- --------------------------- -->
    <div id="main">
        <div id="nav-lateral">
            <div id="title-navlat">Opções</div>
            <div id="nav-dashboard" class="item-nav item-nav-active"><i class="fas fa-home"></i><p class="item-text">Dashboard</p></div>
            <?php 
                echo $_SESSION['tipoLog']=='admin'?'<div id="nav-ciclos" class="item-nav"><i class="fas fa-redo"></i><p class="item-text">Ciclos</p></div>':'';
            ?>
            <div id="nav-alunos" class="item-nav"><i class="fas fa-users"></i><p class="item-text">Alunos</p></div>
            <div id="nav-encaminhados" class="item-nav"><i class="fas fa-address-card"></i><p class="item-text">Encaminhados</p></div>
            <div id="nav-empresas" class="item-nav"><i class="fas fa-building"></i><p class="item-text">Empresas</p></div>
            <div id="nav-funcionarios" class="item-nav"><i class="fas fa-users-cog"></i><p class="item-text">Funcionários</p></div>
            <div id="nav-relatorios" class="item-nav"><i class="fas fa-list-alt"></i><p class="item-text">Relatórios</p></div>
        </div>

        <div id="center">
            <iframe src="home/dashboard.php" frameborder="0" id="iframe-home"></iframe>
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

    window.colorActive = function(id) {
        $('.item-nav').removeClass('item-nav-active')
        $('#'+id).addClass('item-nav-active')
    }

    $(document).ready(() => {

        $('.item-nav').click(function() {
            $('#nav-lateral').removeClass('nav-lat-active');
            $('.item-nav').removeClass('item-nav-active')
            id = $(this).attr("id");
            $('#'+id).addClass('item-nav-active')

            if(id == 'nav-ciclos') {
                $('#iframe-home').attr('src', 'home/ciclos.php'); 
            } else if (id == 'nav-dashboard') {
                $('#iframe-home').attr('src', 'home/dashboard.php'); 
            } else if (id == 'nav-alunos') {
                $('#iframe-home').attr('src', 'home/alunos.php'); 
            } else if (id == 'nav-encaminhados') {
                $('#iframe-home').attr('src', 'home/encaminhados.php'); 
            } else if (id == 'nav-empresas') {
                $('#iframe-home').attr('src', 'home/empresas.php'); 
            } else if(id == 'nav-funcionarios') {
                $('#iframe-home').attr('src', 'home/funcionarios.php'); 
            } else if(id == 'nav-relatorios') {
                $('#iframe-home').attr('src', 'home/relatorios.php'); 
            }
        })

        $('#nav-logo').click(() => {
            window.location.href = 'index.php';
        });

        $('#profile').click(function() {
            $('#iframe-home').attr('src', 'home/profile.php');
        })

        $('#nav-menu-cel').click(()=>{
            $('#nav-lateral').toggleClass('nav-lat-active');
        });

        $('#nav-menu').click(function() {
            if($('#nav-lateral').css('width') == '300px') {
                $('.item-text').css('display', 'none');
                $('#title-navlat').css('display', 'none');
                $('#nav-lateral').css('width', '84px');
                $('#nav-menu').css('transform','rotate(360deg)');
                
            }
            else {
                $('#nav-lateral').css('width', '300px');
                $('#title-navlat').css('display', 'flex');
                $('.item-text').css('display', 'flex');
                $('#nav-menu').css('transform','rotate(-360deg)');
            }
        });

    })
    </script>

</body>

</html>