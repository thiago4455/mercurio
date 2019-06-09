$(window).on('load', () => {
    ''
})

$(document).ready(() => {
    var alunosSelecionados = [];

    $('#search-avanced').click(function() {
        if($('#busca-avancada').css('display') != 'flex') {
            $('#busca-avancada').css('display', 'flex')
        }
        else {
            $('#busca-avancada').css('display', 'none')
        }
    })

    let age1Previus = $('#age1').val();
    $('#age1').on('keyup', () => {
        if (age1Previus == $('#age2').val()) {
            $('#age2').val($('#age1').val());
        }

        age1Previus = $('#age1').val();
    })

    $('#search-avanced-submit').on('click', () => {
        $.ajax({
            url: '../controllers/buscaAvancadaEncaminhados.php',
            data: {
                'nome': $('#nome').val(),
                'ra': $('#ra').val(),
                'idade1': $('#age1').val(),
                'idade2': $('#age2').val(),
                'sexo': $('#sexo').val(),
                'grauInstrucao': $('#grauInstrucao').val(),
                'bairro': $('#bairro').val(),
                'estado': $('#estado').val(),
                'cidade': $('#cidade').val(),
                'cep': $('#cep').val(),
                'telefone': $('#telefone').val(),
                'identidade': $('#identidade').val(),
                'cpf': $('#cpf').val(),
                'email': $('#email').val(),
                'carteiraTrabalho': $('#carteiraTrabalho').val(),
                'nomePai': $('#nomePai').val(),
                'nomeMae': $('#nomeMae').val(),
                'nomeCurso': $('#nomeCurso').val(),
                'codTurma': $('#codTurma').val(),
                'status': $('#status').val(),
                'ciclo': $('#cbx-ciclos').val(),
            },
            type: 'POST',
            dataType: 'json',
            success: function (msg) {
                if (msg == 'Not found') {
                    $('#fast-actions').css('display', 'none');
                    $('#tableBody').css('display', 'none');
                    $('#div-not-found').css('display', 'flex');
                    $('#msg-notFound').text('Nenhum aluno Encaminhado');
                }
                else {
                    $('#fast-actions').css('display', 'flex');
                    $('#tableBody').css('display', 'table');
                    $('#div-not-found').css('display', 'none');
                    ListarItens(msg);
                }
            },
            error: function (err) {
                
            }
        })
    });

    function Listar(){
        $.ajax({
            url: '../controllers/listarCiclos.php',
            dataType: 'json',
            success: function (msg) {
                if (msg == 'Not found') {
                    $('#fast-actions').css('display', 'none');
                    $('#tableBody').css('display', 'none');
                    $('#div-not-found').css('display', 'flex');
                    $('#msg-notFound').text('Nenhum aluno Encaminhado');
                }
                else {
                    $('#cbx-ciclos').text('');
                    msg.forEach((i) => {
                        $('#cbx-ciclos').append(`<option value="${i.Semestre}"> Ciclo - ${i.Semestre}</option>`)
                    })
    
                    $('#fast-actions').css('display', 'flex');
                    $('#tableBody').css('display', 'table');
                    $('#div-not-found').css('display', 'none');
    
                    ListarPorCiclo($('#cbx-ciclos').val())
                }
                $('#lds').css('display', 'none');
            },
            error: function (err) {
                
            }
        });
    }

    Listar();

    $('#cbx-ciclos').on('change', (() => {
        ListarPorCiclo($('#cbx-ciclos').val())
    }));

    $('#mostrar-encaminhados').on('change', Listar)
    $(document).on('click', '.btn-visualizar', function() {
        ra = (($(this).attr('id')).split('-'))[1];
        $.ajax({
            url: '../controllers/buscarEncaminhados.php',
            dataType: 'json',
            data: {
                'nome': ra,
                'ciclo': $('#cbx-ciclos').val(),
            },
            type: 'POST',
            success: function (msg) {
                if (msg != 'Not found') {
                    let aluno = msg[0];
                    $('#ipt-nome').val(aluno.Nome);
                    $('#ipt-ra').val(aluno.Ra);
                    $('#ipt-cpf').val(aluno.Cpf);
                    $('#ipt-dataNasc').val(aluno.DataNasc);
                    $('#ipt-idade').val(aluno.Idade);
                    $('#ipt-sexo').val(aluno.Sexo=='F'?'Feminino':'Masculino');
                    $('#ipt-escolaridade').val(aluno.GrauInstrucao);
                    $('#ipt-rua').val(aluno.Rua);
                    $('#ipt-num').val(aluno.Numero);
                    $('#ipt-complemento').val(aluno.Complemento);
                    $('#ipt-estado').val(aluno.Estado);
                    $('#ipt-bairro').val(aluno.Bairro);
                    $('#ipt-cidade').val(aluno.Cidade);
                    $('#ipt-cep').val(aluno.Cep);
                    $('#ipt-telefone1').val(aluno.Telefone1);
                    $('#ipt-telefone2').val(aluno.Telefone2);
                    $('#ipt-identidade').val(aluno.Identidade);
                    $('#ipt-email').val(aluno.Email);
                    $('#ipt-carteiraTrabalho').val(aluno.CarteiraTrabalho);
                    $('#ipt-nomePai').val(aluno.NomePai);
                    $('#ipt-nomeMae').val(aluno.NomeMae);
                    $('#ipt-telefonePai').val(aluno.TelefonePai);
                    $('#ipt-telefoneMae').val(aluno.TelefoneMae);
                    $('#ipt-nomeCurso').val(aluno.NomeCurso);
                    $('#ipt-codTurma').val(aluno.CodTurma);
                    $('#ipt-status').val(aluno.Status);
                    $('#ipt-semestre').val(aluno.Semestre);
                    $('.modal-visualizar').modal('show');
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    });
    $(document).on('change', '#check-todos', function () {
        if (this.checked) {
            alunosSelecionados = []
            $('.check-alunos').prop('checked', true);
            $('.table-row').css('background', '#d8525252')
            $('.check-alunos').each(function (i, element) {
                alunosSelecionados.push(element.id)
            })
        }
        else {
            $('.check-alunos').prop('checked', false);
            $('.table-row').css('background', '#fff')
            alunosSelecionados = []
        }
        if ($(":checkbox:checked").length > 0) {
            $('#btn-encaminhar').text(`Encaminhar Selecionados (${$(":checkbox:checked").length - 1})`);
        } else {
            $('#btn-encaminhar').text('Encaminhar Selecionados');
        }
    });

    $(document).on('click', '.td-check', function (e) {
        if (e.target !== this)
            return;
        $(this).children().click();
    })

    $(document).on('change', '.check-alunos', function () {
        if (this.checked) {
            $(this).prop('checked', true);
            $(this).parent().parent().css('background', '#d8525252');
            alunosSelecionados.push($(this).attr('id'));
        }
        else {
            $('#check-todos').prop('checked', false);
            $(this).prop('checked', false);
            $(this).parent().parent().css('background', '#fff');
            Pop($(this).attr('id'));
        }
        if ($(":checkbox:checked").length > 0) {
            $('#btn-encaminhar').text(`Encaminhar Selecionados (${$(":checkbox:checked").length})`);
        } else {
            $('#btn-encaminhar').text('Encaminhar Selecionados');
        }
    })
    function Pop(search_term){
        for (var i=alunosSelecionados.length-1; i>=0; i--) {
            if (alunosSelecionados[i] === search_term) {
                alunosSelecionados.splice(i, 1);
                break;
            }
        }
    }

    function ListarItens(msg) {
        table.innerHTML = "";
        table.innerHTML = '<tr id="tr-title"><td></td><td>RA</td><td>Nome</td><td>Idade</td><td>Sexo</td><td>Email</td><td>Empresa</td><td>CPF</td><td>Telefone</td><td>Status</td><td>Visualizar</td></tr>';
        for (i = 0; i < msg.length; i++) {
            $('#tableBody').append(`<tr id="${msg[i].Ra}" class="table-row"> <td class="td-check"> <input class="form-check-input check-alunos" type="checkbox" value="" id="${msg[i].Ra}"> </td> <td> ${msg[i].Ra} </td> <td style="min-width: 300px"> ${msg[i].Nome} </td> <td> ${msg[i].Idade} </td> <td> ${msg[i].Sexo} </td> <td> ${msg[i].Email} </td> <td> ${msg[i].codEmpresa} </td> <td> ${msg[i].Cpf} </td> <td> ${msg[i].Telefone1} </td> <td> ${msg[i].Status} </td><td><button id="btn-${msg[i].Ra}" class="btn-visualizar"><i class="fas fa-eye"></i></button></td> </tr>`)
        }
    }




    let table = document.getElementById('tableBody');

    function ListarPorCiclo(ciclo) {
        $.ajax({
            url: '../controllers/listarEncaminhados.php',
            dataType: 'json',
            data: {
                'ciclo': ciclo,
            },
            type: 'POST',
            success: function (msg) {
            console.log(msg)

                if(msg == 'Not found') {
                    $('#fast-actions').css('display', 'none');
                    $('#tableBody').css('display', 'none');
                    $('#div-not-found').css('display', 'flex');
                    $('#msg-notFound').text('Nenhum aluno Encaminhado');
                }
                else {
                    $('#lds').css('display', 'none');
                    $('#fast-actions').css('display', 'flex');
                    $('#tableBody').css('display', 'table');
                    $('#div-not-found').css('display', 'none');
                    ListarItens(msg);
                }
                
            },
            error: function (err) {
                
            }
        });
    }

    $('#inputSearch').keyup(function () {
        $.ajax({
            url: '../controllers/buscarEncaminhados.php',
            dataType: 'json',
            data: {
                'nome': $('#inputSearch').val(),
                'ciclo': $('#cbx-ciclos').val(),
            },
            type: 'POST',
            success: function (msg) {
                if (msg == 'Not found') {
                    $('#fast-actions').css('display', 'none');
                    $('#tableBody').css('display', 'none');
                    $('#div-not-found').css('display', 'flex');
                    $('#msg-notFound').text('Aluno não encontrado');
                }
                else {
                    $('#fast-actions').css('display', 'flex');
                    $('#tableBody').css('display', 'table');
                    $('#div-not-found').css('display', 'none');
                    ListarItens(msg);
                }
            },
            error: function (err) {
                
            }
        });
    })

    $('#ipt-statusSelecionado').change(function(){
        if($('#ipt-statusSelecionado').prop('selectedIndex') == 2){
            $('#motivo-reprovado').css('display','flex')
        }
        else{
            $('#motivo-reprovado').css('display','none')
        }
    })

    $('#btn-mudar-status').click(function () {
        if (alunosSelecionados == "") {
            $('#modal-erro').modal('show');
        }
        else {
            $('#ipt-alunosSelecionados').html('');
            $('#modal-mudar-status').modal('show')
            $('#btn-mudar-status-model').text('Buscando Alunos...')
            $('#btn-mudar-status-model').prop('disabled', true)
            $('#ipt-statusSelecionado').prop('selectedIndex', 0);
            $('#motivo-reprovado').css('display','none')
            $('#alert-error-motivo-reprovado').css('display','none')
            $('#alert-modal-success-alterar').css('display','none');
            $.ajax({
                url: '../controllers/listarSelecionados.php',
                data: {
                    'alunosSelecionados': alunosSelecionados,
                },
                type: 'POST',
                dataType: 'json',
                success: function (msg) {
                    var i = 0;
                    alunosSelecionados.forEach(element => {
                        $('#ipt-alunosSelecionados').append(element + " - " + msg[i].Nome + "\n")
                        i++;
                    });
                    $('#label-alunosSelecionados').text(`Alunos Selecionados - (${i})`)

                    $('#btn-mudar-status-model').text('Mudar Status')
                    $('#btn-mudar-status-model').prop('disabled', false)
                },
                error: function (err) {
                    
                }
            })

        }
    })

    $('#btn-mudar-status-model').click(function () {
        var status = $('#ipt-statusSelecionado').val();
        var reprovado = ($('#ipt-statusSelecionado').prop('selectedIndex') == 2)?$('#ipt-reprovacao').val():'';
        $('#alert-error-motivo-reprovado').css('display','none')
        $('#alert-modal-success-alterar').css('display','none');
        if(reprovado == '' && ($('#ipt-statusSelecionado').prop('selectedIndex') == 2)){
            $('#alert-error-motivo-reprovado').css('display','block')
        }
        else{
            $('#btn-mudar-status-model').text('Mudando status...')
            $('#btn-mudar-status-model').prop('disabled', true)
            $.ajax({
                url: '../controllers/mudarStatus.php',
                dataType: 'json',
                data: {
                    'ra': alunosSelecionados.join(),
                    'status': $('#ipt-statusSelecionado').val(),
                    'reprovado': reprovado,
                },
                type: 'POST',
                success: function (msg) {
                    $('#btn-mudar-status-model').text('Mudar Status');
                    $('#alert-modal-success-alterar').css('display','block');
                    alunosSelecionados = []
                    Listar();
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }
    })

    $('#btn-erro-cadastarEmpresa').click(() => {
        window.location.href = 'empresas.php';
    })
})

