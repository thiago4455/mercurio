<?php

    $id = ($_POST['id']);

    require_once('../models/ClassNecessidades.php');
    $objNecessidade = new ClassNecessidades();

    $queryResp = $objNecessidade->RetNecessidadeCod($id);

    echo json_encode($queryResp);
?>