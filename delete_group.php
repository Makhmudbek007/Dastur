<?php
include "db.php";
if(!empty($_POST["klasslar"])){
    $bz2 = "SHOW TABLES";
    $result2 = $sql -> query($bz2);
    while ($row2 = $result2 -> fetch_assoc()){

    if($_POST["klasslar"] == $row2['Tables_in_a0842672_dastur']){
        $sql->query("DROP TABLE $_POST[klasslar]");
        echo "<h2 style='color:red;'> ' ".$_POST['klasslar']." ' o'chirib tashlandi!</h2>";
    }
}
} else {
    echo "<h2>Guruhni o'chirish</h2>";
}
echo "<a href='index.php' style='padding: 3px 10px;background: black; color: wheat;font-size: 22px;text-decoration:none;'>Ortga</a>";
?>