<?php
function completeText($kata) {
    $kata = urlencode($kata);
    $url = "https://serpapi.com/search.json?q=".$kata."&hl=id&gl=us&api_key=01aa75831dfc7724eb1da49001aed9dcebcd0d2cf034165bde14f5c29c300b05";
    $hasil = file_get_contents($url);

    $katanya = json_decode($hasil, true);
    return $katanya['search_information']['spelling_fix'];
}
?>
