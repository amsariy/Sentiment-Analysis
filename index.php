<?php 



//himpunan dari fuzzy
$permintaan = ['naik','turun'];

//variabel 
$x      = $_GET['x'];
$naik   = 5000;
$turun  = 1000;

$rumus_turun    = ($naik - $x)/($naik - $turun);
$rumus_naik     = ($x - $turun)/($naik - $turun);
echo "X= ".$rumus_turun;
echo "<br>";
echo "Y= ".$rumus_naik;
echo "<br>";
echo "Jadi, nilai ".$x." adalah ....";
