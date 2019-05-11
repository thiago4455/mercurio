$(window).on('load', () => {

})

$(document).ready(() => {

    $('#ipt-cpf').mask('000.000.000-00', { reverse: true });
    $('#ipt-cep').mask('00000-000');
    $('#ipt-telefone').mask('(00) 00000-0000');
    $('#ipt-numero').mask('00000');

    $('#btn-modal-cadastrar').click(function() {
       LimparModel();
    })

    function ListarItens(msg) {
        table.innerHTML = "";
        table.innerHTML = '<tr id="tr-title"><td>Código</td><td>Nome</td><td>CPF</td><td>Email</td><td>Telefone</td><td>Bairro</td><td>Cidade</td><td>Tipo</td><td>Editar</td></tr>';
        for (i = 0; i < msg.length; i++) {
            $('#tableBody').append('<tr id="' + msg[i].idFunc + '" class="table-row"> </td> <td> ' + msg[i].idFunc + ' </td> <td> ' + msg[i].nomeFunc + ' </td> <td> ' + msg[i].cpfFunc + ' </td> <td> ' + msg[i].emailFunc + ' </td> <td> ' + msg[i].telefoneFunc + ' </td> <td> ' + msg[i].bairroFunc + ' </td> <td> ' + msg[i].cidadeFunc + ' </td> <td> ' + msg[i].tipoFunc + ' </td> <td class="btnR" id="btnRow' + i + '"><button><i class="fas fa-edit"></i></td> </tr>')
        }
    }

    ListarFuncionarios();

    function LimparModel() {
        $('#ipt-nome').val('');
        $('#ipt-cpf').val('');
        $('#ipt-email').val('');
        $('#ipt-senha').val('');
        $('#ipt-telefone').val('');
        $('#ipt-cep').val('');
        $('#ipt-endereco').val('');
        $('#ipt-numero').val('');
        $('#ipt-bairro').val('');
        $('#ipt-cidade').val('');
        $('#ipt-estado').val('');
        $('#ipt-tipoFunc').val('null');

        $('#alert-success').css('display', 'none');
        $('#alert-error').css('display', 'none');
    }

    $('#btn-cadastrar').click(function () {
        var nome = $('#ipt-nome').val();
        var cpf = $('#ipt-cpf').val();
        var email = $('#ipt-email').val();
        var senha = $('#ipt-senha').val();
        var telefone = $('#ipt-telefone').val();
        var cep = $('#ipt-cep').val();
        var endereco = $('#ipt-endereco').val();
        var numero = $('#ipt-numero').val();
        var bairro = $('#ipt-bairro').val();
        var cidade = $('#ipt-cidade').val();
        var estado = $('#ipt-estado').val();
        var tipoFunc = $('#ipt-tipoFunc').val();

        $('#btn-cadastrar').text('Cadastrando...');
        $('#btn-cadastrar').prop('disabled', true);

        if (!nome || !cpf || !email || !senha || !telefone || !cep || !endereco || !numero || !bairro || !cidade || !estado || !tipoFunc || tipoFunc == 'null') {
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
                url: '../models/cadastrarFuncionarios.php',
                dataType: 'json',
                data: {
                    'nome': nome,
                    'cpf': cpf,
                    'email': email,
                    'senha': senha,
                    'telefone': telefone,
                    'cep': cep,
                    'endereco': endereco,
                    'numero': numero,
                    'bairro': bairro,
                    'cidade': cidade,
                    'estado': estado,
                    'tipoFunc': tipoFunc
                },
                type: 'POST',
                success: function (msg) {
                    console.log(msg)

                    if(msg == 'cpf e email ja utilizados') {
                        $('#alert-error').css('display', 'flex');
                        $('#error-msg').text('O CPF e o Email desse funcionário já estão cadastrados');
                    } else if(msg == 'cpf ja utilizado') {
                        $('#alert-error').css('display', 'flex');
                        $('#error-msg').text('O CPF desse funcionário já está cadastrado');
                    } else if (msg == 'email ja utilizado') {
                        $('#alert-error').css('display', 'flex');
                        $('#error-msg').text('O Email desse funcionário ja está cadastrado');
                    } else if (msg != true) {
                        $('#alert-error').css('display', 'flex');
                        $('#error-msg').text(msg);
                    } else  {
                        LimparModel();
                        $('#alert-success').css('display', 'flex');
                        ListarFuncionarios();
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }
    })

    let table = document.getElementById('tableBody');

    function ListarFuncionarios() {
        $.ajax({
            url: '../models/ListarFuncionarios.php',
            dataType: 'json',
            success: function (msg) {
                console.log(msg)
                if (msg == 'Not found') {
                    $('#tableBody').css('display', 'none');
                    $('#div-not-found').css('display', 'flex');
                    $('#msg-notFound').text('Nenhum Funcionário Cadastrado');
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
    
        $('#inputSearch').keyup(function () {
            $.ajax({
                url: '../models/buscarFuncionarios.php',
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
                        $('#msg-notFound').text('Funcionário não encontrado');
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

