$(window).on('load', () => {
    pageHide = () => {
        $('#page-load').css('display', 'none')
        $('#section-login').fadeIn(3000)
    }

    setTimeout(pageHide, 500)
})
$(document).ready(function () {
    $('#nav-logo').click(() => {
        window.location.href = 'index.php'
    })

    document.onkeydown = function (evt) {
        var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
        if (keyCode == 13)
            if ($('#modal-recuperar').css('display') != 'block') {
                $('#btn-login').click()
            } else {
                $('#btn-recuperar').click()
            }
    }

    $('#btn-esqueci').click(function () {
        $('#alert-modal-error').css('display', 'none');
        $('#alert-modal-success').css('display', 'none');
        $('#ipt-emailRecuperar').val('');
        $('#recuperar-part-1').css('display','block');
        $('#recuperar-part-2').css('display','none');
    })

    $('#btn-alterar-senha').click(function(){
        var email = $('#email-recuperar').val();
        var codigo = $('#ipt-codigo').val();
        var novaSenha = $('#ipt-novaSenha').val();
        $('#btn-alterar-senha').text('Alterando...');
        $('#btn-alterar-senha').prop('disabled', true);
        $('#alert-modal-error-alterar').css('display', 'none');
        $.ajax({
            url: './controllers/validarCodigo.php',
            data: {
                'email' : email,
                'codigo' : codigo 
            },
            type: 'POST',
            dataType: 'json',
            success: function (msg) {
                if (msg == 'User not exist') {
                    $('#alert-modal-error-alterar').css('display', 'flex');
                    $('#error-msg-modal-alterar').text('Código incorreto');
                    $('#btn-alterar-senha').text('Alterar Senha');
                    $('#btn-alterar-senha').prop('disabled', false);
                } else if (msg == 'Problem System') {
                    $('#alert-modal-error-alterar').css('display', 'flex');
                    $('#error-msg-modal-alterar').text('Problema no sistema');
                    $('#btn-alterar-senha').text('Alterar Senha');
                    $('#btn-alterar-senha').prop('disabled', false);
                } else {
                    $.ajax({
                        url : './controllers/alterarSenha.php',
                        data: {
                            'email' : email,
                            'novaSenha' : novaSenha
                        },
                        type: 'POST',
                        dataType: 'json',
                        success: function (msg) {
                            $('#alert-modal-success-alterar').css('display', 'flex');
                            $('#btn-alterar-senha').text('Alterar Senha');
                        },
                        error: function(err){
                            $('#alert-modal-error-alterar').css('display', 'flex');
                            $('#error-msg-modal-alterar').text('Problema no sistema');
                        }
                    })
                }
            },
            error: function (err) {
                $('#alert-modal-error-alterar').css('display', 'flex');
                $('#error-msg-modal-alterar').text('Problema no sistema');
                $('#btn-alterar-senha').text('Alterar Senha');
                $('#btn-alterar-senha').prop('disabled', false);
            }
        })
    })
    $('#btn-recuperar').click(function () {

        if (!$('#ipt-emailRecuperar').val()) {
            $('#alert-modal-error').css('display', 'flex');
            $('#error-msg-modal').text('Digite um email');
            $(this).text('Recuperar Senha');
            $(this).prop('disabled', false);
        }
        else {
            $(this).text('Enviando Email...');
            $(this).prop('disabled', true);
            $('#alert-modal-error').css('display', 'none');
            $('#alert-modal-success').css('display', 'none');

            $.ajax({
                url: './controllers/recuperarSenha.php',
                data: {
                    'ipt-emailRecuperar': $('#ipt-emailRecuperar').val()
                },
                type: 'POST',
                dataType: 'json',
                success: function (msg) {
                    if (msg == 'User not exist') {
                        $('#alert-modal-error').css('display', 'flex');
                        $('#error-msg-modal').text('Este email não está cadastrado');
                        $('#btn-recuperar').text('Recuperar Senha');
                        $('#btn-recuperar').prop('disabled', false);
                    } else if (msg == 'Problem System') {
                        $('#alert-modal-error').css('display', 'flex');
                        $('#error-msg-modal').text('Problema no sistema');
                        $('#btn-recuperar').text('Recuperar Senha');
                        $('#btn-recuperar').prop('disabled', false);
                    } else {
                        var codigo = "";
                        for (var i = 0;i < 6; i++){
                            codigo += Math.floor(Math.random() * 10);
                        }
                        var nomeFunc = msg[0].nomeFunc;
                        //var senhaFunc = msg[0].senhaFunc;
                        var destinatario = msg[0].emailFunc;
                        var assunto = 'Recuperação de Senha - Mercurio';
                        var corpo = "<div style='width: 100%; height: 100%; background: #eee; padding: 100px 0'> <table style='margin: 0 auto; font-family: Tahoma, Geneva, Verdana, sans-serif; max-width: 600px; width: 70%; min-width: 280px; height: unset; background: #fff; border-radius: 7px; padding: 20px; box-shadow: 0 0 3px rgba(0, 0, 0, .2)'> <tr> <td> <img src='http://inovasaopaulo.org.br/wp-content/uploads/2017/10/SENAI-SP.jpg' alt='logo-senai' style='width: 160px; height: 40px'> </td> </tr> <tr> <td style='text-align: center; padding: 30px 0 40px; color: #555; font-weight: bold; font-size: 1.6rem'> Recuperação de senha </td> </tr> <tr> <td style='color: #666; font-size: 1.1rem ; padding: 0 15px; font-family: Tahoma, Geneva, Verdana, sans-serif'> Olá,  " + nomeFunc + ". Segue abaixo o código de recuperação de senha do Sistema Mercurio: </td> </tr> <tr> <td style='color: #D85252; padding: 40px 0 50px;text-align: center; font-size: 2rem; font-family: Tahoma, Geneva, Verdana, sans-serif'> "+ codigo +" </td> </tr> <tr> <td style='color: #888; padding: 0 35px; text-align: center; font-family: Tahoma, Geneva, Verdana, sans-serif'> Caso não tenha solicitado uma recuperação de senha, contate o administrador. </td> </tr> <tr> <td style='text-align: center; color: #aaa; padding: 60px 0 0 0'> @ Feito pelos alunos da TI-21T - 2019 </td> </tr> </table> </div>";
                        $.ajax({
                            url: './controllers/registrarCodigo.php',
                            data: {
                                'codigo': codigo,
                                'email' : destinatario,
                            },
                            type: 'POST',
                            dataType: 'json',
                            success: function (msg) {
                                $.ajax({
                                    url: './controllers/sendMail.php',
                                    data: {
                                        'destinatario': destinatario,
                                        'assunto': assunto,
                                        'corpo': corpo,
                                    },
                                    type: 'POST',
                                    dataType: 'json',
                                    success: function (msg) {
                                        
                                        $('#btn-recuperar').text('Recuperar Senha');
                                        $('#btn-recuperar').prop('disabled', false);
                                        $('#alert-modal-success').css('display', 'flex');
        
                                        $('#recuperar-part-1').css('display','none');
                                        $('#recuperar-part-2').css('display','block');
                                        $('#email-recuperar').val(destinatario)
                                    },
                                    error: function (err) {
                                        
                                        $('#btn-recuperar').text('Recuperar Senha');
                                        $('#btn-recuperar').prop('disabled', false);
                                    }
                                })

                            },
                            error: function (err) {
                                
                                $('#btn-recuperar').text('Recuperar Senha');
                                $('#btn-recuperar').prop('disabled', false);
                            }
                        })
                    }
                },
                error: function (err) {
                    
                    $('#btn-recuperar').text('Recuperar Senha');
                    $('#btn-recuperar').prop('disabled', false);
                }
            })
        }

    })

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
            url: './controllers/login.php',
            data: {
                'ipt_email': $('#ipt_email').val(),
                'ipt_senha': $('#ipt_senha').val(),
            },
            type: 'POST',
            dataType: 'json',
            success: function (msg) {
                $('#btn-login').text('Logar');
                $('#btn-login').removeAttr('disabled');

                if (msg == 'Fill all inputs') {
                    document.getElementById('alert-error').style.display = 'flex'; document.getElementById('error-msg').innerHTML = 'Preencha todos os campos'
                } else if (msg == 'Incorrect login') {
                    document.getElementById('alert-error').style.display = 'flex'; document.getElementById('error-msg').innerHTML = 'Usuário ou senha incorretos'
                } else if (msg == 'Problem System') {
                    document.getElementById('alert-error').style.display = 'flex'; document.getElementById('error-msg').innerHTML = 'Problema no servidor. Contate o administrador'
                } else if (msg == 'Success') {
                    window.location.href = 'home.php'
                }
            },
            error: function (err) {
                
            }

        });
    })
})