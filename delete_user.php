<?php include "db.php";?>
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
        <h1 style="font-size: 26px;margin-left:20px;color:red;">O'quvchini o'chirib tashlash</h1>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" style="display: flex;gap: 20px;width: max-content;margin: 20px;">
        <div>
            <div class="select is-info">
            <select name='klasslar' id='sl'>
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
            <input type="number" name="userID" id="userID" placeholder="ID" class="input is-info" style="width: 60px;border-color:red;">

            <input type="submit" value="Delete" class="button is-danger">
        </form>
    </div>

    <script>
        let g = document.getElementById("sl");
        let i = document.getElementById("userID");
        let t = document.getElementById("dav");
        let ts = document.getElementById("sana");
        

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
if(!empty($_POST['klasslar']) && !empty($_POST['userID'])){
    $kls = $_POST['klasslar'];
    $uid = $_POST['userID'];

    $r = $sql->query("SELECT * FROM $_POST[klasslar]");
    while($row = $r->fetch_assoc()){
        if($uid == $row["id"]){
            echo "<h2 class='register' style='color:red;margin-left:20px;'>O'quvchi o'chirib tashlandi</h2>";
            $sql->query("DELETE FROM $_POST[klasslar] WHERE id = '$uid'");
            unlink("'./Base/' . $kls . '_' . $uid . '.txt'");
        } else {
            echo "<h2 class='register' style='color:red;margin-left:20px;'>O'quvchi topilmadi</h2>";
        }
    }
    } else {
        echo "<h1 class='register' style='color:red;margin-left:20px;'>Bo'sh joylarni to'ldiring!</h1>";
}
$sql->close();