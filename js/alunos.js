$(window).on('load', () => {
    ''
})

$(document).ready(() => {
    var alunosSelecionados = [];

    $.ajax({
        url: '../controllers/listarCiclos.php',
        dataType: 'json',
        success: function (msg) {
            if (msg == 'Not found') {
                $('#fast-actions').css('display', 'none');
                $('#tableBody').css('display', 'none');
                $('#div-not-found').css('display', 'flex');
                $('#msg-notFound').text('Nenhum aluno cadastrado');
            }
            else {
                msg.forEach((i) => {
                    $('#cbx-ciclos').append('<option value="' + i.Semestre + '"> Ciclo - ' + i.Semestre + '</option>')
                })

                $('#fast-actions').css('display', 'flex');
                $('#tableBody').css('display', 'table');
                $('#div-not-found').css('display', 'none');

                ListarPorCiclo($('#cbx-ciclos').val())
            }
            $('#lds').css('display', 'none');
        },
        error: function (err) {
            console.log(err);
        }
    });

    $('#cbx-ciclos').on('change', (() => {
        ListarPorCiclo($('#cbx-ciclos').val())
    }));

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
            $('#btn-encaminhar').text('Encaminhar Selecionados (' + ($(":checkbox:checked").length - 1) + ')');
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
            alunosSelecionados.pop($(this).attr('id'));
        }
        if ($(":checkbox:checked").length > 0) {
            $('#btn-encaminhar').text('Encaminhar Selecionados (' + $(":checkbox:checked").length + ')');
        } else {
            $('#btn-encaminhar').text('Encaminhar Selecionados');
        }
    })

    function ListarItens(msg) {
        table.innerHTML = "";
        table.innerHTML = '<tr id="tr-title"><td></td><td>RA</td><td>Nome</td><td>Idade</td><td>Sexo</td><td>Email</td><td>Cidade</td><td>CPF</td><td>Telefone</td><td>Status</td><td>Editar</td></tr>';
        for (i = 0; i < msg.length; i++) {
            $('#tableBody').append('<tr id="' + msg[i].Ra + '" class="table-row"> <td class="td-check"> <input class="form-check-input check-alunos" type="checkbox" value="" id="' + msg[i].Ra + '"> </td> <td> ' + msg[i].Ra + ' </td> <td style="min-width: 300px"> ' + msg[i].Nome + ' </td> <td> ' + msg[i].Idade + ' </td> <td> ' + msg[i].Sexo + ' </td> <td> ' + msg[i].Email + ' </td> <td> ' + msg[i].Cidade + ' </td> <td> ' + msg[i].Cpf + ' </td> <td> ' + msg[i].Telefone1 + ' </td> <td> ' + msg[i].Status + ' </td> <td class="btnR" id="btn-' + msg[i].Ra + '" class="btn-editar"><button><i class="fas fa-edit"></i></td> </tr>')
        }
    }




    let table = document.getElementById('tableBody');

    function ListarPorCiclo(ciclo) {
        $.ajax({
            url: '../controllers/listarAlunos.php',
            dataType: 'json',
            data: {
                'ciclo': ciclo,
            },
            type: 'POST',
            success: function (msg) {
                $('#lds').css('display', 'none');
                $('#fast-actions').css('display', 'flex');
                $('#tableBody').css('display', 'table');
                $('#div-not-found').css('display', 'none');
                ListarItens(msg);
            },
            error: function (err) {
                console.log(err);
            }
        });
    }

    $('#inputSearch').keyup(function () {
        $.ajax({
            url: '../controllers/buscarAlunos.php',
            dataType: 'json',
            data: {
                'nome': $('#inputSearch').val(),
                'ciclo': $('#cbx-ciclos').val()
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
                console.log(err);
            }
        });
    })

    $('#btn-encaminhar').click(function () {
        if (alunosSelecionados == "") {
            $('#modal-erro').modal('show');
        }
        else {
            $('#ipt-alunosSelecionados').html('');
            $('#ipt-empresaSelecionada').html('');
            $('#modal-encaminhar').modal('show')
            $.ajax({
                url: '../controllers/listarSelecionados.php',
                data: {
                    'alunosSelecionados': alunosSelecionados,
                },
                type: 'POST',
                dataType: 'json',
                success: function (msg) {
                    console.log(msg)
                    var i = 0;
                    alunosSelecionados.forEach(element => {
                        $('#ipt-alunosSelecionados').append(element + " - " + msg[i].Nome + "\n")
                        i++;
                    });
                    $('#label-alunosSelecionados').text('Alunos Selecionados - (' + i + ')')

                    $.ajax({
                        url: '../controllers/listarEmpresasSelecionadas.php',
                        type: 'GET',
                        dataType: 'json',
                        success: function (msg) {
                            if (msg == 'ERRO') {
                                $('#modal-encaminhar').modal('hide')
                                $('#modal-erro-empresa').modal('show');
                            } else {
                                $.each(msg, function (key, value) {
                                    $('#ipt-empresaSelecionada').append('<option value=' + value.codEmpresa + '>' + value.codEmpresa + '</option>')
                                });
                            }
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    })

                },
                error: function (err) {
                    console.log(err);
                }
            })

        }
    })

    $('#btn-encaminhar-model').click(function () {
        var empresa = $('#ipt-empresaSelecionada').val();

        $('#btn-encaminhar-model').text('Gerando PDF...')
        $('#btn-encaminhar-model').prop('disabled', true)

        window.location.href = "../controllers/gerarPdfEncaminhar.php?alunosSelecionados=" + alunosSelecionados + "&empresa=" + empresa;

    })

    $('#btn-erro-cadastarEmpresa').click(() => {
        window.location.href = 'empresas.php';
    })
})

