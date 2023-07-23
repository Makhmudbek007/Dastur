<?php include "db.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./bulma-0.9.4/bulma/css/bulma.css">
    <style>
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
        }
        .register{
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="register">
    <h1 style="font-size: 26px;margin-left:20px;">To'lov</h1>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" style="display: flex;gap: 20px;width: max-content;margin: 20px;">
        <div>
            <div class="select is-link">
            <select name='klasslar' id="sl">
                <?php
                    $bz = "SHOW TABLES";
                    $result = $sql -> query($bz);

                    while ($row = $result -> fetch_assoc()) {
                        echo "<option value='".$row['Tables_in_a0842672_dastur']."'>".$row['Tables_in_a0842672_dastur']."</option>";
                    };
                    echo "</select>";
                ?>
            </div>
    </div>
            <input type="number" name="userID" id="userID" placeholder="ID" class="input is-link" style="width: 60px;border-color:red;">
            <div style="display: flex;justify-content: space-between;">
                <div class="select is-link">
                    <select name="tulov" id="tulov" style="border-color:red;">
                        <option value="0"></option>
                        <option value="To'lov Qilindi">To'lov qildi</option>
                        <option value="To'lov Qilinmadi">To'lov qilmadi</option>
                    </select>
                </div>

            </div>
            <input type="date" name="tulov_sana" id="tulov_sana" class="input is-link" style="border-color:red;">
            <input type="submit" value="Ok" class="button is-link">
        </form>
    </div>

    <script>
        let g = document.getElementById("sl");
        let i = document.getElementById("userID");
        let t = document.getElementById("tulov");
        let ts = document.getElementById("tulov_sana");
        
        g.addEventListener("input", ()=>{
        g.style.borderColor = "dodgerblue";
    })
        i.addEventListener("input", ()=>{
        i.style.borderColor = "dodgerblue";
    })
        t.addEventListener("input", ()=>{
        t.style.borderColor = "dodgerblue";
    })
        ts.addEventListener("input", ()=>{
        ts.style.borderColor = "dodgerblue";
    })
    </script>
</body>
</html>

<?php
if(!empty($_POST['klasslar']) && !empty($_POST['userID']) && !empty($_POST['tulov']) && !empty($_POST['tulov_sana'])){
    $kls = $_POST['klasslar'];
    $uid = $_POST['userID'];
    $tul = $_POST['tulov'];
    $tuls = $_POST['tulov_sana'];

    
        $sql->query("UPDATE $_POST[klasslar] SET `tulov` = '$tuls' WHERE id = '$uid'");
        $r = $sql->query("SELECT * FROM $_POST[klasslar]");
        while($row = $r->fetch_assoc()){
            if($uid == $row['id']){
                $nm = $row["ism"] . " " . $row["familiya"];
                echo "<h2 class='register' style='color:green;margin-left:20px;'>Ma'lumotlar to'g'ri yuborildi</h2>";
                $f = fopen("./Base/" . $kls . "_" . $uid . ".txt", "a") or die("Fayl topilmadi 404");
                fwrite($f, $nm .  " " . $tul . " " . $tuls . "\n");
                fclose($f);
            } else {
                echo "<h2 class='register' style='color:red;margin-left:20px;'>O'quvchi topilmadi</h2>";
            }
        }
} else {
    echo "<h1 class='register' style='color:red;margin-left:20px;'>Bo'sh joylarni to'ldiring!</h1>";
}
$sql->close();