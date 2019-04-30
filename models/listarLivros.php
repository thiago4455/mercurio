<?php

    require_once('../class/ClassLivro.php');
    $objLivro = new ClassLivro();

    $queryResp = $objLivro->ListarTodosLivros();

    if($queryResp === false) {
        echo "Nenhum livro encontrado";
    }
    else {
       echo json_encode($queryResp);
    }


?>