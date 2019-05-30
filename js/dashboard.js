$(document).ready(function () {

    $('.card-dash').click(function (e){
        window.parent.colorActive($(this).children('.card-bottom').attr('data-value'));
        document.location.href = $(this).children('.card-bottom').attr('href');
    })

    $('.card-bottom').click(function () {
        window.parent.colorActive($(this).attr('data-value'))
    })

    $.ajax({
        url: '../controllers/dadosDashboard.php',
        type: 'GET',
        dataType: 'json',
        success: function (msg) {
            $('#info-ciclos').text(msg[0].length)
            $('#info-alunosCadastrados').text(msg[1].length)
            $('#info-funcCadastrados').text(msg[2].length)
            $('#info-empCadastrados').text(msg[3].length)
            $('#info-alunosEncaminhados').text(msg[4].length)
            $('#info-relatorios').text((msg[5] - 3))

        },
        error: function (err) {
            

        }
    })
})








