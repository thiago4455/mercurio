<!doctype html>
<html lang="pt-br">

<head>
    <title>Senai - Sistema FIEMG</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/icons/favicon.ico" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Fontes -->
    <link rel="stylesheet" href="fonts/fontes.css">

    <!-- Loading.css -->
    <link rel="stylesheet" href="css/loading.css">

    <!-- Login.css -->
    <link rel="stylesheet" href="css/login.css">

    <!-- Navbar.css -->
    <link rel="stylesheet" href="css/navbar.css">
</head>

<body>


    <?php
        session_start();
        if(isset($_SESSION['idLog'])) {
            header('Location: home.php');
        }
        
    ?>


    <!-- Loading Page -->
    <div id="page-load">
		<h1>Senai</h1>
		<div class="lds-ellipsis">
			<div></div>
			<div></div>
			<div></div>
			<div></div>
		</div>
	</div>


    <!-- Navbars -->
    <div id="nav">
        <div id="nav-logo">
            <img src="assets/img/logo_grande.jpg" alt="Logo Senai">
        </div>
    </div>

    <!-- --------------------------- -->

    <div id="main">
        <div id="section-login">
            <h1 id="form-title">Login</h1>
            <input name="ipt_email" id="ipt_email" type="email" class="input-login" placeholder="Digite seu email"
                require>
            <input name="ipt_senha" id="ipt_senha" type="password" class="input-login"
                placeholder="Digite sua senha" require>
            <div id="alert-error" class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p id="error-msg"></p>
            </div>
            <button name="btn_login" class="btn" id="btn-login">Logar</button>
            <button type="button" class="btn" id="btn-esqueci" data-toggle="modal" data-target="#modal-recuperar">
                Esqueci minha senha
            </button>

        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="modal-recuperar" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Recuperação de Senha</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Para recuperar sua senha, digite o seu endereço de email abaixo:</p>
                        <input type="email" class="input-login form-control" id="ipt-emailRecuperar" placeholder="Digite seu email" autocomplete="off"/>
                        <!-- Mensagens -->
                        <div id="alert-modal-error" style="align-items: center; padding: 10px 30px" class="alert alert-modal alert-danger col-12" role="alert">
                            <span style="font-weight: 600">Erro!</span><h6 style="margin: 0 0 0 7px; line-height: 0" id="error-msg-modal"></h6>
                        </div>
                        <div id="alert-modal-success" style="align-items: center; padding: 10px 30px" class="alert alert-modal alert-success col-12" role="alert">
                            <span style="font-weight: 600">Sucesso!</span><h6 style="margin: 0 0 0 7px; line-height: 0" id="success-msg-modal">Um email com sua senha foi enviado para você</h6>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-danger" id="btn-recuperar">Recuperar Senha</button>
                    </div>
                </div>
            </div>
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script
        src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="js/login.js"></script>

</body>

</html>