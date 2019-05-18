<?php

    require_once('../models/ClassDashboard.php');
    $objDashboard = new ClassDashboard();
    
    $query = $objDashboard->ListarItens();

    echo json_encode($query);

?>