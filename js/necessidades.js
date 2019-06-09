$(document).ready(function() {

    ListarNecessidades();

    let table = document.getElementById('tableBody');

    function ListarItens(msg) {
        table.innerHTML = "";
        table.innerHTML = '<tr id="tr-title"><td>Código da Empresa (Apelido)</td><td>Tipo de Contrato</td><td>Ciclo</td><td style="text-align: center">Quantidade de Alunos</td><td>Descrição</td><td class="td-editar">Editar</td><td>Visualizar</td></tr>';
        for (i = 0; i < msg.length; i++) {
            $('#tableBody').append(`<tr id="${msg[i].codEmpresa}" class="table-row"> </td> <td> ${msg[i].codEmpresa} </td> <td style="min-width: 150px"> ${msg[i].tipoContrato} </td> <td> ${msg[i].ciclo} </td> <td style="text-align: center"> ${msg[i].quantidade} </td> <td style="min-width: 150px"> ${(msg[i].descricao).substring(0,20)} </td> <td class="btnR td-editar" id="btnRow${i}"><button id="btnedit-${msg[i].id}" class="btn-editar"><i class="fas fa-edit"></i></td><td class="btnR" id="btnRow${i}"><button id="btnview-${msg[i].id}" class="btn-visualizar"><i class="fas fa-eye"></i></td> </tr>`)
        }
    }

    function ListarNecessidades() {
        $.ajax({
            url: '../controllers/listarNecessidades.php',
            dataType: 'json',
            success: function(msg) {
                console.log(msg)
                if (msg == 'Not found') {
                    $('.table-responsive').css('display', 'none');
                    $('#div-not-found').css('display', 'flex');
                    $('#msg-notFound').text('Nenhuma Necessidade Cadastrada');
                } else {
                    $('.table-responsive').css('display', 'table');
                    $('#div-not-found').css('display', 'none');
                    ListarItens(msg);
                }
                $('#lds').css('display', 'none');
            },
            error: function(err) {

            }
        });
    }

    $('#btn-modal-cadastrar').click(function() {

        $('#ipt-tipoContrato').html('');
        $('#ipt-codEmpresa').html('');
        $('#ipt-ciclos').html('');
        $('#btn-cadastrar').text('Buscando Informações...')
        $('#btn-cadastrar').prop('disabled', true)
        $('#alert-success').css('display', 'none')
        $('#alert-error').css('display', 'none')
        document.getElementById('ipt-ciclo').innerHTML = "";
        document.getElementById('ipt-codEmpresa').innerHTML = "";
        document.getElementById('ipt-tipoContrato').innerHTML = "";
        $.ajax({
            url: '../controllers/listarEmpresasSelecionadas.php',
            type: 'GET',
            dataType: 'json',
            success: function(msg) {

                if (msg == 'ERRO') {
                    setTimeout(() => {
                        $('#modal-cadastrar').modal('hide')
                    }, 500);
                    $('#modal-erro-empresa').modal('show');
                } else {
                    $.each(msg, function(key, value) {
                        $('#ipt-codEmpresa').append(`<option value=${value.codEmpresa}>${value.codEmpresa}</option>`)
                    });

                    $.ajax({
                        url: '../controllers/listarContratos.php',
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $.each(data, function(key, value) {
                                $('#ipt-tipoContrato').append(`<option value=${value.nomeContrato}>${(value.nomeContrato).replace("_", " ")}</option>`)
                            });

                            $('#btn-cadastrar').text('Cadastrar Necessidade')
                            $('#btn-cadastrar').prop('disabled', false)
                        },
                        error: function(err) {
                            console.log(err)
                        }

                    })

                    $.ajax({
                        url: '../controllers/listarCiclos.php',
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data)
                            $.each(data, function(key, value) {
                                $('#ipt-ciclo').append(`<option value=${value.Semestre}>${(value.Semestre).replace('.', '/')}</option>`)
                            });

                            $('#btn-cadastrar').text('Cadastrar Necessidade')
                            $('#btn-cadastrar').prop('disabled', false)
                        },
                        error: function(err) {
                            console.log(err)
                        }

                    })

                }
            },
            error: function(err) {
                console.log(err)
            }

        })
    })

    $('#ipt-descricao').keyup(function() {
        $('#span-descricao').text(`Faltam: ${500 - $(this).val().length} caracteres.`)
    })

    $('#btn-erro-cadastarEmpresa').click(() => {
        window.location.href = 'empresas.php';
    })

    $('#btn-cadastrar').click(function() {
        var codEmpresa = $('#ipt-codEmpresa').val();
        var ciclo = $('#ipt-ciclo').val();
        var tipoContrato = $('#ipt-tipoContrato').val();
        var quantidade = $('#ipt-quantidade').val();
        var descricao = $('#ipt-descricao').val();
        $('#alert-success').css('display', 'none')
        $('#alert-error').css('display', 'none')
        if (!codEmpresa || !ciclo || !tipoContrato || !quantidade || !descricao) {
            $('#alert-error').css('display', 'flex')
            $('#error-msg').html('Preencha todos os campos corretamente!')
        } else {
            $.ajax({
                url: '../controllers/inserirNecessidade.php',
                dataType: 'json',
                data: {
                    'codEmpresa': codEmpresa,
                    'tipoContrato': tipoContrato,
                    'quantidade': quantidade,
                    'ciclo': ciclo,
                    'descricao': descricao,
                },
                type: 'POST',
                success: function(msg) {
                    $('#alert-success').css('display', 'flex')
                    ListarNecessidades();
                },
                error: function(err) {
                    $('#alert-error').css('display', 'flex')
                    $('#error-msg').html(err)
                }
            })
        }
    });

    $('#btn-editar').click(function(){
        var codEmpresa = $('#ipt-codEmpresa-editar').val();
        var ciclo = $('#ipt-ciclo-editar').val();
        var tipoContrato = $('#ipt-tipoContrato-editar').val();
        var quantidade = $('#ipt-quantidade-editar').val();
        var descricao = $('#ipt-descricao-editar').val();
        var id = $('#ipt-id-editar').val();
        $('#alert-success-editar').css('display', 'none');
        $('#alert-error-editar').css('display', 'none');
        if (!codEmpresa || !ciclo || !tipoContrato || !quantidade || !descricao) {
            $('#alert-error-editar').css('display', 'flex');
            $('#error-msg-editar').html('Preencha todos os campos corretamente!');
        } else {
            $.ajax({
                url: '../controllers/editarNecessidade.php',
                dataType: 'json',
                data: {
                    'id': id,
                    'codEmpresa': codEmpresa,
                    'tipoContrato': tipoContrato,
                    'quantidade': quantidade,
                    'ciclo': ciclo,
                    'descricao': descricao,
                },
                type: 'POST',
                success: function(msg) {
                    $('#alert-success-editar').css('display', 'flex');
                    ListarNecessidades();
                },
                error: function(err) {
                    $('#alert-error-editar').css('display', 'flex');
                    $('#error-msg-editar').html(err);
                }
            })
        }

    });

    $(document).on('click', '.btn-editar', function() {
        id = (($(this).attr('id')).split('-'))[1];
        $('#ipt-id-editar').val(id);
        $('.modal-editar').modal('show')
        $('#alert-success-editar').css('display','none');
        $('#alert-error-editar').css('display','none');
        document.getElementById('ipt-ciclo-editar').innerHTML = "";
        document.getElementById('ipt-codEmpresa-editar').innerHTML = "";
        document.getElementById('ipt-tipoContrato-editar').innerHTML = "";
        $.ajax({
            url: '../controllers/listarEmpresasSelecionadas.php',
            type: 'GET',
            dataType: 'json',
            success: function(msg) {
                if (msg == 'ERRO') {
                    setTimeout(() => {
                        $('.modal-editar').modal('hide')
                    }, 250);
                    $('#modal-erro-empresa').modal('show');
                } else {
                    $.each(msg, function(key, value) {
                        $('#ipt-codEmpresa-editar').append(`<option value=${value.codEmpresa}>${value.codEmpresa}</option>`)
                    });

                    $.ajax({
                        url: '../controllers/listarContratos.php',
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $.each(data, function(key, value) {
                                $('#ipt-tipoContrato-editar').append(`<option value=${value.nomeContrato}>${(value.nomeContrato).replace("_", " ")}</option>`)
                            });

                            $('#btn-editar').text('Concluir Edição')
                            $('#btn-editar').prop('disabled', false)
                        },
                        error: function(err) {
                            console.log(err)
                        }

                    })

                    $.ajax({
                        url: '../controllers/listarCiclos.php',
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $.each(data, function(key, value) {
                                $('#ipt-ciclo-editar').append(`<option value=${value.Semestre}>${(value.Semestre).replace('.', '/')}</option>`)
                            });
                            $('#btn-editar').text('Concluir Edição')
                            $('#btn-editar').prop('disabled', false)
                        },
                        error: function(err) {
                            console.log(err)
                        }

                    });

                    $.ajax({
                        url: '../controllers/buscarNecessidadeCod.php',
                        dataType: 'json',
                        data: {
                            'id': id,
                        },
                        type: 'POST',
                        success: function(msg) {
                            $('#ipt-quantidade-editar').val(msg[0].quantidade);
                            $('#ipt-descricao-editar').val(msg[0].descricao);
                            $(`#ipt-ciclo-editar option[value='${msg[0].ciclo}']`).attr("selected", "selected");
                            $(`#ipt-codEmpresa-editar option[value='${msg[0].codEmpresa}']`).attr("selected", "selected");
                            $(`#ipt-tipoContrato-editar option[value='${msg[0].tipoContrato}']`).attr("selected", "selected");
                        },
                        error: function(err) {
                            
                        }
                    });
            
                }
            },
            error: function(err) {
                console.log(err)
            }

        })
    });

    $(document).on('click', '.btn-visualizar', function() {
        id = (($(this).attr('id')).split('-'))[1];
        $.ajax({
            url: '../controllers/buscarNecessidadeCod.php',
            dataType: 'json',
            data: {
                'id': id,
            },
            type: 'POST',
            success: function(msg) {
                $('.modal-visualizar').modal('show');
                $('#ipt-quantidade-visualizar').val(msg[0].quantidade);
                $('#ipt-descricao-visualizar').val(msg[0].descricao);
                $('#ipt-codEmpresa-visualizar').val(msg[0].codEmpresa);
                $('#ipt-tipoContrato-visualizar').val(msg[0].tipoContrato);
                $('#ipt-ciclo-visualizar').val(msg[0].ciclo);
            },
            error: function(err) {
                
            }
        });
    });
});