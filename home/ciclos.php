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

    <div id="main">
        <h1 id="title-main">Iniciar novo Ciclo</h1>
        <h2>
            Para iniciar um novo ciclo, anexe abaixo uma planilha do Excel (xlsx, xls ou xml). Automaticamente os dados serão adicionados ao banco de dados e
            estarão disponíveis para o encaminhamento as devidas empresas.
        </h2>
        <div class="input-group mb-3 col-md-8 input-file">
        <div class="input-group-prepend">
                <span class="input-group-text">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01" accept=" .xls, .xml, .xlsx">
                <label class="custom-file-label" for="inputGroupFile01">Escolha o arquivo</label>
            </div>
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
        

        inputFile.addEventListener('change', function(e){
            if(inputFile.files.length != 0) {
                $('.custom-file-label').text('Enviando...');

                var files = e.target.files, f = files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                    var data = new Uint8Array(e.target.result);
                    var workbook = XLSX.read(data, {type: 'array'});

                    csvTable = to_csv(workbook);
                    const numAlunos = csvTable.split(/\r\n|\r|\n/).length-1;
                    console.log(numAlunos);
                    $.ajax({
                        url: '../controllers/importarExcel.php',
                        type: 'POST',
                        data: {
                            'csv': csvTable
                        },
                        success: function(data) {
                            console.log(data);     
                            $('.custom-file-label').text('Escolha o arquivo');            
                        },
                        error: function(err) {
                            alert('deu ruim')
                            $('.custom-file-label').text('Escolha o arquivo');
                            console.log(err)
                        }
                    });
                };
                reader.readAsArrayBuffer(f);
            } 
        });
    </script>

</body>

</html>
