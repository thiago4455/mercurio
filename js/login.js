$(window).on('load', () => {
    pageHide = () => {
        $('#page-load').css('display', 'none')
    }

    setTimeout(pageHide, 500)
})

$(document).ready(() => {
    $('#nav-logo').click(() => {
        window.location.href = 'index.php'
    })

    document.onkeydown=function(evt){
    var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
    if(keyCode == 13)
        {
            $('#btn-login').click()
        }
    }

    $(".alert").alert();
    $('.close').click((e) => {
        e.preventDefault()
        $('.alert').css('display', 'none')
    })

    $('#btn-login').click(() => {
        btnLogin = document.getElementById('btn-login')
        $('#btn-login').text('Logando...');
        btnLogin.setAttribute('disabled', true)
        $.ajax({
                url: './models/login.php',
                data: {
                    'ipt_email': $('#ipt_email').val(),
                    'ipt_senha': $('#ipt_senha').val(),
                },
                type: 'POST',
                dataType: 'json',
                success: function(msg) {
                    console.log(msg[0].idFunc)
                    $('#btn-login').text('Logar');
                    $('#btn-login').removeAttr('disabled');

                    if(msg == 'Fill all inputs') {
                        document.getElementById('alert-error').style.display = 'flex'; document.getElementById('error-msg').innerHTML = 'Preencha todos os campos'
                    } else if(msg == 'Incorrect login') {
                        document.getElementById('alert-error').style.display = 'flex'; document.getElementById('error-msg').innerHTML = 'Usuário ou senha incorretos'
                    } else if(msg == 'Problem System') {
                        document.getElementById('alert-error').style.display = 'flex'; document.getElementById('error-msg').innerHTML = 'Problema no servidor. Contate o administrador'
                    } else if(msg == 'Success') {
                        window.location.href = 'home.php'
                    }
                },
                error: function(err) {
                    console.log(err);
                }

            });
    })
})