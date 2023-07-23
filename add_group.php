<?php
    include "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $bz = "SHOW TABLES";
        $result = $sql -> query($bz);
        while ($row = $result -> fetch_assoc()) {
            $gur = $row['Tables_in_a0842672_dastur'];
            $gsoni = $_POST['gsoni'];
            if ($gur == strtolower($gsoni)) {
                echo "";
                $_POST['inpVal'] = '1';
            }else {
                echo "";
            }
        };
        if ('1' == "$_POST[inpVal]") {
            echo "<span style='color:red; font-size:20px;'>Xatolik </span><span style='color:black;'> ' </span><span style='color:green; font-size:20px;'>".$_POST['gsoni']."</span><span style='color:black;'> ' </span> <span style='color:red; font-size:20px;'>degan guruh mavjud!</span>";
        }else if(is_numeric($_POST['gsoni']) == "1"){
            echo "<span style='color:red; font-size:20px;'>Son kiritilmasin!</span>";
        }else{
            $sql->query("CREATE TABLE $_POST[gsoni]
                (id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                ism VARCHAR(25) NOT NULL,
                familiya VARCHAR(25) NOT NULL,
                telefon VARCHAR(20) NOT NULL,
                telefon2 VARCHAR(20) NOT NULL,
                maktab INT NOT NULL,
                sinf INT NOT NULL,
                tulov VARCHAR(30) NOT NULL,
                davomat VARCHAR(30),
                malumotlar TEXT NOT NULL)
                ");
            echo "<span style='color:green; font-size:20px;'><span style='color:red; font-size:20px;'> '".$_POST['gsoni']."' </span> nomli guruh yaratildi!</span>";
        };
    
    ?>
    <a href="index.php" style="padding: 3px 10px;background: black; color: wheat;font-size: 22px;text-decoration:none;">Ortga</a>
</body>
</html>