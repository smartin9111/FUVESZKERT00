<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Kapcsolat</title>
    <link rel="stylesheet" type="text/css" href="styles/main.css">
    <script type="text/javascript" src="js/main.js"></script>
</head>

<body>
    <h1>Kapcsolat</h1>
    <form name="kapcsolat" action=".tpl.php" onsubmit="return ellenoriz();" method="post">
        <div>
            <label><input type="text" id="nev" name="nev" size="20" maxlength="40">Név (minimum 5 karakter): </label>
            <br />
            <label><input type="text" id="email" name="email" size="30" maxlength="40">E-mail (kötelező): </label>
            <br />
            <label> <textarea id="szoveg" name="szoveg" cols="40" rows="10"></textarea> Üzenet (kötelező): </label>
            <br />
            <input id="kuld" type="submit" value="Küld">
            <button onclick="ellenoriz();" type="button">Ellenőriz</button>
        </div>
    </form>

</body>

</html>

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

echo "Kapott értékek: ";
echo "<pre>";
var_dump($_POST);
echo "</pre>";
?>
</body>

</html>