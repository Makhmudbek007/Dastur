<?php include "db.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O'quvchi qo'shish sahifasi</title>
    <link rel="stylesheet" href="./bulma-0.9.4/bulma/css/bulma.css">

    <style>
        .register{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        form{
            width: 300px;
        }
        form h1{
            text-align: center;
            font-size: 25px;
            margin-bottom: 20px;
        }
        form label{
            font-size: 20px;
        }
        form input{
            width: 100%;
            height: 25px;
            font-size: 16px;
            margin-bottom: 10px;
        }
        .selects{
            width: 100%;
            display: flex;
            justify-content: space-between;
        }
        i{
            background-color: lightgreen;
            padding: 4px;
        }
        .statics{
            height:100vh;
        }
        .ps{
            display: flex;
        }
        .ps p{
            margin-left: 50px;
        }
        .people{
            height: 300vh;
            display: flex;
            justify-content:center;
            flex-direction:column;
        }
        .usr{
            height: max-content;
            width: 50%;
            display: flex;
            border-bottom: 2px solid silver;
            padding-bottom:5px;
            margin-top: 20px;
        }
        .usr span{
            display: flex;
            border:2px solid black;
            margin-left: 30px;
        }
        .usr span p{
            font-size:23px;
            margin: 0px 10px;
        }
        .usr select{
            margin-left: 40px;
        }
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
        }
        .btnBack{
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
        .addOrNot{
            text-align:center;
        }
        @media only screen and (max-width: 305px) {

        }

    </style>
</head>
<body>
    <div class="register">
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
        <h1>Ro'yxatdan O'ting</h1>
        <hr>
        <label for="ism">Ismingiz:</label><br>
        <input type="text" name="ism" id="ism" class="input is-info" placeholder="Ismingiz" style="border-color:red;"> <br>
        <label for="familiya">Familiyangiz:</label> <br>
        <input type="text" name="familiya" id="familiya" class="input is-info" placeholder="Familiyangiz" style="border-color:red;"> <br>
        <label for="tell">Telefon raqam:</label> <br>
        <input type="text" name="telefon" id="tell" class="input is-info" placeholder="Telefon raqam" style="border-color:red;"> <br>
        <label for="tell2">Qo'shimcha Raqam:</label> <br>
        <input type="text" name="telefon2" id="tell2" class="input is-info" placeholder="Ikkinchi telefon raqam"> <br>

        <label for="">Maktabingiz va sinfingiz:</label>
        <div style="width:100%; display:flex; justify-content: space-between;">
            <input type="number" name="maktab" id="maktab" class="input is-info" style="width:40%;border-color:red;" placeholder="Maktab">
            <input type="number" name="sinf" id="sinf" class="input is-info" style="width:40%;border-color:red;" placeholder="Sinf">
        </div>

        <label for="">Guruhni tanlang:</label>
        <div class="select is-info" style="width:100%">
            <select name='klasslar' style="width:100%;border-color:red;" id="sl">
            <option value=""></option>
            <?php
                $bz = "SHOW TABLES";
                $result = $sql -> query($bz);

                while ($row = $result -> fetch_assoc()) {
                    echo "<option value='".$row['Tables_in_a0842672_dastur']."'>".$row['Tables_in_a0842672_dastur']."</option>";
                };
                echo "</select>";
            ?>
        </div>
        
        <br><br>
        <input type="submit" value="Qo'shish" class="button is-info">
        <a href="index.php" class="button has-background-primary-dark">Ortga</a>
    </form>
</div>

<script>
    let i = document.getElementById("ism");
    let f = document.getElementById("familiya");
    let t = document.getElementById("tell");
    let m = document.getElementById("maktab");
    let s = document.getElementById("sinf");
    let g = document.getElementById("sl");

    
    i.addEventListener("input", ()=>{
        i.style.borderColor = "dodgerblue";
    })
    f.addEventListener("input", ()=>{
        f.style.borderColor = "dodgerblue";
    })
    t.addEventListener("input", ()=>{
        t.style.borderColor = "dodgerblue";
    })
    m.addEventListener("input", ()=>{
        m.style.borderColor = "dodgerblue";
    })
    s.addEventListener("input", ()=>{
        s.style.borderColor = "dodgerblue";
    })
    g.addEventListener("input", ()=>{
        g.style.borderColor = "dodgerblue";
    })
</script>
</body>
</html>

<?php
if(!empty($_POST['ism']) && !empty($_POST['familiya']) && !empty($_POST['telefon'] && !empty($_POST['klasslar']))){
    $ism = $_POST['ism'];
    $fam = $_POST['familiya'];
    $tel = $_POST['telefon'];
    $tel2 = $_POST['telefon2'];
    $mk = $_POST['maktab'];
    $sinf = $_POST['sinf'];

    $sql->query("INSERT INTO $_POST[klasslar] (ism, familiya, telefon, telefon2, maktab, sinf, tulov, davomat, malumotlar) VALUES('$ism', '$fam', '$tel', '$tel2', '$mk', '$sinf', 'Nomalum', 'Nomalum', '')");
    echo "<h1 class='addOrNot' style='color:green;'>Yangi o'quvchi qo'shildi</h1>";
} else {
    echo "<h1 class='addOrNot' style='color:red;'>Bo'sh joylarni to'ldiring!</h1><br><br>";
}
$sql->close();
?>