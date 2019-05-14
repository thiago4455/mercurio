$(document).ready(() => {

    $('#ipt-cpf').mask('000.000.000-00', { reverse: true });
    $('#ipt-cep').mask('00000-000');
    $('#ipt-telefone').mask('(00) 00000-0000');
    $('#ipt-numero').mask('00000');
  
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

    $('#btn-editar').click(function () { 
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

        $('#btn-editar').text('Editando...');
        $('#btn-editar').prop('disabled', true);
        if (!nome || !cpf || !email || !senha || !telefone || !cep || !endereco || !numero || !bairro || !cidade || !estado) {
            $('#alert-error').css('display', 'flex');
            $('#error-msg').text('Preencha todos os campos e tente novamente');
            $('#btn-editar').text('Salvar alterações');
            $('#btn-editar').prop('disabled', false);
        }else{
            $('#alert-error').css('display', 'none');
            $('#error-msg').text('');

            $.ajax({
                url: '../controllers/editarPerfil.php',
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
                    'estado': estado
                },
                type: 'POST',success: function (msg) {
                    console.log(msg);
                    parent.location.reload()
                },
                error: function (err) {
                    console.log(err);
                }
        })
    }
    })
})

