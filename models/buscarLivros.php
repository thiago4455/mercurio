<?php

    require_once '../class/ClassLivro.php';
    $objLivro = new ClassLivro();

    $termoBusca = $_POST['termoBusca'];

    $queryResp = $objLivro->BuscarLivro($termoBusca);

    if($queryResp === false) {
        echo json_encode ("Nenhum livro encontrado");
    }
    else {
       echo json_encode($queryResp);
    }

?>