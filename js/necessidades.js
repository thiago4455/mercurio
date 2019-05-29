$(document).ready(function() {

    $('#btn-modal-cadastrar').click(function() {

            $('#ipt-tipoContrato').html('');
            $('#ipt-codEmpresa').html('');
            $('#btn-cadastrar').text('Buscando Informações...')
            $('#btn-cadastrar').prop('disabled', true)

        $.ajax({
            url: '../controllers/listarEmpresasSelecionadas.php',
            type: 'GET',
            dataType: 'json',
            success: function (msg) {
            
                if (msg == 'ERRO') {
                    setTimeout(() => {
                        $('.modal-cadastrar').modal('hide')
                    }, 250);
                    $('#modal-erro-empresa').modal('show');
                } else {
                    $.each(msg, function (key, value) {
                        $('#ipt-codEmpresa').append('<option value=' + value.codEmpresa + '>' + value.codEmpresa + '</option>')
                    });

                    $.ajax({
                        url: '../controllers/listarContratos.php',
                        type: 'GET',
                        dataType: 'json',
                        success: function (msg) {
                            console.log(msg)
                            // $.each(msg, function (key, value) {
                            //     $('#ipt-tipoContrato').append('<option value=' + value.nomeContrato + '>' + value.nomeContrato + '</option>')
                            // });
                        },
                        error: function (err) {
                            console.log(err)
                        }
                        
                    })
        
                }
            },
            error: function (err) {
                
            }
            
        })
    })

    $('#btn-erro-cadastarEmpresa').click(() => {
        window.location.href = 'empresas.php';
    })
})

