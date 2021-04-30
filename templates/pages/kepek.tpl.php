<?php
// Alkalmazás logika:
include('./includes/config.inc.php');

// adatok összegyűjtése:    


//var_dump($olvaso);
if (isset($_POST['kuld']) && isset($_SESSION['login'])) {
    //print_r($_FILES);
    foreach ($_FILES as $fajl) {
        if ($fajl['error'] == 4);   // Nem töltött fel fájlt
        elseif (!in_array($fajl['type'], $MEDIATIPUSOK))
            $uzenet[] = " Nem megfelelő típus: " . $fajl['name'];
        elseif (
            $fajl['error'] == 1   // A fájl túllépi a php.ini -ben megadott maximális méretet
            or $fajl['error'] == 2   // A fájl túllépi a HTML űrlapban megadott maximális méretet
            or $fajl['size'] > $MAXMERET
        )
            $uzenet[] = " Túl nagy állomány: " . $fajl['name'];
        else {
            $vegsohely = $MAPPA . strtolower($fajl['name']);
            if (file_exists($vegsohely))
                $uzenet[] = " Már létezik: " . $fajl['name'];
            else {
                move_uploaded_file($fajl['tmp_name'], $vegsohely);
                $uzenet[] = ' Ok: ' . $fajl['name'];
            }
        }
    }
} else {
    $uzenet[] = 'Kérem jelentkezzen be a képfeltöltéshez!';
}
$olvaso = opendir($MAPPA);
while (($fajl = readdir($olvaso)) !== false)
    if (is_file($MAPPA . $fajl)) {
        $vege = strtolower(substr($fajl, strlen($fajl) - 4));
        if (in_array($vege, $TIPUSOK))
            $kepek[$fajl] = filemtime($MAPPA . $fajl);
    }
closedir($olvaso);
// Megjelenítés logika:

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Galéria</title>
    <style type="text/css">
    div#galeria {
        margin: 0 auto;
        width: 620px;
    }

    div.kep {
        display: inline-block;
    }

    div.kep img {
        width: 200px;
    }
    </style>
</head>

<body>


    <?php
    if (!empty($uzenet)) {
        foreach ($uzenet as $uzi) {

            echo "<li>$uzi</li>";
        }
    } ?>



    <form action="?oldal=kepek" method="post" enctype="multipart/form-data">
        <label>Első:
            <input type="file" name="elso" required>
        </label><br>
        <label>Második:
            <input type="file" name="masodik">
        </label><br>
        <label>Harmadik:
            <input type="file" name="harmadik">
        </label><br>
        <input type="submit" name="kuld">
    </form>

    <div id="galeria">
        <h1>Galéria</h1>
        <?php
        arsort($kepek);
        foreach ($kepek as $fajl => $datum) {
        ?>
        <div class="kep">
            <a href="<?php echo $MAPPA . $fajl ?>">
                <img src="<?php echo $MAPPA . $fajl ?>">
            </a>
            <p>Név: <?php echo $fajl; ?></p>
            <p>Dátum: <?php echo date($DATUMFORMA, $datum); ?></p>
        </div>
        <?php
        }
        ?>
    </div>
</body>

</html>