$(window).on('load', () => {

})

$(document).ready(() => {

    $('#ipt-cnpj').mask('00.000.000/0000-00', { reverse: true });
    $('#ipt-cep').mask('00000-000');
    $('#ipt-telefone').mask('(00) 00000-0000');
    $('#ipt-numero').mask('00000');

    $('#ipt-cnpj-editar').mask('00.000.000/0000-00', { reverse: true });
    $('#ipt-cep-editar').mask('00000-000');
    $('#ipt-telefone-editar').mask('(00) 00000-0000');
    $('#ipt-numero-editar').mask('00000');

    $('#ipt-apelido').keyup(function () {
        var valorCampo = $(this).val();
        $(this).val(valorCampo.toUpperCase())
    });

    $('#btn-modal-cadastrar').click(function() {
        $('#ipt-nomeFantasia').val('');
        $('#ipt-razaoSocial').val('');
        $('#ipt-nomeResponsavel').val('');
        $('#ipt-cnpj').val('');
        $('#ipt-email').val('');
        $('#ipt-telefone').val('');
        $('#ipt-cep').val('');
        $('#ipt-endereco').val('');
        $('#ipt-numero').val('');
        $('#ipt-bairro').val('');
        $('#ipt-cidade').val('');
        $('#ipt-estado').val('');
        $('#ipt-apelido').val('');

        $('#alert-success').css('display', 'none');
        $('#alert-error').css('display', 'none');

    })
    
    $('#btn-editar').click(function () {
        var nomeFantasia = $('#ipt-nomeFantasia-editar').val();
        var razaoSocial = $('#ipt-razaoSocial-editar').val();
        var nomeResponsavel = $('#ipt-nomeResponsavel-editar').val();
        var cnpj = $('#ipt-cnpj-editar').val();
        var email = $('#ipt-email-editar').val();
        var telefone = $('#ipt-telefone-editar').val();
        var cep = $('#ipt-cep-editar').val();
        var endereco = $('#ipt-endereco-editar').val();
        var numero = $('#ipt-numero-editar').val();
        var bairro = $('#ipt-bairro-editar').val();
        var cidade = $('#ipt-cidade-editar').val();
        var estado = $('#ipt-estado-editar').val();
        var apelido = $('#ipt-apelido-editar').val();

        $('#btn-editar').text('Editando...');
        $('#btn-editar').prop('disabled', true);

        if (!nomeFantasia || !razaoSocial || !nomeResponsavel || !cnpj || !email || !telefone || !cep || !endereco || !numero || !bairro || !cidade || !estado || !apelido) {
            $('#alert-error-editar').css('display', 'flex');
            $('#error-msg-editar').text('Preencha todos os campos e tente novamente');
            $('#btn-editar').text('Concluir Edição');
            $('#btn-editar').prop('disabled', false);
        }
        else {
            $('#alert-error-editar').css('display', 'none');
            $('#error-msg-editar').text('');
            $('#btn-editar').text('Concluir Edição');
            $('#btn-editar').prop('disabled', false);

            $.ajax({
                url: '../controllers/editarEmpresa.php',
                dataType: 'json',
                data: {
                    'nomeFantasia': nomeFantasia,
                    'razaoSocial': razaoSocial,
                    'nomeResponsavel': nomeResponsavel,
                    'cnpj': cnpj,
                    'email': email,
                    'telefone': telefone,
                    'cep': cep,
                    'endereco': endereco,
                    'numero': numero,
                    'bairro': bairro,
                    'cidade': cidade,
                    'estado': estado,
                    'apelido': apelido
                },
                type: 'POST',
                success: function (msg) {
                    

                   if (msg != true) {
                        $('#alert-error-editar').css('display', 'flex');
                        $('#error-msg-editar').text(msg);
                    } else if(msg == true) {
                        $('#ipt-nomeFantasia-editar').val('');
                        $('#ipt-razaoSocial-editar').val('');
                        $('#ipt-nomeResponsavel-editar').val('');
                        $('#ipt-cnpj-editar').val('');
                        $('#ipt-email-editar').val('');
                        $('#ipt-telefone-editar').val('');
                        $('#ipt-cep-editar').val('');
                        $('#ipt-endereco-editar').val('');
                        $('#ipt-numero-editar').val('');
                        $('#ipt-bairro-editar').val('');
                        $('#ipt-cidade-editar').val('');
                        $('#ipt-estado-editar').val('');
                        $('#ipt-apelido-editar').val('');
                        $('#alert-error-editar').css('display', 'none');
                        $('#error-msg-editar').text('');
                        $('#alert-success-editar').css('display', 'flex');
                        $('.modal-editar').modal('hide')
                        ListarEmpresas();
                    }
                },
                error: function (err) {
                    
                }
            });
        }
    })
    $(document).on('click', '.btn-editar', function() {
        id = (($(this).attr('id')).split('-'))[1];
        $.ajax({
            url: '../controllers/buscarEmpresaCod.php',
            dataType: 'json',
            data: {
                'codEmpresa':id
            },
            type: 'POST',
            success: function (msg) {
                ;
                $('.modal-editar').modal('show')
                $('#ipt-nomeFantasia-editar').val(msg[0].nomeFantasia);
                $('#ipt-razaoSocial-editar').val(msg[0].razaoSocial);
                $('#ipt-nomeResponsavel-editar').val(msg[0].responsavel);
                $('#ipt-cnpj-editar').val(msg[0].cnpj);
                $('#ipt-email-editar').val(msg[0].email);
                $('#ipt-telefone-editar').val(msg[0].telefone);
                $('#ipt-cep-editar').val(msg[0].cep);
                $('#ipt-endereco-editar').val(msg[0].rua);
                $('#ipt-numero-editar').val(msg[0].numero);
                $('#ipt-bairro-editar').val(msg[0].bairro);
                $('#ipt-apelido-editar').val(msg[0].codEmpresa);
                $('#ipt-cidade-editar').val(msg[0].cidade);
                $('#ipt-estado-editar').val(msg[0].estado);
                $('#alert-success-editar').css('display', 'none');
                $('#alert-error-editar').css('display', 'none');
                
            },
            error: function (err) {
                
            }
        });
    })

    function ListarItens(msg) {
        table.innerHTML = "";
        table.innerHTML = '<tr id="tr-title"><td>Código (Apelido)</td><td>Nome Fantasia</td><td>Razão Social</td><td>CNPJ</td><td>Telefone</td><td>Email</td><td>Cidade</td><td class="td-editar">Editar</td></tr>';
        for (i = 0; i < msg.length; i++) {
            $('#tableBody').append('<tr id="' + msg[i].codEmpresa + '" class="table-row"> </td> <td> ' + msg[i].codEmpresa + ' </td> <td style="min-width: 150px"> ' + msg[i].nomeFantasia + ' </td> <td style="min-width: 150px"> ' + msg[i].razaoSocial + ' </td> <td> ' + msg[i].cnpj + ' </td> <td style="min-width: 150px"> ' + msg[i].telefone + ' </td> <td> ' + msg[i].email + ' </td> <td> ' + msg[i].cidade + ' </td> <td class="btnR td-editar" id="btnRow' + i + '"><button id="btn-'+ msg[i].codEmpresa +'" class="btn-editar"><i class="fas fa-edit"></i></td> </tr>')
        }
    }

    ListarEmpresas();

    $('#btn-cadastrar').click(function () {
        var nomeFantasia = $('#ipt-nomeFantasia').val();
        var razaoSocial = $('#ipt-razaoSocial').val();
        var nomeResponsavel = $('#ipt-nomeResponsavel').val();
        var cnpj = $('#ipt-cnpj').val();
        var email = $('#ipt-email').val();
        var telefone = $('#ipt-telefone').val();
        var cep = $('#ipt-cep').val();
        var endereco = $('#ipt-endereco').val();
        var numero = $('#ipt-numero').val();
        var bairro = $('#ipt-bairro').val();
        var cidade = $('#ipt-cidade').val();
        var estado = $('#ipt-estado').val();
        var apelido = $('#ipt-apelido').val();

        $('#btn-cadastrar').text('Cadastrando...');
        $('#btn-cadastrar').prop('disabled', true);

        if (!nomeFantasia || !razaoSocial || !nomeResponsavel || !cnpj || !email || !telefone || !cep || !endereco || !numero || !bairro || !cidade || !estado || !apelido) {
            $('#alert-error').css('display', 'flex');
            $('#error-msg').text('Preencha todos os campos e tente novamente');
            $('#btn-cadastrar').text('Concluir Cadastro');
            $('#btn-cadastrar').prop('disabled', false);
        }
        else {
            $('#alert-error').css('display', 'none');
            $('#error-msg').text('');
            $('#btn-cadastrar').text('Concluir Cadastro');
            $('#btn-cadastrar').prop('disabled', false);

            $.ajax({
                url: '../controllers/cadastrarEmpresa.php',
                dataType: 'json',
                data: {
                    'nomeFantasia': nomeFantasia,
                    'razaoSocial': razaoSocial,
                    'nomeResponsavel': nomeResponsavel,
                    'cnpj': cnpj,
                    'email': email,
                    'telefone': telefone,
                    'cep': cep,
                    'endereco': endereco,
                    'numero': numero,
                    'bairro': bairro,
                    'cidade': cidade,
                    'estado': estado,
                    'apelido': apelido
                },
                type: 'POST',
                success: function (msg) {
                    

                    if(msg == 'cnpj e apelido ja utilizados') {
                        $('#alert-error').css('display', 'flex');
                        $('#error-msg').text('O Cnpj e o Apelido dessa empresa já estão cadastrados');
                    } else if(msg == 'cnpj ja utilizado') {
                        $('#alert-error').css('display', 'flex');
                        $('#error-msg').text('O Cnpj dessa empresa já está cadastrado');
                    } else if (msg == 'apelido ja utilizado') {
                        $('#alert-error').css('display', 'flex');
                        $('#error-msg').text('O Apelido dessa empresa ja está cadastrado');
                    } else if (msg != true) {
                        $('#alert-error').css('display', 'flex');
                        $('#error-msg').text(msg);
                    } else if(msg == true) {
                        $('#ipt-nomeFantasia').val('');
                        $('#ipt-razaoSocial').val('');
                        $('#ipt-nomeResponsavel').val('');
                        $('#ipt-cnpj').val('');
                        $('#ipt-email').val('');
                        $('#ipt-telefone').val('');
                        $('#ipt-cep').val('');
                        $('#ipt-endereco').val('');
                        $('#ipt-numero').val('');
                        $('#ipt-bairro').val('');
                        $('#ipt-cidade').val('');
                        $('#ipt-estado').val('');
                        $('#ipt-apelido').val('');
                        $('#alert-error').css('display', 'none');
                        $('#error-msg').text('');
                        $('#alert-success').css('display', 'flex');
                        ListarEmpresas();
                    }
                },
                error: function (err) {
                    
                }
            });
        }
    })

    let table = document.getElementById('tableBody');

    function ListarEmpresas() {
        $.ajax({
            url: '../controllers/listarEmpresas.php',
            dataType: 'json',
            success: function (msg) {
                if (msg == 'Not found') {
                    $('#tableBody').css('display', 'none');
                    $('#div-not-found').css('display', 'flex');
                    $('#msg-notFound').text('Nenhuma Empresa Cadastrada');
                }
                else {
                    $('#tableBody').css('display', 'table');
                    $('#div-not-found').css('display', 'none');
                    ListarItens(msg);
                }
                $('#lds').css('display', 'none');
            },
            error: function (err) {
                
            }
        });
    
        $('#inputSearch').keyup(function () {
            $.ajax({
                url: '../controllers/buscarEmpresas.php',
                dataType: 'json',
                data: {
                    'nome': $('#inputSearch').val(),
                },
                type: 'POST',
                success: function (msg) {
                    $('#lds').css('display', 'none');
                    
                    if (msg == 'Not found') {
                        $('#tableBody').css('display', 'none');
                        $('#div-not-found').css('display', 'flex');
                        $('#msg-notFound').text('Empresa não encontrada');
                    }
                    else {
                        $('#tableBody').css('display', 'table');
                        $('#div-not-found').css('display', 'none');
                        ListarItens(msg);
                    }
                },
                error: function (err) {
                    
                }
            });
        })
    
    }

    $('#ipt-cnpj').blur(function() {
        if($('#ipt-cnpj').val() != "") {
            cnpj = $("#ipt-cnpj").val().replace(/[^\d]+/g,'')

            $('#ipt-nomeFantasia').val('Aguarde...')
            $('#ipt-razaoSocial').val('Aguarde...')
            $('#ipt-telefone').val('Aguarde...')
            $.ajax({
                url: 'https://www.receitaws.com.br/v1/cnpj/' + cnpj,
                method: 'GET',
                dataType: 'jsonp',
                success: function(msg) {
                    console.log(msg)
                    if(msg.status != 'ERROR') {
                        $('#ipt-nomeFantasia').val(msg.fantasia)
                        $('#ipt-razaoSocial').val(msg.nome)
                        $('#ipt-telefone').val(msg.telefone)
                        $('#ipt-email').val(msg.email)
                        $('#cnpj-error').text('');
                        $('#cnpj-error').css('display', 'none');
                    }
                    else {
                        $('#ipt-nomeFantasia').val('')
                        $('#ipt-razaoSocial').val('')
                        $('#ipt-telefone').val('')
                        $('#ipt-email').val('')
                        $('#cnpj-error').text('Cnpj não encontrado!');
                        $('#cnpj-error').css('display', 'flex');
                    }
                    
                },
                error: function(err) {
                    $('#ipt-nomeFantasia').val('')
                    $('#ipt-razaoSocial').val('')
                    $('#ipt-telefone').val('')
                    $('#ipt-email').val('')
                    $('#cnpj-error').text('Cnpj não encontrado!');
                    $('#cnpj-error').css('display', 'flex');
                }
            })
        }
        else
            return
     })


     $('#ipt-cnpj-editar').blur(function() {
        if($('#ipt-cnpj-editar').val() != "") {
            cnpj = $("#ipt-cnpj-editar").val().replace(/[^\d]+/g,'')

            $('#ipt-nomeFantasia-editar').val('Aguarde...')
            $('#ipt-razaoSocial-editar').val('Aguarde...')
            $('#ipt-telefone-editar').val('Aguarde...')
            $.ajax({
                url: 'https://www.receitaws.com.br/v1/cnpj/' + cnpj,
                method: 'GET',
                dataType: 'jsonp',
                success: function(msg) {
                    console.log(msg)
                    if(msg.status != 'ERROR') {
                        $('#ipt-nomeFantasia-editar').val(msg.fantasia)
                        $('#ipt-razaoSocial-editar').val(msg.nome)
                        $('#ipt-telefone-editar').val(msg.telefone)
                        $('#ipt-email').val(msg.email)
                        $('#cnpj-error-editar').text('');
                        $('#cnpj-error-editar').css('display', 'none');
                    }
                    else {
                        $('#ipt-nomeFantasia-editar').val('')
                        $('#ipt-razaoSocial-editar').val('')
                        $('#ipt-telefone-editar').val('')
                        $('#ipt-email').val('')
                        $('#cnpj-error-editar').text('Cnpj não encontrado!');
                        $('#cnpj-error-editar').css('display', 'flex');
                    }
                    
                },
                error: function(err) {
                    $('#ipt-nomeFantasia-editar').val('')
                    $('#ipt-razaoSocial-editar').val('')
                    $('#ipt-telefone-editar').val('')
                    $('#ipt-email').val('')
                    $('#cnpj-error-editar').text('Cnpj não encontrado!');
                    $('#cnpj-error-editar').css('display', 'flex');
                }
            })
        }
        else
            return
     })
  
    $("#ipt-cep").keyup(function () {

        if ($('#ipt-cep').val().length == 9) {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#ipt-endereco").val("Aguarde...");
                    $("#ipt-bairro").val("Aguarde...");
                    $("#ipt-cidade").val("Aguarde...");
                    $("#ipt-estado").val("Aguarde...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#ipt-endereco").val(dados.logradouro);
                            $("#ipt-bairro").val(dados.bairro);
                            $("#ipt-cidade").val(dados.localidade);
                            $("#ipt-estado").val(dados.uf);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            alert("CEP não encontrado.");
                            $("#ipt-endereco").val('');
                            $("#ipt-bairro").val('');
                            $("#ipt-cidade").val('');
                            $("#ipt-estado").val('');
                        }
                    });
                } //end if.
                else {
                    alert("Formato de CEP inválido.");
                    $("#ipt-endereco").val('');
                    $("#ipt-bairro").val('');
                    $("#ipt-cidade").val('');
                    $("#ipt-estado").val('');
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
            }
        }
    });
})

