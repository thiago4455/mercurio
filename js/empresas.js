$(window).on('load', () => {

})

$(document).ready(() => {

    $('#ipt-cnpj').mask('00.000.000/0000-00', { reverse: true });
    $('#ipt-cep').mask('00000-000');
    $('#ipt-telefone').mask('(00) 00000-0000');
    $('#ipt-numero').mask('00000');

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

    function ListarItens(msg) {
        table.innerHTML = "";
<<<<<<< HEAD
        table.innerHTML = '<tr id="tr-title"><td>Código (Apelido)</td><td>Nome Fantasia</td><td>Razão Social</td><td>CNPJ</td><td>Telefone</td><td>Email</td><td>Cidade</td><td>Editar</td></tr>';
        for (i = 0; i < msg.length; i++) {
            $('#tableBody').append('<tr id="' + msg[i].codEmpresa + '" class="table-row"> </td> <td> ' + msg[i].codEmpresa + ' </td> <td> ' + msg[i].nomeFantasia + ' </td> <td> ' + msg[i].razaoSocial + ' </td> <td> ' + msg[i].cnpj + ' </td> <td> ' + msg[i].telefone + ' </td> <td> ' + msg[i].email + ' </td> <td> ' + msg[i].cidade + ' </td> <td class="btnR" id="btnRow' + i + '"><button><i class="fas fa-edit"></i></td> </tr>')
        }
    }

    ListarEmpresas();

=======
        table.innerHTML = '<tr id="tr-title"><td></td><td>RA</td><td>Nome</td><td>Idade</td><td>Sexo</td><td>Email</td><td>Cidade</td><td>CPF</td><td>Telefone</td><td>Status</td><td>Editar</td></tr>';
        for (i = 0; i < msg.length; i++) {
            $('#tableBody').append('<tr id="' + msg[i].Ra + '" class="table-row"> <td class="td-check"> <input class="form-check-input check-alunos" type="checkbox" value="" id="' + msg[i].Ra + '"> </td> <td> ' + msg[i].Ra + ' </td> <td> ' + msg[i].Nome + ' </td> <td> ' + msg[i].Idade + ' </td> <td> ' + msg[i].Sexo + ' </td> <td> ' + msg[i].Email + ' </td> <td> ' + msg[i].Cidade + ' </td> <td> ' + msg[i].Cpf + ' </td> <td> ' + msg[i].Telefone1 + ' </td> <td> ' + msg[i].Status + ' </td> <td class="btnR" id="btnRow' + i + '"><button><i class="fas fa-edit"></i></td> </tr>')
        }
    }

>>>>>>> 38f3b060b19b4825a9061d717a4fc99114d0acf7
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
                url: '../models/cadastrarEmpresa.php',
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
                    console.log(msg)

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
<<<<<<< HEAD
                        ListarEmpresas();
=======
>>>>>>> 38f3b060b19b4825a9061d717a4fc99114d0acf7
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }
    })

<<<<<<< HEAD
    let table = document.getElementById('tableBody');

    function ListarEmpresas() {
        $.ajax({
            url: '../models/listarEmpresas.php',
            dataType: 'json',
            success: function (msg) {
                if (msg == 'Not found') {
                    $('#tableBody').css('display', 'none');
                    $('#div-not-found').css('display', 'flex');
                    $('#msg-notFound').text('Nenhuma Empresa Cadastrada');
                }
                else {
=======

    let table = document.getElementById('tableBody');

    $.ajax({
        url: '../models/listarAlunos.php',
        dataType: 'json',
        success: function (msg) {
            if (msg == 'Not found') {
                $('#fast-actions').css('display', 'none');
                $('#tableBody').css('display', 'none');
                $('#div-not-found').css('display', 'flex');
                $('#msg-notFound').text('Nenhum aluno cadastrado');
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

    $('#inputSearch').keyup(function () {
        $.ajax({
            url: '../models/buscarAlunos.php',
            dataType: 'json',
            data: {
                'nome': $('#inputSearch').val(),
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
>>>>>>> 38f3b060b19b4825a9061d717a4fc99114d0acf7
                    $('#tableBody').css('display', 'table');
                    $('#div-not-found').css('display', 'none');
                    ListarItens(msg);
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
<<<<<<< HEAD
    
        $('#inputSearch').keyup(function () {
            $.ajax({
                url: '../models/buscarEmpresas.php',
                dataType: 'json',
                data: {
                    'nome': $('#inputSearch').val(),
                },
                type: 'POST',
                success: function (msg) {
                    console.log(msg)
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
                    console.log(err);
                }
            });
        })
    
    }
  
=======
    })

>>>>>>> 38f3b060b19b4825a9061d717a4fc99114d0acf7
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

