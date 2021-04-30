<?php
//szerver oldali ellenőrzés 

if (!isset($_POST['nev']) || strlen($_POST['nev']) < 5) {
    exit("Hibás név: " . $_POST['nev']);
}

$re = '/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/';
if (!isset($_POST['email']) || !preg_match($re, $_POST['email'])) {
    exit("Hibás email: " . $_POST['email']);
}

if (!isset($_POST['szoveg']) || empty($_POST['szoveg'])) {
    exit("Hibás szöveg: " . $_POST['szoveg']);
}


?>
<?php

if (isset($_POST['nev']) && isset($_POST['email']) && isset($_POST['szoveg'])) {

    $dbh = new PDO(
        'mysql:host=localhost;dbname=fuveszkert',
        'root',
        '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );


    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
    // beszúrás
    $sqlInsert = "insert into mailek(id, nev, email, szoveg, ido)
                      values(0, :nev, :email, :szoveg,:ido)";
    $stmt = $dbh->prepare($sqlInsert);
    $stmt->execute(array(
        ':nev' => $_POST['nev'],
        ':email' => $_POST['email'],
        ':szoveg' => $_POST['szoveg'],
        ':ido' => date("Y-m-d H:i:s")
    ));
    if ($count = $stmt->rowCount()) {
        $newid = $dbh->lastInsertId();
        $uzenet = "Az üzenet elküldése sikeres!.<br>Azonosítója: {$newid}";
    }

    echo "<li> {$uzenet} </li>";
} ?>