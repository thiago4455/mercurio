$(window).on('load', () => {
    ''
})

$(document).ready(() => {

    function Listar(){
        $.ajax({
            url: '../controllers/listarCiclosHistorico.php',
            dataType: 'json',
            success: function (msg) {
                if (msg == 'Not found') {
                    $('#fast-actions').css('display', 'none');
                    $('#tableBody').css('display', 'none');
                    $('#div-not-found').css('display', 'flex');
                    $('#msg-notFound').text('Nenhum histórico encontrado');
                }
                else {
                    $('#cbx-ciclos').text('');
                    msg.forEach((i) => {
                        $('#cbx-ciclos').append('<option value="' + i.ciclo + '"> Ciclo - ' + i.ciclo + '</option>')
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

    $(document).on('click', '.btn-visualizar', function() {
        id = (($(this).attr('id')).split('-'))[1];
        $.ajax({
            url: '../controllers/buscarHistoricoRa.php',
            dataType: 'json',
            data: {
                'ra':id,
            },
            type: 'POST',
            success: function (msg) {
                $('#dados-historico').text("");
                $('#modal-visualizar').modal('show');
                var texto = "<h5 style='font-weight: bold; margin-bottom: 20px'>Histórico de reprovações</h5> <p> <b>Nome:</b> "+msg[0].Nome+" </p> <p> <b>Ra:</b> "+msg[0].Ra + "</p>";
                for (let i = 0; i < msg.length; i++) {
                    texto += "<p> <b>Motivo:</b>"+msg[i].descricao+"</p>";
                }
                console.log(texto)
                $('#dados-historico').append(texto);
                /*$('#ipt-nomeFantasia-editar').val(msg[0].nomeFantasia);
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
                $('#alert-error-editar').css('display', 'none');*/
                
            },
            error: function (err) {
            }
        });
    })

    function ListarItens(msg) {
        table.innerHTML = "";
        table.innerHTML = '<tr id="tr-title"><td>RA</td><td>Nome</td><td>Email</td><td>Cidade</td><td>CPF</td><td>Telefone</td><td>Reprovações</td><td>Detalhes</td></tr>';
        for (i = 0; i < msg.length; i++) {
            $('#tableBody').append('<tr id="' + msg[i].Ra + '" class="table-row"> <td> ' + msg[i].Ra + ' </td> <td style="min-width: 300px"> ' + msg[i].Nome + ' </td> <td> ' + msg[i].Email + ' </td> <td> ' + msg[i].Cidade + ' </td> <td> ' + msg[i].Cpf + ' </td> <td> ' + msg[i].Telefone1 + ' </td> <td> ' + msg[i].Reprovacoes + ' </td> <td><button id="btn-'+msg[i].Ra+'" class="btn-visualizar"><i class="fas fa-eye"></i></button></td> </tr>')
        }
    }

    let table = document.getElementById('tableBody');

    function ListarPorCiclo(ciclo) {
        $.ajax({
            url: '../controllers/listarHistoricos.php',
            dataType: 'json',
            data: {
                'ciclo': ciclo,
            },
            type: 'POST',
            success: function (msg) {
                if(msg == 'Not found') {
                    $('#fast-actions').css('display', 'none');
                    $('#tableBody').css('display', 'none');
                    $('#div-not-found').css('display', 'flex');
                    $('#msg-notFound').text('Nenhum histórico encontrado');
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
})

