<?php
require 'vendor/autoload.php';

$fuzzy = new Techarea\Phuzzy\Phuzzy;

//set variable 
$fuzzy->setInputNames(['naik','turun']); 

//set nama variabel
$fuzzy->setOutputNames(['permintaan','persediaan']);

//menambahkan variabel 
$fuzzy->addMember('naik','')