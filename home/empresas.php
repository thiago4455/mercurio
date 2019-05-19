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
                        <h5 class="modal-title" style="font-family: 'Google-Bold'; font-size: 1.5rem">Cadastrar Empresa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="padding: 15px 20px">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="ipt-nomeFantasia">Nome Fantasia</label>
                                <input type="text" class="form-control" id="ipt-nomeFantasia" placeholder="Digite o nome Fantasia da Empresa" maxlength="100" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="ipt-razaoSocial">Razão Social</label>
                                <input type="text" class="form-control" id="ipt-razaoSocial" placeholder="Digite a Razão Social da Empresa" maxlength="100" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="ipt-cnpj">CNPJ</label>
                                <input type="text" class="form-control" id="ipt-cnpj" placeholder="Digite o cnpj da empresa" maxlength="18" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-md-6">
                                <label for="ipt-nomeResponsavel">Nome do Responsável</label>
                                <input type="text" class="form-control" id="ipt-nomeResponsavel" placeholder="Digite o nome do responsável" maxlength="100" autocomplete="off" required>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="ipt-email">Email de contato</label>
                                <input type="email" class="form-control" id="ipt-email" placeholder="Digite o email de contato da empresa ou do responsável" maxlength="100" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-md-6">
                                <label for="ipt-telefone">Telefone</label>
                                <input type="text" class="form-control" id="ipt-telefone" placeholder="Digite o telefone da empresa ou responsável" maxlength="15" autocomplete="off" required>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="ipt-cep">Cep</label>
                                <input type="text" class="form-control" id="ipt-cep" placeholder="Digite o cep da empresa" maxlength="9" autocomplete="off" required>
                            </div>  
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-md-8">
                                <label for="ipt-endereco">Endereço</label>
                                <input type="text" class="form-control" id="ipt-endereco" placeholder="Digite o endereço da empresa" maxlength="50" autocomplete="off" required>
                            </div>
                            <div class="form-group col-12 col-md-4">
                                <label for="ipt-numero">Número</label>
                                <input type="text" class="form-control" id="ipt-numero" placeholder="Digite o numero da empresa" maxlength="5" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-md-6">
                                <label for="ipt-bairro">Bairro</label>
                                <input type="text" class="form-control" id="ipt-bairro" placeholder="Digite o bairro da empresa" maxlength="30" autocomplete="off" required>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="ipt-cidade">Cidade</label>
                                <input type="text" class="form-control" id="ipt-cidade" placeholder="Digite a cidade da empresa" maxlength="30" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-md-6">
                                <label for="ipt-estado">Estado</label>
                                <input type="text" class="form-control" id="ipt-estado" placeholder="Digite o estado da empresa" maxlength="2" autocomplete="off" required>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="ipt-apelido">Apelido Personálizavel</label>
                                <input style="margin-bottom: 10px" type="text" class="form-control" id="ipt-apelido" placeholder="Digite um apelido para a empresa" maxlength="6" minlength="6" required>
                                <span style="font-size: .9rem; color: #666;">Para facilitar a identificação, você deve dar um apelido de 6 caractéres para a empresa (Ex: Ortobom: ORTBOM)</span>
                            </div>
                        </div>
                        <div class="form-row" style>
                            <div id="alert-error" style="align-items: center; padding: 10px 30px" class="alert alert-modal alert-danger col-12" role="alert">
                                <span style="font-weight: 600">Erro!</span><h6 style="margin: 0 0 0 7px; line-height: 0" id="error-msg"></h6>
                            </div>
                        </div>
                        <div class="form-row" style>
                            <div id="alert-success" style="align-items: center; padding: 10px 30px" class="alert alert-modal alert-success col-12" role="alert">
                                <span style="font-weight: 600">Sucesso!</span><h6 style="margin: 0 0 0 7px; line-height: 0" id="">Empresa cadastrada com sucesso</h6>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btn-cadastrar"  class="btn btn-success">Concluir Cadastro</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- Modal Editar -->
    <div class="modal fade modal-editar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="font-family: 'Google-Bold'; font-size: 1.5rem">Editar Empresa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="padding: 15px 20px">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="ipt-nomeFantasia">Nome Fantasia</label>
                                <input type="text" class="form-control" id="ipt-nomeFantasia-editar" placeholder="Digite o nome Fantasia da Empresa" maxlength="100" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="ipt-razaoSocial">Razão Social</label>
                                <input type="text" class="form-control" id="ipt-razaoSocial-editar" placeholder="Digite a Razão Social da Empresa" maxlength="100" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="ipt-cnpj">CNPJ</label>
                                <input type="text" class="form-control" id="ipt-cnpj-editar" placeholder="Digite o cnpj da empresa" maxlength="18" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-md-6">
                                <label for="ipt-nomeResponsavel">Nome do Responsável</label>
                                <input type="text" class="form-control" id="ipt-nomeResponsavel-editar" placeholder="Digite o nome do responsável" maxlength="100" autocomplete="off" required>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="ipt-email">Email de contato</label>
                                <input type="email" class="form-control" id="ipt-email-editar" placeholder="Digite o email de contato da empresa ou do responsável" maxlength="100" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-md-6">
                                <label for="ipt-telefone">Telefone</label>
                                <input type="text" class="form-control" id="ipt-telefone-editar" placeholder="Digite o telefone da empresa ou responsável" maxlength="15" autocomplete="off" required>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="ipt-cep">Cep</label>
                                <input type="text" class="form-control" id="ipt-cep-editar" placeholder="Digite o cep da empresa" maxlength="9" autocomplete="off" required>
                            </div>  
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-md-8">
                                <label for="ipt-endereco">Endereço</label>
                                <input type="text" class="form-control" id="ipt-endereco-editar" placeholder="Digite o endereço da empresa" maxlength="50" autocomplete="off" required>
                            </div>
                            <div class="form-group col-12 col-md-4">
                                <label for="ipt-numero">Número</label>
                                <input type="text" class="form-control" id="ipt-numero-editar" placeholder="Digite o numero da empresa" maxlength="5" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-md-6">
                                <label for="ipt-bairro">Bairro</label>
                                <input type="text" class="form-control" id="ipt-bairro-editar" placeholder="Digite o bairro da empresa" maxlength="30" autocomplete="off" required>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="ipt-cidade">Cidade</label>
                                <input type="text" class="form-control" id="ipt-cidade-editar" placeholder="Digite a cidade da empresa" maxlength="30" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-md-6">
                                <label for="ipt-estado">Estado</label>
                                <input type="text" class="form-control" id="ipt-estado-editar" placeholder="Digite o estado da empresa" maxlength="2" autocomplete="off" required>
                            </div>
                            <div class="form-group col-12 col-md-6" style="display:none">
                                <input style="margin-bottom: 10px" type="text" class="form-control" id="ipt-apelido-editar" placeholder="Digite um apelido para a empresa" maxlength="6" minlength="6" required>
                            </div>
                        </div>
                        <div class="form-row" style>
                            <div id="alert-error-editar" style="align-items: center; padding: 10px 30px" class="alert alert-modal alert-danger col-12" role="alert">
                                <span style="font-weight: 600">Erro!</span><h6 style="margin: 0 0 0 7px; line-height: 0" id="error-msg-editar"></h6>
                            </div>
                        </div>
                        <div class="form-row" style>
                            <div id="alert-success-editar" style="align-items: center; padding: 10px 30px" class="alert alert-modal alert-success col-12" role="alert">
                                <span style="font-weight: 600">Sucesso!</span><h6 style="margin: 0 0 0 7px; line-height: 0" id="">Empresa editada com sucesso</h6>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btn-editar"  class="btn btn-success">Concluir Edição</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <div id="fast-search">
        <h1 id="title-search">Buscar Empresas</h1>
        <div id="busca">
            <input type="text" id="inputSearch" placeholder="Pesquise Código, Razão Social ou Representante" autocomplete="off">
        </div>
    </div>

    <div id="fast-actions">
        <button id="btn-modal-cadastrar" type="button" class="btn btn-success" data-toggle="modal" data-target=".modal-cadastrar">Cadastrar Nova Empresa</button>
    </div>

    <div class="table-responsive">
        <table id='tableBody' class="table">
        </table>
    </div>
    <div id='lds' class="lds-ring"><div></div></div>

    <div id="div-not-found">
        <i class="fas fa-exclamation-triangle"></i>
        <h1 id="msg-notFound">Empresa não Encontrada</h1>
    </div>

    <script
        src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src="../js/jquery.mask.min.js"></script>
    <script src="../js/empresas.js"></script>

</body>

</html>