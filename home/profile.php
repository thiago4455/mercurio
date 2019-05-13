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

    <!-- Ciclos.css -->
    <link rel="stylesheet" href="css/profile.css">

</head>

<body>

    <?php
        session_start();
    ?>

    <div id="main">
        <h1 id="title-main">Meu Perfil</h1>
        <div class="form">
            <h1>Dados Pessoais</h1>
            <hr>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="ipt-nome">Nome Completo</label>
                    <input type="text" class="form-control" id="ipt-nome" placeholder="Digite o nome do funcionário" maxlength="60" autocomplete="off" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="ipt-cpf">CPF</label>
                    <input type="text" class="form-control" id="ipt-cpf" placeholder="Digite o cpf do funcionário" maxlength="14" autocomplete="off" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="ipt-email">Email de Acesso</label>
                    <input type="email" class="form-control" id="ipt-email" placeholder="Digite o email do funcionário" maxlength="60" autocomplete="off" required>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="ipt-senha">Senha de Acesso</label>
                    <input type="text" class="form-control" id="ipt-senha" placeholder="Digite a senha do funcionário" maxlength="20" autocomplete="off" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-12">
                    <label for="ipt-telefone">Telefone</label>
                    <input type="text" class="form-control" id="ipt-telefone" placeholder="Digite o telefone do funcionário" maxlength="15" autocomplete="off" required>
                </div>
            </div>
            <h1>Endereço</h1>
            <hr>
            <div class="form-row">
                <div class="form-group col-12 col-md-12">
                    <label for="ipt-cep">Cep</label>
                    <input type="text" class="form-control" id="ipt-cep" placeholder="Digite o cep do funcionário" maxlength="9" autocomplete="off" required>
                </div>  
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-8">
                    <label for="ipt-endereco">Endereço</label>
                    <input type="text" class="form-control" id="ipt-endereco" placeholder="Digite o endereço do funcionário" maxlength="50" autocomplete="off" required>
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="ipt-numero">Número</label>
                    <input type="text" class="form-control" id="ipt-numero" placeholder="Digite o numero do funcionário" maxlength="5" autocomplete="off" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="ipt-bairro">Bairro</label>
                    <input type="text" class="form-control" id="ipt-bairro" placeholder="Digite o bairro do funcionário" maxlength="30" autocomplete="off" required>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="ipt-cidade">Cidade</label>
                    <input type="text" class="form-control" id="ipt-cidade" placeholder="Digite a cidade do funcionário" maxlength="30" autocomplete="off" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="ipt-estado">Estado</label>
                    <input type="text" class="form-control" id="ipt-estado" placeholder="Digite o estado do funcionário" maxlength="2" autocomplete="off" required>
                </div>
            </div>
            <?php
                if($_SESSION['tipoLog'] == 'admin') {
                    echo "<h1>Tipo de Usuário</h1>";
                    echo "<hr>";
                    echo "<div class='form-row'>";
                    echo " <div class='form-group col-12'>";
                    echo "<label for='ipt-tipoFunc'>Tipo Usuário</label>";
                    echo "<select type='text' class='form-control' id='ipt-tipoFunc' maxlength='30' autocomplete='off' required>";
                    echo "<option value='null'>Escolha um tipo de usuário...</option>";
                    echo "<option value='admin'>Administrador</option>";
                    echo "<option value='comum'>Comum</option>";
                    echo "</select>";
                    echo '<span style="font-size: .9rem; color: #666;">Ususários Administradores podem cadastrar e editar dados. Usuários Comuns podem somente visualizar os dados.</span>';
                    echo "</div>";
                    echo "</div>";
                }


            ?>
        </div>
        

    </div>

    <script
        src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
        crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">


    </script>

    <script>
        $(window).on('load', () => {
            $.ajax({
                url: '../models/meuPerfil.php',
                data: {
                    'idLog': <?php echo $_SESSION['idLog']; ?>,
                },
                type: 'POST',
                dataType: 'json',
                success: function (msg) {
                    console.log(msg)
                    $('#ipt-nome').val(msg[0].nomeFunc);
                    $('#ipt-cpf').val(msg[0].cpfFunc);
                    $('#ipt-email').val(msg[0].emailFunc);
                    $('#ipt-senha').val(msg[0].senhaFunc);
                    $('#ipt-telefone').val(msg[0].telefoneFunc);
                    $('#ipt-cep').val(msg[0].cepFunc);
                    $('#ipt-endereco').val(msg[0].ruaFunc);
                    $('#ipt-numero').val(msg[0].numeroFunc);
                    $('#ipt-bairro').val(msg[0].bairroFunc);
                    $('#ipt-cidade').val(msg[0].cidadeFunc);
                    $('#ipt-estado').val(msg[0].estadoFunc);
                    $('#ipt-tipoFunc').val(msg[0].tipoFunc);
                },
                error: function (err) {
                    console.log(err);
                }
            })
        })
    </script>


</body>

</html>
