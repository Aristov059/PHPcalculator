<?php

    require_once "db.php";

    $invalid = $_GET['invalid'];

    $stmt = $pdo->query("select * from month");
    $months = $stmt->fetchAll();

    $stmt = $pdo->query("select * from service");
    $services = $stmt->fetchAll();

    if($invalid)
    {
        echo "<script> alert(\"Заполните ФИО\"); </script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Расчет стоимости</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form method="post" class="container">
        <h1 class="zagolovok">Расчет стоимости</h1>
        <div class="d_flex">
            <div class="text">
                <p>Месяц </p>
            </div>
            <select name="month" id="month" class="select" value="<?php echo $month; ?>">
                <?php foreach($months as $month): ?>
                    <option value="<?= $month['id_month'] ?>" <?php if($sort == $month['id_month']){ echo 'selected';}?>><?= $month['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="d_flex">
            <div class="text">
                <p>Стоимость 1 дня: </p>
            </div>
            <input type="text" class="input" name="summa" id="summa" value="<?php echo $summa; ?>" disabled>
        </div>
        <div class="d_flex">
            <div class="text">
                <p>ФИО ребенка: </p>
            </div>
            <input type="text" class="input" name="user" value="<?php echo $user; ?>">
        </div>
        <div class="d_flex">
            <div class="text">
                <p>Количество дней: </p>
            </div>
            <input type="number" class="input" name="days" max="31" min="1" value="<?php echo $days; ?>">
        </div>
        <div class="d_flex">
            <div class="text">
                <p>Дополнительная услуга </p>
            </div>
            <select name="service" id="service" class="select" value="<?php echo $service_pop; ?>">
                <?php foreach($services as $service): ?>
                    <option value="<?= $service['id_service'] ?>" <?php if($sort1 == $service['id_service']){ echo 'selected';}?>><?= $service['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="d_flex">
            <div class="text">
                <p>Сумма к оплате за месяц: </p>
            </div>
            <input type="number" class="input" name="summa_month" value="<?php echo $summa_month; ?>" disabled>
        </div>
        <div class="d_flex btn_block">
            <input formaction="Calculate.php" type="submit" class="btn" value="Рассчитать">
            <input formaction="addUser.php" type="submit" class="btn" value="Сохранить">
        </div>
    </form>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>