<?php
    require_once("./animal.php");
    require_once("./ape.php");
    require_once("./frog.php");

    $sheep = new Animal("shaun");

    echo "Nama binatang : " . $sheep->name . "<br>";  // "shaun"
    echo "Jumlah Kaki : " . $sheep->legs . "<br>"; // 4
    echo "Berdarah diingin ? : " . $sheep->cold_blooded . "<br><br>"; // "no"

    $sungokong = new Ape("kera sakti");
    echo "Nama binatang : " . $sungokong->name . "<br>";  // "shaun"
    echo "Jumlah Kaki : " . $sungokong->legs . "<br>"; // 4
    echo "Berdarah diingin ? : " . $sungokong->cold_blooded . "<br>"; // "no"
    echo $sungokong->yell() . "<br><br>"; // "Auooo"

    $kodok = new Frog("buduk");
    echo "Nama binatang : " . $kodok->name . "<br>";  // "shaun"
    echo "Jumlah Kaki : " . $kodok->legs . "<br>"; // 4
    echo "Berdarah diingin ? : " . $kodok->cold_blooded . "<br>"; // "no"
    echo $kodok->jump() . "<br><br>"; // "hop hop"
?>