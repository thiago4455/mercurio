$(document).ready(function () {

    $('.card-bottom').click(function () {
        window.parent.colorActive($(this).attr('data-value'))
    })

    $.ajax({
        url: '../controllers/dadosDashboard.php',
        type: 'GET',
        dataType: 'json',
        success: function (msg) {
            console.log(msg[0][0])

            $('#info-ciclos').val(msg[0][0].Semestre)
            $('#info-alunosCadastrados').val(msg[1][0])

        },
        error: function (err) {
            console.log(err);

        }
    })
})








