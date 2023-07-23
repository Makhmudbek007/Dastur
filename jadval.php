<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bulma-0.9.4/bulma/css/bulma.css">
    <title>O'quvchilar jadvali</title>
</head>
<style>
    body{
        height: 100vh;
        display: flex;
        align-items: center;
        flex-direction: column;
    }
    details>table, th, td {
        border:1px solid black;
        padding: 10px;
    } 
    details{
        cursor: pointer;
        border: 1px solid black;
        padding: 10px;  
    }
    table>tr>th{
        text-align: center;
    }
    .btnBack{
        bottom:1vw;
        right:1vh;
        position: fixed;
        z-index: 1;
        padding: 10px 0px;
        text-decoration: none;
        background-color: blue;
        outline: 3px solid blue;
        border: 3px solid white;
        border-radius: 5px;
        transition: all 0.3s;
    }
    .btnBack:hover{
        padding: 10px 0px;
        text-decoration: none;
        background-color: white;
        outline: 3px solid white;
        border: 3px solid blue;
        border-radius: 5px;
        transition: all 0.3s;
    }
    .btnBack>a{
        color:white;
    }
    .btnBack>a:hover{
        color:black;
    }
    .onJur{
        color: dodgerblue;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        letter-spacing: 4px;
        border-bottom: 5px solid silver;
        font-size: 35px;
        font-weight: 700;
    }
    .okno{
        width: 100vw;
    }
    @media only screen and (max-width: 830px) {
        body {
            height: 100vh;
            width:120vw;
            display: flex;
            align-items: center;
            flex-direction: column;
        }
        .okno{
            width: 120vw;
        }
        details>table, th, td {
            border: 1px solid black;
            cursor: pointer;
            padding: 5px;
        }
        tr{
            text-align:center;
        }
        table{
            height:auto;
        }
        table>tr>th{
            text-align: center;
        }
        .btnBack{
            bottom:1vw;
            right:1vh;
            position: fixed;
            z-index: 1;
            padding: 5px 5px;
            text-decoration: none;
            background-color: blue;
            outline: 1px solid blue;
            border: 1px solid white;
            border-radius: 5px;
            transition: all 0.3s;
        }
        .btnBack:hover{
            padding: 5px 5px;
            text-decoration: none;
            background-color: white;
            outline: 1px solid white;
            border: 1px solid blue;
            border-radius: 5px;
            transition: all 0.3s;
        }
    }
    @media only screen and (max-width: 610px) {
        body {width:200vw;}
        .okno{width: 200vw;}
    }
    @media only screen and (max-width: 370px) {
        body {width:250vw;}
        .okno{width: 250vw;}
    }
    @media only screen and (max-width: 305px) {
        body {width:300vw;}
        .okno{width: 300vw;}
    }
    </style>
</style>
<body>
    <h1 class="onJur">Online Jurnal</h1>
    <br><br><br><br>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
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
        <button type="submit" class="button is-info">Ochish</button>
        <br><br>
    </form>
        <?php
            if(!empty($_POST["klasslar"])){
                    $bs = "SELECT * FROM $_POST[klasslar]";
                    $result2 = $sql -> query($bs);
                    print   "<table> <tr>
                    <th>#ID</th>
                    <th>Ism</th>
                    <th>Familya</th>
                    <th>Telefon-1</th>
                    <th>Telefon-2</th>
                    <th>Davomat</th>
                    <th>To'lov / Sana</th>
                    <th>Ma`lumotlar</th>
                    </tr>";
                    while ($row2 = $result2 -> fetch_assoc()) {
                        print "<tr>
                            <td>".$row2['id']."</td>
                            <td>".$row2['ism']."</td>
                            <td>".$row2['familiya']."</td>
                            <td><a href=`tel:".$row2['telefon']."`>".$row2['telefon']."</a></td>
                            <td><a href=`tel:".$row2['telefon2']."`>".$row2['telefon2']."</a></td>
                            <td>".$row2['davomat']."</td>
                            <td>".$row2['tulov']."</td>
                            <td><a href='"."./Base/".$_POST['klasslar']."_".$row2['id'].".txt'>Kirish</a></td>
                        </tr>";
                    }
                    echo "</table>";
                };
                ?>
    <br><br>
    <h1 style='font-size:18px;color:brown;'>Davomatni yoki to'lovni qo'shganingizdan so'ng guruhni qayta ochish kerak!</h1>
        <iframe src="davomat.php" frameborder="0" scrolling="no" class="okno"></iframe>
        <iframe src="tulov.php" frameborder="0" scrolling="no" class="okno"></iframe>
        <iframe src="uzgartirish.php" frameborder="0" scrolling="no" class="okno"></iframe>
        <iframe src="delete_user.php" frameborder="0" scrolling="no" class="del okno"></iframe>
    <nav class="btnBack">
        <a href="index.php" style="padding: 10px 50px;">Ortga</a>
    </nav>
</body>
</html>