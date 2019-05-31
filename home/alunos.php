<!doctype html>
<html lang="pt-br">
<?php session_start(); ?>
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

    <!-- Modal Visualizar -->
    <div class="modal fade modal-visualizar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="font-family: 'Google-Bold'; font-size: 1.5rem">Nome</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="padding: 15px 20px">
                        <div class="form-row">
                            <div class="form-group col-8">
                                <label for="ipt-nome">Nome</label>
                                <input disabled type="text" class="form-control" id="ipt-nome" placeholder="Digite o nome Fantasia da Empresa" maxlength="100" autocomplete="off" required>
                            </div>
                            <div class="form-group col-4">
                                <label for="ipt-ra">RA</label>
                                <input disabled type="text" class="form-control" id="ipt-ra" placeholder="0000006587" maxlength="100" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-md-3">
                                <label for="ipt-cpf">CPF</label>
                                <input disabled type="text" class="form-control" id="ipt-cpf" placeholder="08744473648" maxlength="100" autocomplete="off" required>
                            </div>
                            <div class="form-group col-12 col-md-2">
                                <label for="ipt-dataNasc">Data Nasc</label>
                                <input disabled type="text" class="form-control" id="ipt-dataNasc" placeholder="13/11/1998" maxlength="100" autocomplete="off" required>
                            </div>
                            <div class="form-group col-12 col-md-1">
                                <label for="ipt-idade">Idade</label>
                                <input disabled type="text" class="form-control" id="ipt-idade" placeholder="18" maxlength="100" autocomplete="off" required>
                            </div>
                            <div class="form-group col-12 col-md-2">
                                <label for="ipt-sexo">Sexo</label>
                                <input disabled type="text" class="form-control" id="ipt-sexo" placeholder="Feminino" maxlength="100" autocomplete="off" required>
                            </div>
                            <div class="form-group col-12 col-md-4">
                                <label for="ipt-escolaridade">Escolaridade</label>
                                <input disabled type="text" class="form-control" id="ipt-escolaridade" placeholder="Ensino médio incompleto" maxlength="100" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-4">
                                <label for="ipt-rua">Rua</label>
                                <input disabled type="text" class="form-control" id="ipt-rua" placeholder="Vicente Lopes da Rocha" autocomplete="off" required>
                            </div>
                            <div class="form-group col-2">
                                <label for="ipt-num">Número</label>
                                <input disabled type="text" class="form-control" id="ipt-num" placeholder="123" autocomplete="off" required>
                            </div>
                            <div class="form-group col-3">
                                <label for="ipt-complemento">Complemento</label>
                                <input disabled type="text" class="form-control" id="ipt-complemento" placeholder="APT 201 BL 6" autocomplete="off" required>
                            </div>
                            <div class="form-group col-3">
                                <label for="ipt-estado">Estado</label>
                                <input disabled type="text" class="form-control" id="ipt-estado" placeholder="MG" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-4">
                                <label for="ipt-bairro">Bairro</label>
                                <input disabled type="text" class="form-control" id="ipt-bairro" placeholder="Vicente Lopes da Rocha" autocomplete="off" required>
                            </div>
                            <div class="form-group col-4">
                                <label for="ipt-cidade">Cidade</label>
                                <input disabled type="text" class="form-control" id="ipt-cidade" placeholder="Contagem" autocomplete="off" required>
                            </div>
                            <div class="form-group col-4">
                                <label for="ipt-cep">CEP</label>
                                <input disabled type="text" class="form-control" id="ipt-cep" placeholder="32371360" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-md-4">
                                <label for="ipt-telefone1">Telefone 1</label>
                                <input disabled type="text" class="form-control" id="ipt-telefone1" placeholder="975478581" maxlength="15" autocomplete="off" required>
                            </div>
                            <div class="form-group col-12 col-md-4">
                                <label for="ipt-telefone2">Telefone 2</label>
                                <input disabled type="text" class="form-control" id="ipt-telefone2" placeholder="973493537" maxlength="9" autocomplete="off" required>
                            </div>  
                            <div class="form-group col-12 col-md-4">
                                <label for="ipt-identidade">Identidade</label>
                                <input disabled type="text" class="form-control" id="ipt-identidade" placeholder="MG-20.962.921" maxlength="9" autocomplete="off" required>
                            </div>  
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-md-8">
                                <label for="ipt-email">Email</label>
                                <input disabled type="text" class="form-control" id="ipt-email" placeholder="shayene_thug@hotmail.com" maxlength="50" autocomplete="off" required>
                            </div>
                            <div class="form-group col-12 col-md-4">
                                <label for="ipt-carteiraTrabalho">Carteira de trabalho</label>
                                <input disabled type="text" class="form-control" id="ipt-carteiraTrabalho" placeholder="6639934" maxlength="5" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-md-6">
                                <label for="ipt-nomePai">Nome do Pai</label>
                                <input disabled type="text" class="form-control" id="ipt-nomePai" placeholder="MOISÉS CLAUDIONOR BENEDITO" maxlength="30" autocomplete="off" required>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="ipt-nomeMae">Nome da Mãe</label>
                                <input disabled type="text" class="form-control" id="ipt-nomeMae" placeholder="MARIA JUNIA CARNEIRO DE FREITAS BENEDITO" maxlength="30" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-md-6">
                                <label for="ipt-telefonePai">Telefone do Pai</label>
                                <input disabled type="text" class="form-control" id="ipt-telefonePai" placeholder="3130441526" maxlength="30" autocomplete="off" required>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="ipt-telefoneMae">Telefone da Mãe</label>
                                <input disabled type="text" class="form-control" id="ipt-telefoneMae" placeholder="973493537" maxlength="30" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-md-5">
                                <label for="ipt-nomeCurso">Nome do curso</label>
                                <input disabled type="text" class="form-control" id="ipt-nomeCurso" placeholder="PROCESSOS ADMINISTRATIVOS" maxlength="30" autocomplete="off" required>
                            </div>
                            <div class="form-group col-12 col-md-2">
                                <label for="ipt-codTurma">Cód Turma</label>
                                <input disabled type="text" class="form-control" id="ipt-codTurma" placeholder="AIPA201T-01" maxlength="30" autocomplete="off" required>
                            </div>
                            <div class="form-group col-12 col-md-3">
                                <label for="ipt-status">Status</label>
                                <input disabled type="text" class="form-control" id="ipt-status" placeholder="MATRICULADO" maxlength="30" autocomplete="off" required>
                            </div>
                            <div class="form-group col-12 col-md-2">
                                <label for="ipt-semestre">Semestre</label>
                                <input disabled type="text" class="form-control" id="ipt-semestre" placeholder="05.19" maxlength="30" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <div id="modal-erro-necessidade" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Erro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 15px 20px">
                    <p>Não existe nenhuma necessidade cadastrada. Cadastre uma necessidade primeiro!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="btn-erro-cadastarNecessidade">Cadastrar uma Necessidade</button>
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
                            <label for="ipt-necessidadeSelecionada">Selecione uma Necessidade</label>
                            <select class="form-control" id="ipt-necessidadeSelecionada">
                                
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
        <button id="btn-encaminhar" type="button" class="btn btn-success" href="#" <?php echo $_SESSION['tipoLog']!='admin'?'disabled':'';?>>Encaminhar Selecionados</button>
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