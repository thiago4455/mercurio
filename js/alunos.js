$(window).on('load', () => {
      
})

const colunas = ['Ra','Nome','Idade','Sexo','Email','Cidade','Cpf','Telefone1','Status'];

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
                    table.innerHTML = 'Nenhum resultado encontrado.'
                }
                else{
                    table.innerHTML = '<tr id="tr-title"><td>RA</td><td>Nome</td><td>Idade</td><td>Sexo</td><td>Email</td><td>Cidade</td><td>CPF</td><td>Telefone</td><td>Status</td><td>Editar</td></tr>';
                    for (i = 0; i < msg.length; i++) {
                        var tr = document.createElement('tr');
                        for (j = 0; j < colunas.length; j++) {
                            var td = document.createElement('td')
                            td.appendChild(document.createTextNode(msg[i][colunas[j]]));
                            tr.appendChild(td)
                        }
                        tr.innerHTML+="<td class='btnR' id='btnRow"+i+"'><button>X</button></td>"
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

