$(document).ready(function () {

    $('.card-bottom').click(function () {
        window.parent.colorActive($(this).attr('data-value'))
    })

    $.ajax({
        url: '../controllers/dadosDashboard.php',
        type: 'GET',
        dataType: 'json',
        success: function (msg) {
            console.log(msg)

            $('#info-ciclos').text(msg[0].length)
            $('#info-alunosCadastrados').text(msg[1].length)

        },
        error: function (err) {
            console.log(err);

        }
    })
})








