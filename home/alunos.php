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

    <div id="modal-erro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Erro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 15px 20px">
                    <p>Você deve selecionar no mínimo um aluno para prosseguir!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-encaminhar" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Encaminhar Alunos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 15px 20px">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="ipt-alunosSelecionados" id="label-alunosSelecionados"></label>
                            <textarea class="form-control" id="ipt-alunosSelecionados" disabled></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="ipt-empresaSelecionada">Selecione uma Empresa</label>
                            <select class="form-control" id="ipt-empresaSelecionada">
                                
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" id="btn-encaminhar-model">Encaminhar Alunos</button>
                </div>
            </div>
        </div>
    </div>

    <div id="fast-search">
        <h1>Buscar Alunos</h1>
        <div id="busca">
            <input type="text" id="inputSearch" placeholder="Pesquise por RA, Nome, Email, CPF ou Telefone" autocomplete="off">
            <div id="search-avanced" class="btn">Busca Avançada</div>
        </div>
        <div id="busca-avancada">
            <div class="row">
                <div class="form-group col-12 col-md-3">
                    <label for="">Nome do Aluno</label>
                    <input type="text" id="nome" placeholder="Nome" autocomplete="off" class="form-control ipt-busca">
                </div>
                <div class="form-group col-12 col-md-3">
                    <label for="">RA do Aluno</label>
                    <input type="text" id="ra" placeholder="RA" autocomplete="off" class="form-control ipt-busca">
                </div>
                <div class="form-group col-6 col-md-2">
                    <label for="">Idade Minima</label>
                    <input type="text" id="age1" placeholder="Mínima" autocomplete="off" class="form-control ipt-busca">
                </div>
                <div class="form-group col-6 col-md-2">
                <label for="">Idade Máxima</label>
                    <input type="text" id="age2" placeholder="Máxima" autocomplete="off" class="form-control ipt-busca">
                </div>            
                <div class="form-group col-12 col-md-2">
                    <label for="">Sexo do Aluno</label>
                    <select id="sexo" class="form-control">
                        <option value="" disabled selected hidden>Escolha...</option>
                        <option value="">Nenhum</option>
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-md-2">
                    <label for="">Escolaridade</label>
                    <select id="grauInstrucao" class="form-control">
                        <option value="" disabled selected hidden>Escolha</option>
                        <option value="">Nenhum</option>
                        <option value="Ensino médio incompleto">Ensino médio incompleto</option>
                        <option value="Ensino médio completo">Ensino médio completo</option>
                    </select>
                </div>
                <div class="form-group col-12 col-md-3">
                    <label for="">Bairro</label>
                    <input type="text" id="bairro" placeholder="Bairro" autocomplete="off" class="form-control ipt-busca">
                </div>
                <div class="form-group col-12 col-md-3">
                    <label for="">Cidade</label>
                    <input type="text" id="cidade" placeholder="Cidade" autocomplete="off" class="form-control ipt-busca">
                </div>
                <div class="form-group col-12 col-md-2">
                    <label for="">Estado(Sigla)</label>
                    <input type="text" id="estado" placeholder="Estado" autocomplete="off" class="form-control ipt-busca" maxlength="2">
                </div>
                <div class="form-group col-12 col-md-2">
                    <label for="">Cep</label>
                    <input type="text" id="cep" placeholder="CEP" autocomplete="off" class="form-control ipt-busca">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-md-3">
                    <label for="">Telefone do Aluno</label>
                    <input type="text" id="telefone" placeholder="Telefone" autocomplete="off" class="form-control ipt-busca">
                </div>
                <div class="form-group col-12 col-md-3">
                    <label for="">Identidade do Aluno</label>
                    <input type="text" id="identidade" placeholder="Identidade" autocomplete="off" class="form-control ipt-busca">
                </div>
                <div class="form-group col-12 col-md-3">
                    <label for="">Cpf do Aluno</label>
                    <input type="text" id="cpf" placeholder="CPF" autocomplete="off" class="form-control ipt-busca">
                </div>
                <div class="form-group col-12 col-md-3">
                    <label for="">Email do Aluno</label>
                    <input type="text" id="email" placeholder="Email" autocomplete="off" class="form-control ipt-busca">
                </div>
            </div>
            <div class="row">
            
                <div class="form-group col-12 col-md-3">
                    <label for="">Carteira de Trabalho</label>
                    <input type="text" id="carteiraTrabalho" placeholder="Carteira de Trabalho" autocomplete="off" class="form-control ipt-busca">
                </div>                    
                <div class="form-group col-12 col-md-3">
                    <label for="">Nome do Pai</label>
                    <input type="text" id="nomePai" placeholder="Nome do pai" autocomplete="off" class="form-control ipt-busca">
                </div>
                <div class="form-group col-12 col-md-3">
                    <label for="">Nome da Mãe</label>
                    <input type="text" id="nomeMae" placeholder="Nome da mãe" autocomplete="off" class="form-control ipt-busca">
                </div>
                <div class="form-group col-12 col-md-3">
                    <label for="">Nome do Curso</label>
                    <input type="text" id="nomeCurso" placeholder="Nome do curso" autocomplete="off" class="form-control ipt-busca">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-md-3">
                    <label for="">Código da Turma</label>
                    <input type="text" id="codTurma" placeholder="Código da turma" autocomplete="off" class="form-control ipt-busca">
                </div>
                <div class="form-group col-12 col-md-3">
                    <label for="">Status do Aluno</label>
                    <input type="text" id="status" placeholder="Status" autocomplete="off" class="form-control ipt-busca">
                </div>
            </div>
            <div class="row">
                <div id="search-avanced-submit" class="btn-primary">Buscar</div>
            </div>
        </div>
    </div>

    <div id="fast-actions">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="check-todos">
            <label class="custom-control-label" for="check-todos">Selecionar Todos</label>
        </div>
        <select id="cbx-ciclos" class="form-control form-control-lg">
        </select>
        <button id="btn-encaminhar" type="button" class="btn btn-success" href="#">Encaminhar Selecionados</button>
    </div>

    <div class="table-responsive">
        <table id='tableBody' class="table">
        </table>
    </div>
    <div id='lds' class="lds-ring"><div></div></div>

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

    <script>
        
    </script>

</body>

</html>