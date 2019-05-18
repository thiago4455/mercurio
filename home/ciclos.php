<!doctype html>
<html lang="pt-br">

<head>
    <title>Senai - Sistema FIEMG</title>
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

    <!-- Ciclos.css -->
    <link rel="stylesheet" href="css/ciclos.css">

</head>

<body>

    <div id="modal-ciclos" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="title-modal"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p id="text-modal-ciclos">Deseja realmente criar um novo ciclo com a tabela: </p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
            <button id="btn-add-ciclo" type="button" class="btn btn-primary">Sim</button>
        </div>
        </div>
    </div>
    </div>

    <div id="main">
        <h1 id="title-main">Iniciar novo Ciclo</h1>
        <h2>
            Para iniciar um novo ciclo, anexe abaixo uma planilha do Excel (xlsx, xls ou xml). Automaticamente os dados serão adicionados ao banco de dados e
            estarão disponíveis para o encaminhamento as devidas empresas.
        </h2>
        <div class="input-group mb-3 col-12 col-md-8 input-file" style="padding: 0; max-heigth: 38px">
            <div class="input-group-prepend">
                <span class="input-group-text">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01" accept=" .xls, .xml, .xlsx, .csv">
                <label class="custom-file-label" for="inputGroupFile01">Escolha o arquivo</label>
            </div>
        </div>
        <div id="alert-success" class="alert alert-success" role="alert">
            <p id="msg-success">Ciclo cadastrado com sucesso. Os </p>
        </div>
        <div id="alert-error" class="alert alert-danger" role="alert">
            <p id="msg-error"></p>
        </div>
    </div>

    <script
        src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>

    <script>
    let X = XLSX;
    let csvTable = '';

        function to_csv(workbook) {
            var result = [];
            workbook.SheetNames.forEach(function(sheetName) {
                var csv = X.utils.sheet_to_csv(workbook.Sheets[sheetName]);
                if(csv.length){
                    result.push(csv);
                }
            });
            return result.join("\n");
        };

        let inputFile = document.getElementById('inputGroupFile01');

        $('#modal-ciclos').on('hidden.bs.modal', function (e) {
            inputFile.value = null;
        })
        
        var files;

        inputFile.addEventListener('input', function(e){
        var cicloExiste;
        $('#title-modal').text('Cadastrar novo ciclo')
        $('#text-modal-ciclos').text('Deseja realmente criar um novo ciclo com a tabela: ' + inputFile.files[0].name)
            
            $.ajax({
                url: '../controllers/verificarCiclo.php',
                type: 'GET',
                success: function(data) {
                    cicloExiste = data;
                    if(cicloExiste == "true"){
                        $('#title-modal').text('Atualizar ciclo')
                        $('#text-modal-ciclos').text('Já existe um ciclo cadastrado nesse mês. Deseja realmente substituí-lo pelo da tabela: ' + inputFile.files[0].name)
                    }
                },
                error: function(err) {
                    console.log(err)
                }
            });
            
            $('#modal-ciclos').modal('show')
            files = e.target.files, f = files[0];
        });

        $('#btn-add-ciclo').click(function(){
            if(inputFile.files.length != 0) {
                $('.custom-file-label').text('Enviando...');

                var reader = new FileReader();
                reader.onload = function(e) {
                    var data = new Uint8Array(e.target.result);
                    var workbook = XLSX.read(data, {type: 'array'});

                    csvTable = to_csv(workbook);
                    const numAlunos = csvTable.split(/\r\n|\r|\n/).length-1;
                    console.log(numAlunos);
                $('#btn-active-modal').click();
                    $.ajax({
                        url: '../controllers/importarExcel.php',
                        type: 'POST',
                        data: {
                            'csv': csvTable
                        },
                        success: function(data) {
                            console.log(data);     
                            $('#modal-ciclos').modal('hide')
                            $('.custom-file-label').text('Escolha o arquivo');   
                            $('#alert-error').css('display', 'none');

                            $('#alert-success').css('display', 'flex');
                            $('#msg-success').append(numAlunos + " alunos foram adicionados com sucesso!");
                            
                        },
                        error: function(err) {
                            alert('deu ruim')
                            $('.custom-file-label').text('Escolha o arquivo');
                            console.log(err)

                            $('#alert-success').css('display', 'none');

                            $('#alert-error').css('display', 'flex');
                            $('#msg-error').html(error);
                        }
                    });
                };
                reader.readAsArrayBuffer(f);
            } 
        }) 
        
    </script>

</body>

</html>
