$(window).on('load', () => {
      
})

$(document).ready(() => {

    $(document).on('change', '#check-todos', function() {
        if(this.checked) {
            $('.check-alunos').prop('checked', true);
            $('.table-row').css('background', '#d8525252')
        }
        else{ 
            $('.check-alunos').prop('checked', false);
            $('.table-row').css('background', '#fff')
        }
    });

    $(document).on('change','.check-alunos',function(){
        if(this.checked) {
            $(this).prop('checked', true);
            $(this).parent().parent().css('background', '#d8525252');
        }
        else{ 
            $('#check-todos').prop('checked', false);
            $(this).prop('checked', false);
            $(this).parent().parent().css('background', '#fff');
        }
    })

    function ListarItens(msg) {
        table.innerHTML = "";
        table.innerHTML = '<tr id="tr-title"><td></td><td>RA</td><td>Nome</td><td>Idade</td><td>Sexo</td><td>Email</td><td>Cidade</td><td>CPF</td><td>Telefone</td><td>Status</td><td>Editar</td></tr>';
        for (i = 0; i < msg.length; i++) {
            $('#tableBody').append('<tr id="'+ msg[i].Ra +'" class="table-row"> <td class="td-check"> <input class="form-check-input check-alunos" type="checkbox" value="" id="'+ msg[i].Ra +'"> </td> <td> '+ msg[i].Ra +' </td> <td> '+ msg[i].Nome +' </td> <td> '+ msg[i].Idade +' </td> <td> '+ msg[i].Sexo +' </td> <td> '+ msg[i].Email +' </td> <td> '+ msg[i].Cidade +' </td> <td> '+ msg[i].Cpf +' </td> <td> '+ msg[i].Telefone1 +' </td> <td> '+ msg[i].Status +' </td> <td class="btnR" id="btnRow'+i+'"><button><i class="fas fa-edit"></i></td> </tr>')
        }
    }


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

