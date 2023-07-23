<?php
// Mengimpor library TextMining
require_once 'TextMining.php';

// Inisialisasi objek TextMining
$textMining = new TextMining();

// Menentukan teks yang akan diproses
$text = "";
// Memisahkan teks menjadi kata-kata
$words = $textMining->tokenizeText($text);

// Menghitung frekuensi kemunculan kata
$wordFrequency = $textMining->calculateWordFrequency($words);

// Menampilkan kata-kata beserta frekuensi kemunculannya
echo "Kata-kata yang ditemukan dan frekuensi kemunculannya:<br>";
foreach ($wordFrequency as $word => $frequency) {
    echo $word . ": " . $frequency . "<br>";
}

// Melakukan proses stop word removal
$stopWords   = $stopwords;
$filteredWords = $textMining->removeStopWords($words, $stopWords);

// Menampilkan kata-kata setelah stop word removal
echo "<br>Kata-kata setelah stop word removal:<br>";
foreach ($filteredWords as $word) {
    echo $word . "<br>";
}

// Melakukan proses stemming
$stemmedWords = $textMining->stemWords($filteredWords);

// Menampilkan kata-kata setelah stemming
echo "<br>Kata-kata setelah stemming:<br>";
foreach ($stemmedWords as $word) {
    echo $word . "\n";
}
?>