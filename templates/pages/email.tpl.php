<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Emailek</title>
    <link rel="stylesheet" type="text/css" href="./styles/main.css">
    <!--styles/main.css volt -->
    <script type="text/javascript" src="js/main.js"></script>
</head>

<body>
    <h1>Kapcsolat</h1>

    <?php
    $conn = new mysqli("localhost", "root", "", "fuveszkert");
    if ($conn->connect_error) {

        die("Adatbázis kapcsolati hiba!" . $conn->connect_error);
    }



    $sql = "select * from mailek order by id desc";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
    ?>
    <ul>
        <li><?php echo $row['id'] ?></li>
        <li><?php echo $row['nev'] ?></li>
        <li><?php echo $row['email'] ?></li>
        <li><?php echo $row['szoveg'] ?></li>
        <li><?php echo $row['ido'] ?></li>
    </ul>
    <?php


        }
    } else {
        echo "Nincs kapott email";
    }
    $conn->close(); ?>

</body>

</html>