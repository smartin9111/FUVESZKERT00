<?php session_start(); ?>
<?php if (file_exists('./logicals/' . $keres['fajl'] . '.php')) {
    include("./logicals/{$keres['fajl']}.php");
} ?>
<!DOCTYPE html>
<html>

<head>
    <link rel='stylesheet' id='greenleaf_stylesheet1-css'
        href='https://fonts.googleapis.com/css?family=Crafty+Girls&#038;ver=5.7.1' type='text/css' media='all' />
    <link rel='stylesheet' id='greenleaf_stylesheet2-css'
        href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz%3Aregular%2Cbold&#038;ver=5.7.1' type='text/css'
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <meta charset="utf-8">
    <title><?= $ablakcim['cim'] . ((isset($ablakcim['mottó'])) ? ('|' . $ablakcim['mottó']) : '') ?></title>
    <link rel="stylesheet" href="/images/style.css" type="text/css">
    <?php if (file_exists('images/styles/' . $keres['fajl'] . '.css')) { ?>
    <link rel="stylesheet" href="images/styles/<?= $keres['fajl'] ?>.css" type="text/css"><?php } ?>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <header>

                    <h1><?= $fejlec['cim'] ?></h1>
                    <?php if (isset($fejlec['motto'])) { ?><h2><?= $fejlec['motto'] ?></h2><?php } ?>
                    <?php if (isset($_SESSION['login'])) { ?>Bejlentkezve:
                    <strong><?= $_SESSION['csn'] . " " . $_SESSION['un'] . " (" . $_SESSION['login'] . ")" ?></strong><?php } ?>
                </header>
                <div id="wrapper">
                    <div id="header">
                        <div id="logo">
                            <div style="float: left;">
                                <img src="/images/head2.jpg">
                            </div>
                            <div style="float: left; width: 150px; margin-top: 15px;">
                                <div>
                                    <img src="/images/nca.jpg">
                                </div>
                                <div>
                                    <img src="/images/fuveszkert.jpg">
                                </div>
                            </div>
                            <div class="nea">

                                <img src="/images/nea-01.jpg" width="150"></a>
                            </div>
                            <div style="clear:both;"></div>
                        </div>


                        <div style="clear:both;"></div>

                        <aside id="nav">
                            <div class="menu-menu-container">
                                <nav>
                                    <ul>
                                        <?php foreach ($oldalak as $url => $oldal) { ?>
                                        <?php if (!isset($_SESSION['login']) && $oldal['menun'][0] || isset($_SESSION['login']) && $oldal['menun'][1]) { ?>
                                        <li<?= (($oldal == $keres) ? ' class="active"' : '') ?>>
                                            <a href="<?= ($url == '/') ? '.' : ('?oldal=' . $url) ?>">
                                                <?= $oldal['szoveg'] ?></a>

                                            </li>
                                            <?php } ?>
                                            <?php } ?>

                                    </ul>
                                </nav>
                            </div>
                        </aside>
                        <div id="content">
                            <div class="post-9 page type-page status-publish hentry" id="post-9">
                                <?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?>
                            </div>
                        </div>
                    </div>
                    <footer>
                        <div id="footer">
                            <p class="fright">A weboldal fejlesztése a <a href="http://www.nca.hu"
                                    target="_blank">Nemzeti
                                    Civil
                                    Alapprogram (NCA)</a> támogatásával valósult meg.<br>© <a
                                    href="https://www.kertertalapitvany.hu/">Füvészkertért Alapítvány, 2021</a>. Minden
                                jog
                                fenntartva.
                            </p>
                            <p class="fleft">
                            </p>
                            <div style="clear:both;"></div>
                        </div>

                    </footer>
                </div>

</html>