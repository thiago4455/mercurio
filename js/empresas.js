$(window).on('load', () => {
      
})

$(document).ready(() => {

    $('#ipt-cnpj').mask('00.000.000/0000-00', {reverse: true});
    $('#ipt-cep').mask('00000-000');
    $('#ipt-telefone').mask('(00) 00000-0000');

    function ListarItens(msg) {
        table.innerHTML = "";
        table.innerHTML = '<tr id="tr-title"><td></td><td>RA</td><td>Nome</td><td>Idade</td><td>Sexo</td><td>Email</td><td>Cidade</td><td>CPF</td><td>Telefone</td><td>Status</td><td>Editar</td></tr>';
        for (i = 0; i < msg.length; i++) {
            $('#tableBody').append('<tr id="'+ msg[i].Ra +'" class="table-row"> <td class="td-check"> <input class="form-check-input check-alunos" type="checkbox" value="" id="'+ msg[i].Ra +'"> </td> <td> '+ msg[i].Ra +' </td> <td> '+ msg[i].Nome +' </td> <td> '+ msg[i].Idade +' </td> <td> '+ msg[i].Sexo +' </td> <td> '+ msg[i].Email +' </td> <td> '+ msg[i].Cidade +' </td> <td> '+ msg[i].Cpf +' </td> <td> '+ msg[i].Telefone1 +' </td> <td> '+ msg[i].Status +' </td> <td class="btnR" id="btnRow'+i+'"><button><i class="fas fa-edit"></i></td> </tr>')
        }
    }

    $('#btn-cadastrar').click(function() {
        var nomeFantasia = $('#ipt-nomeFantasia').val();
        var razaoSocial = $('#ipt-razaoSocial').val();
        var nomeResponsavel = $('#ipt-nomeResponsavel').val();
        var cnpj = $('#ipt-cnpj').val();
        var email = $('#ipt-email').val();
        var telefone = $('#ipt-telefone').val();
        var cep = $('#ipt-cep').val();
        var endereco = $('#ipt-endereco').val();
        var bairro = $('#ipt-bairro').val();
        var cidade = $('#ipt-cidade').val();
        var estado = $('#ipt-estado').val();
        var apelido = $('#ipt-apelido').val();

        $('#btn-cadastrar').text('Cadastrando...');
        $('#btn-cadastrar').prop('disabled', true);

        if(!nomeFantasia || !razaoSocial || !nomeResponsavel || !cnpj || !email || !telefone || !cep || !endereco || !bairro || !cidade || !estado || !apelido) {
            $('#alert-error').css('display', 'flex');
            $('#error-msg').text('Preencha todos os campos e tente novamente');
        }
        else {
            $('#alert-error').css('display', 'none');
            $('#error-msg').text('');
        }
    })


    let table = document.getElementById('tableBody');

    $.ajax({
            url: '../models/listarAlunos.php',
            dataType: 'json',
            success: function(msg) {
                if(msg=='Not found'){
                    $('#fast-actions').css('display', 'none');
                    $('#tableBody').css('display', 'none');
                    $('#div-not-found').css('display', 'flex');
                    $('#msg-notFound').text('Nenhum aluno cadastrado');
                }
                else{
                    $('#fast-actions').css('display', 'flex');
                    $('#tableBody').css('display', 'table');
                    $('#div-not-found').css('display', 'none');
                    ListarItens(msg);
                }
            },
            error: function(err) {
                console.log(err);
            }
    });

    $('#inputSearch').keyup(function() {
        $.ajax({
            url: '../models/buscarAlunos.php',
            dataType: 'json',
            data: {
                'nome': $('#inputSearch').val(),
            },
            type: 'POST',
            success: function(msg) {
                if(msg=='Not found'){
                    $('#fast-actions').css('display', 'none');
                    $('#tableBody').css('display', 'none');
                    $('#div-not-found').css('display', 'flex');
                    $('#msg-notFound').text('Aluno não encontrado');
                }
                else{
                    $('#fast-actions').css('display', 'flex');
                    $('#tableBody').css('display', 'table');
                    $('#div-not-found').css('display', 'none');
                    ListarItens(msg);
                }
            },
            error: function(err) {
                console.log(err);
            }
        });
    })
})

