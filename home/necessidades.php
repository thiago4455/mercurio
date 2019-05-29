<!doctype html>
<html lang="pt-br">
<?php session_start(); ?>
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

    <div id="modal-erro-empresa" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Erro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 15px 20px">
                    <p>Não existe nenhuma empresa cadastrada. Cadastre uma empresa primeiro!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="btn-erro-cadastarEmpresa">Cadastrar uma Empresa</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Cadastrar -->
    <div class="modal fade modal-cadastrar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="font-family: 'Google-Bold'; font-size: 1.5rem">Cadastrar Necessidade</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="padding: 15px 20px">
                        <div class="form-row">
                            <div class="form-group col-12 col-md-6">
                                <label for="ipt-codEmpresa">Código da Empresa</label>
                                <select class="form-control" id="ipt-codEmpresa">
                                
                                </select>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="ipt-tipoContrato">Tipo de Contrato</label>
                                <select class="form-control" id="ipt-tipoContrato">
                                
                                </select>
                            </div>
                        </div>
                        <div class="form-row" style>
                            <div id="alert-error" style="align-items: center; padding: 10px 30px" class="alert alert-modal alert-danger col-12" role="alert">
                                <span style="font-weight: 600">Erro!</span><h6 style="margin: 0 0 0 7px; line-height: 0" id="error-msg"></h6>
                            </div>
                        </div>
                        <div class="form-row" style>
                            <div id="alert-success" style="align-items: center; padding: 10px 30px" class="alert alert-modal alert-success col-12" role="alert">
                                <span style="font-weight: 600">Sucesso!</span><h6 style="margin: 0 0 0 7px; line-height: 0" id="">Necessidade cadastrada com sucesso</h6>
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
                        <h5 class="modal-title" style="font-family: 'Google-Bold'; font-size: 1.5rem">Editar Necessidade</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="padding: 15px 20px">
                        <div class="form-row" style>
                            <div id="alert-error-editar" style="align-items: center; padding: 10px 30px" class="alert alert-modal alert-danger col-12" role="alert">
                                <span style="font-weight: 600">Erro!</span><h6 style="margin: 0 0 0 7px; line-height: 0" id="error-msg-editar"></h6>
                            </div>
                        </div>
                        <div class="form-row" style>
                            <div id="alert-success-editar" style="align-items: center; padding: 10px 30px" class="alert alert-modal alert-success col-12" role="alert">
                                <span style="font-weight: 600">Sucesso!</span><h6 style="margin: 0 0 0 7px; line-height: 0" id="">Necessidade editada com sucesso</h6>
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
        <h1 id="title-search">Buscar Necessidades</h1>
        <div id="busca">
            <input type="text" id="inputSearch" placeholder="Pesquise por Código da Empresa" autocomplete="off">
        </div>
    </div>

    <div id="fast-actions">
        <button id="btn-modal-cadastrar" type="button" class="btn btn-success" data-toggle="modal" data-target=".modal-cadastrar" <?php echo $_SESSION['tipoLog']!='admin'?'disabled':'';?>>Cadastrar Nova Necessidade</button>
    </div>

    <div class="table-responsive">
        <table id='tableBody' class="table">
        </table>
    </div>
    <div id='lds' class="lds-ring"><div></div></div>

    <div id="div-not-found">
        <i class="fas fa-exclamation-triangle"></i>
        <h1 id="msg-notFound">Necessidade não Encontrada</h1>
    </div>

    <script
        src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src="../js/jquery.mask.min.js"></script>
    <script src="../js/necessidades.js"></script>

</body>

</html>