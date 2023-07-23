<?php
include "db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Jurnal</title>
    <link rel="stylesheet" href="bulma-0.9.4/bulma/css/bulma.css">
    <style>
        body{
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }
        h1{
            margin-bottom: 200px;
            color: dodgerblue;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            letter-spacing: 4px;
            border-bottom: 5px solid silver;
            font-size: 35px;
            font-weight: 700;
        }
        a{
            width:250px;
            font-size: 20px;
            text-decoration: none;
            color: white;
            background-color: dodgerblue;
            margin-top: 40px;
            padding: 10px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border-radius: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Online Jurnal</h1>
    <a href="add_user.php">Yangi O'quvchi Qo'shish</a>
    <a href="jadval.php">Jadval</a>

    <form action="add_group.php" method="post" style="margin-top: 100px;">
        <input value='0' name='inpVal' style='display:none;'>
        <input type="text" name="gsoni" class="input is-info" style="width: 100px;">
        <button type="submit" class="button is-info" style="width: 100px;">Tayyor</button>
    </form>

    <form action="delete_group.php" method="post" style="margin-top: 50px;">
        <div class="select is-info" id="bb">
            <select name='klasslar'>
                <?php
                    $bz = "SHOW TABLES";
                    $result = $sql -> query($bz);
    
                    while ($row = $result -> fetch_assoc()) {
                        echo "<option value='".$row['Tables_in_a0842672_dastur']."'>".$row['Tables_in_a0842672_dastur']."</option>";
                    };
                    echo "</select>";
                ?>
            </div>
            <button type="submit" class="button is-danger" style="width: 100px;">Delete</button>
        </form>
        <h2>Guruhni o'chirish</h2>
</body>
</html>