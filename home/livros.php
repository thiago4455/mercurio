<!doctype html>
<html lang="pt-br">

<head>
    <title>Senai - Sistema FIEMG</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/icons/favicon.ico" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Fontes -->
    <link rel="stylesheet" href="../fonts/fontes.css">

   <!-- Livros.css -->
   <link rel="stylesheet" href="css/livros.css"> 

</head>

<body style="background-color: #eee;">

    <div id="alert-error" class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <p id="error-msg"></p>
    </div>

    <div id="alert-success" class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <p id="success-msg"></p>
    </div>

    <div id="content">
        <div id="fast-add">
            <form id="form_addLivro" action="" method="POST" autocomplete="off">
                <div class="row">
                <h1 id="fast-add-title" class="col-12">Adicionar Livro</h1>
                </div>
                <div class="row">
                    <input id="ipt_nomeLivro" type="text" placeholder="Digite o nome do livro" class="ipt-add-livro col-6">
                    <input id="ipt_nomeAutor" type="text" placeholder="Digite o autor do livro" class="ipt-add-livro col-6">
                </div>
                <div class="row">
                    <select id="ipt_categoria" class="ipt-add-livro col-8">        
                        <option>Categoria...</option>            
                        <option>Ação</option>            
                        <option>Apocalipse Zumbi</option>            
                        <option>Auto-Ajuda</option>            
                        <option>Aventura</option>            
                        <option>Biografia</option>            
                        <option>Didático</option>            
                        <option>Fantasia</option>            
                        <option>Ficção Científica</option>            
                        <option>Horror</option>            
                        <option>Infanto Juvenil</option>            
                        <option>Literatura Brasileira</option>     
                        <option>Paródia</option>     
                        <option>Romance</option>     
                        <option>Suspense</option>       
                        
                    </select>
                    <button type="submit" id="btn-add-livro" name="btn_add_livro" class="btn btn-success col-3">Cadastrar Livro</button>
                </div>
            </form>
        </div>
        <div id="list-livros">
            <div id="header-list-livros">
                <h1 id="title-list-livros">Lista de Livros</h1>
                <input type="text" id="ipt_buscar_livro" placeholder="Busque por nome ou autor..." autocomplete="off">
                <div id="btn_load_list" class="btn">
                    Atualizar
                </div>
            </div>
            <div id="list">

            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
        src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>


    <script>
    $(window).on('load', () => {
       
    })

    $(document).ready(function() {

        function LoadList() {
            $.ajax({
                url: '../models/listarLivros.php',
                type: 'POST',
                dataType: 'json',
                success: function(msg) {
                    $('#list').html('');
                    const resp = msg;
                    for(i = 0; i < resp.length ; i++ ) {
                        $('#list').append("<div id="+ resp[i].idLivro +" class='card-livro'> <h1> "+ resp[i].nomeLivro +" </h1> <h2> "+ resp[i].autorLivro +" </h2> <h3> "+ resp[i].categoriaLivro +" </h3> <h4> Código: "+ resp[i].idLivro +" </h4> </div")
                    }
                },
                error: function(err) {
                    alert('Deu não');
                    console.log(err);
                }
            })
        }

        LoadList();

        $('#form_addLivro').submit(function(e){
            e.preventDefault();

            const nomeLivro = $('#ipt_nomeLivro').val();
            const nomeAutor = $('#ipt_nomeAutor').val();
            const categoria = $('#ipt_categoria').val();

            if(!nomeLivro || !nomeAutor || categoria == 'Categoria...') {
                $('#alert-success').css('display', 'none');
                $('#alert-error').css('display', 'flex');
                $('#error-msg').text('Preencha todos os campos corretamente');
            }
            else {
                $.ajax({
                    url: '../models/cadastrarLivro.php',
                    data: {
                        'nomeLivro': nomeLivro,
                        'nomeAutor': nomeAutor,
                        'categoria': categoria
                    },
                    type: 'POST',
                    dataType: 'html',
                    success: function(msg) {
                        $('#ipt_nomeLivro').val('');
                        $('#ipt_nomeAutor').val('');
                        $('#ipt_categoria').val('Categoria...');

                        $('#alert-danger').css('display', 'none');
                        $('#alert-success').css('display', 'flex');
                        $('#success-msg').text('Livro cadastrado com sucesso!');
                        LoadList();
                    },
                    error: function(err) {
                        alert('Deu não');
                        console.log(err);
                    }

                });
            }
        })

        $('#ipt_buscar_livro').keyup(function (){
            var termoBusca = $('#ipt_buscar_livro').val();
            $.ajax({
                url: '../models/buscarLivros.php',
                type: 'POST',
                data: {
                    'termoBusca': termoBusca
                },
                dataType: 'json',
                success: function(msg) {

                    if(msg == 'Nenhum livro encontrado') {
                        $('#list').html('<h1 id="msg-null">Nenhum Livro Encontrado</h1>');
                    }
                    else {
                        $('#list').html('');
                        const resp = msg;

                        console.log(msg)
                        for(i = 0; i < resp.length ; i++ ) {
                            $('#list').append("<div id="+ resp[i].idLivro +" class='card-livro'> <h1> "+ resp[i].nomeLivro +" </h1> <h2> "+ resp[i].autorLivro +" </h2> <h3> "+ resp[i].categoriaLivro +" </h3> <h4> Código: "+ resp[i].idLivro +" </h4> </div")
                        }
                    }
                   
                },
                error: function(err) {
                    alert('Deu não');
                    console.log(err);
                }
            })
        })

        $('#btn_load_list').click(async() => {
            $('#btn_load_list').text('Atualizando...');
            LoadList();
            setTimeout(() => {
                $('#btn_load_list').text('Atualizar');
            }, 500);

        })



        $('#btn-add-livro').click(function(e) {
            //e.preventDefault()
        })

        $(".alert").alert();
        $('.close').click((e) => {
            e.preventDefault()
            $('.alert').css('display', 'none')
        })
    })
    </script>

</body>

</html>