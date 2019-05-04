$(window).on('load', () => {
      
})

const colunas = ['Select','Ra','Nome','Idade','Sexo','Email','Cidade','Cpf','Telefone1','Status'];

$(document).ready(() => {
    let table = document.getElementById('tableBody');

    $.ajax({
            url: '../models/listarAlunos.php',
            dataType: 'json',
            success: function(msg) {
                console.log(msg)
                for (i = 0; i < msg.length; i++) {
                    var tr = document.createElement('tr');
                    for (j = 0; j < colunas.length; j++) {
                        var td = document.createElement('td')
                        td.appendChild(document.createTextNode(msg[i][colunas[j]]));
                        tr.appendChild(td)
                    }
                    tr.innerHTML+="<td class='btnR' id='btnRow"+i+"'><button><i class='fas fa-edit'></i></button></td>"
                    table.appendChild(tr);
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
                console.log(msg)
                if(msg=='Not found'){
                    $('#fast-actions').css('display', 'none');
                    $('#tableBody').css('display', 'none');
                    $('#div-not-found').css('display', 'flex');
                }
                else{
                    $('#fast-actions').css('display', 'flex');
                    $('#tableBody').css('display', 'table');
                    $('#div-not-found').css('display', 'none');
                    table.innerHTML = '<tr id="tr-title"><td></td><td>RA</td><td>Nome</td><td>Idade</td><td>Sexo</td><td>Email</td><td>Cidade</td><td>CPF</td><td>Telefone</td><td>Status</td><td>Editar</td></tr>';
                    for (i = 0; i < msg.length; i++) {
                        var tr = document.createElement('tr');
                        for (j = 0; j < colunas.length; j++) {
                            var td = document.createElement('td')
                            td.appendChild(document.createTextNode(msg[i][colunas[j]]));
                            tr.appendChild(td)
                        }
                        tr.innerHTML+="<td class='btnR' id='btnRow"+i+"'><button><i class='fas fa-edit'></i></td>"
                        table.appendChild(tr);
                    }
                }
            },
            error: function(err) {
                console.log(err);
            }
        });
    })
})

