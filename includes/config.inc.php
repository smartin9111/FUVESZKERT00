<?php
$ablakcim = array(
    'cim' => 'A Füvészkertért alapítvány',
);

$fejlec = array(
    'kepforras' => 'head2.jpg',
    'kepforras1' => 'fuveszkert.jpg',
    'kepforras2' => 'nca.jpg',
    'kepforras3' => 'nea-01.jpg',
    'kepalt' => '',
    'cim' => '',
    'motto' => ''
);

$lablec = array(
    'copyright' => 'Copyright ' . date("Y") . '.',

);

$oldalak = array(
    '/' => array('fajl' => 'cimlap', 'szoveg' => 'Bemutatkozunk', 'menun' => array(1, 1)),
    'bemutatkozunk' => array('fajl' => 'tevekenyseg', 'szoveg' => 'Tevékenységünk', 'menun' => array(1, 1)),
    'kepek' => array('fajl' => 'kepek', 'szoveg' => 'Képek', 'menun' => array(1, 1)),
    'kapcsolat' => array('fajl' => 'kapcsolat', 'szoveg' => 'Kapcsolat', 'menun' => array(1, 1)),
    'email' => array('fajl' => 'email', 'szoveg' => 'Emailek', 'menun' => array(1, 1)),
    'mail' => array('fajl' => 'mail', 'szoveg' => '', 'menun' => array(0, 0)),

    'tablazat' => array('fajl' => 'tablazat', 'szoveg' => 'Észrevétel', 'menun' => array(1, 1)),

    'belepes' => array('fajl' => 'belepes', 'szoveg' => 'Belépés', 'menun' => array(1, 0)),
    'kilepes' => array('fajl' => 'kilepes', 'szoveg' => 'Kilépés', 'menun' => array(0, 1)),
    'belep' => array('fajl' => 'belep', 'szoveg' => '', 'menun' => array(0, 0)),
    'regisztral' => array('fajl' => 'regisztral', 'szoveg' => '', 'menun' => array(0, 0))
);

$hiba_oldal = array('fajl' => '404', 'szoveg' => 'A keresett oldal nem található!');

$MAPPA = './kepek/';
$TIPUSOK = array('.jpg', '.png');
$MEDIATIPUSOK = array('image/jpeg', 'image/png');
$DATUMFORMA = "Y.m.d. H:i";
$MAXMERET = 500 * 1024;