<?php
    require_once('../class/ClassLivro.php');
    $objLivro = new ClassLivro();

    $nomeLivro = $_POST['nomeLivro'];
    $nomeAutor = $_POST['nomeAutor'];
    $categoria = $_POST['categoria'];

    $objLivro->setNomeLivro($nomeLivro);
    $objLivro->setNomeAutor($nomeAutor);
    $objLivro->setCategoria($categoria);

    do {
        $queryCreateId = $objLivro->CreateId($objLivro);
    } while($queryCreateId == false);

    if($queryCreateId != false) {
        $queryCad = $objLivro->CadastrarLivro($objLivro);

        if($queryCad === true) {
            echo $queryCad;
        }

    }


?>