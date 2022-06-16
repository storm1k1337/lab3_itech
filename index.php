<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab-3</title>
</head>
<body>

    <!-- SELECT-1 -->

    <form method="GET">
        <select name="cpu" id="form1">
            <?php
            require_once('connecting.php');
            $dbh = connect();
            
            $querySelect = 'SELECT p.name FROM processor p';
                    
            foreach($dbh->query($querySelect) as $item)
                echo "<option value='$item[0]'>" . $item[0] . '</option>';
            ?>
        </select>
        <input type="button" value="Поиск" onclick="get('form1', 'cpu' ,'select-1.php', UpdateSelect1);">
    </form>

    <br><br>

    <!-- SELECT-2 -->

    <form method="GET">
        <select name="software" id="form2">
            <?php
            require_once('connecting.php');
            $dbh = connect();
            
            $querySelect = 'SELECT s.name FROM software s';
                    
            foreach($dbh->query($querySelect) as $item)
                echo "<option value='$item[0]'>" . $item[0] . '</option>';
            ?>
        </select>
        <input type="button" value="Поиск" onclick="get('form2', 'software' ,'select-2.php', UpdateSelect2);" >
    </form>

    <br><br>

    <!-- SELECT-3 -->

    <form method="GET">
        <input name="GuaranteeBtn" type="button" value="Получить список компьютеров с истекшим сроком гарантии"
        onclick="get(null, null, 'select-3.php', UpdateSelect3);"/>
    </form>

    <br><br><div id="result">Результат:<br><br></div>

    <script src="script.js"></script>
</body>
</html>