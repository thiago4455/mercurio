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

    <!-- Fucionarios.css -->
    <link rel="stylesheet" href="css/funcionarios.css"> 

</head>

<body>

    <!-- Modal Cadastrar -->
    <div class="modal fade modal-cadastrar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="font-family: 'Google-Bold'; font-size: 1.5rem">Cadastrar Funcionário</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="padding: 15px 20px">
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
                                <input type="password" class="form-control" id="ipt-senha" placeholder="Digite a senha do funcionário" maxlength="20" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-md-6">
                                <label for="ipt-telefone">Telefone</label>
                                <input type="text" class="form-control" id="ipt-telefone" placeholder="Digite o telefone do funcionário" maxlength="15" autocomplete="off" required>
                            </div>
                            <div class="form-group col-12 col-md-6">
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
                            <div class="form-group col-12 col-md-6">
                                <label for="ipt-estado">Estado</label>
                                <input type="text" class="form-control" id="ipt-estado" placeholder="Digite o estado do funcionário" maxlength="2" autocomplete="off" required>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="ipt-tipoFunc">Tipo Usuário</label>
                                <select type="text" class="form-control" id="ipt-tipoFunc" maxlength="30" autocomplete="off" required>
                                    <option value="null">Escolha um tipo de usuário...</option>
                                    <option value="admin">Administrador</option>
                                    <option value="comum">Comum</option>
                                </select>
                                <span style="font-size: .9rem; color: #666;">Usuários Administradores podem cadastrar e editar dados. Usuários Comuns podem somente visualizar os dados.</span>
                            </div>
                        </div>
                        <div class="form-row" style>
                            <div id="alert-error" style="align-items: center; padding: 10px 30px" class="alert alert-modal alert-danger col-12" role="alert">
                                <span style="font-weight: 600">Erro!</span><h6 style="margin: 0 0 0 7px; line-height: 0" id="error-msg"></h6>
                            </div>
                        </div>
                        <div class="form-row" style>
                            <div id="alert-success" style="align-items: center; padding: 10px 30px" class="alert alert-modal alert-success col-12" role="alert">
                                <span style="font-weight: 600">Sucesso!</span><h6 style="margin: 0 0 0 7px; line-height: 0" id="">Funcionário cadastrado com sucesso</h6>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btn-cadastrar"  class="btn btn-success">Concluir Cadastro</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <div id="fast-search">
        <h1 id="title-search">Buscar Funcionários</h1>
        <div id="busca">
            <input type="text" id="inputSearch" placeholder="Pesquise Código, Nome, CPF ou email" autocomplete="off">
            <div id="search-avanced" class="btn">Busca Avançada</div>
        </div>
    </div>

    <div id="fast-actions">
        <button id="btn-modal-cadastrar" type="button" class="btn btn-success" data-toggle="modal" data-target=".modal-cadastrar">Cadastrar Novo Funcionário</button>
    </div>

    <table id='tableBody' class="table">
    </table>
    <div id='lds' class="lds-ring"></div>

    <div id="div-not-found">
        <i class="fas fa-exclamation-triangle"></i>
        <h1 id="msg-notFound">Funcionário não Encontrado</h1>
    </div>

    <script
        src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src="../js/jquery.mask.min.js"></script>
    <script src="../js/funcionarios.js"></script>

</body>

</html>