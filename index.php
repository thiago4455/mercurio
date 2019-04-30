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
        session_destroy();
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
            <form action="" method="POST" id="form_login">
                <h1 id="form-title">Biblioteca</h1>
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
                <button name="btn_login" class="btn" id="btn-login" type="submit">Logar</button>
            </form>
        </div>
    </div>

    <?php
		session_start();
		if(isset($_POST['btn_login'])) {
			$email = ($_POST['ipt_email']);
			$senha = ($_POST['ipt_senha']);

			if(($email == "") || ($senha == "")) {
				echo "<script> document.getElementById('alert-error').style.display = 'flex'; document.getElementById('error-msg').innerHTML = 'Preencha todos os campos' </script>";
			} else {
				require_once('class/ClassLogin.php');
				$objLogin = new ClassLogin();
				$objLogin->setEmail($email);
				$objLogin->setSenha($senha);
				$queryResp = $objLogin->Login($objLogin);

				if ($queryResp == "User not exists") {
					echo "<script> document.getElementById('alert-error').style.display = 'flex'; document.getElementById('error-msg').innerHTML = 'Usuário ou senha incorretos' </script>";
				}
				else if ($queryResp == "Problem System") {
					echo "<script> document.getElementById('alert-error').style.display = 'flex'; document.getElementById('error-msg').innerHTML = 'Erro no sistema. Tente novamente mais tarde' </script>";
				}
				else {
                    $_SESSION['idLog'] = $queryResp[0]['idFunc'];
                    $_SESSION['nomeLog'] = $queryResp[0]['nomeFunc'];
					header('Location: home.php');
				}
			}
		}
	?>

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

    <script src="js/navbar.js"></script>

    <script>
    $(window).on('load', () => {
        pageHide = () => {
            $('#page-load').css('display', 'none')
        }

        setTimeout(pageHide, 500)
    })

    $(document).ready(() => {

        $('#nav-logo').click(() => {
            window.location.href = 'index.php'
        })

        $(".alert").alert();
        $('.close').click((e) => {
            e.preventDefault()
            $('.alert').css('display', 'none')
        })

        $('#btn-login').click(() => {
            $('#btn-login').text('Logando...')
        })
    })
    </script>

</body>

</html>