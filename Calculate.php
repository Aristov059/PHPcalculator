<?php

    require_once "db.php";

    $month = $_POST['month'];
    $summa = 0;
    $user = $_POST['user'];
    $days = $_POST['days'];
    $service = $_POST['service'];
    $sort = $_POST['month'];
    $sort1 = $_POST['service'];

    if( empty($user) )
    {
        $invalid = true;
        header("Location: index.php?invalid=" . $invalid);
        return;
    }

    $stmt = $pdo->query("select * from service where id_service = " . $service);
    $summa_service = $stmt->fetchAll(); 

    if( $month == 1 || $month == 2 || $month == 12  ) {
        $summa = 600;
    } else if ( $month == 9 || $month == 10 || $month == 11 || $month == 3 || $month == 4 || $month == 5 ){
        $summa = 400;
    } else if ( $month == 6 || $month == 7 || $month == 8  ){
        $summa = 300;
    }

    $summa_month = $summa * $days + $summa_service[0]['summa'];

    require_once('index.php');
?>