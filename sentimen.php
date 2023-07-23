<?php
require_once 'vendor/autoload.php';

use Sastrawi\SentimentAnalyzer\AnalyzerFactory;
use Sastrawi\StopWordRemover\StopWordRemoverFactory;

$text = "Produk ini sangat bagus dan kualitasnya terjamin!";
$factory = new AnalyzerFactory();
$analyzer = $factory->createSentimentAnalyzer();
$stopwordFactory = new StopWordRemoverFactory();
$stopword = $stopwordFactory->createStopWordRemover();
$stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
$stemmer  = $stemmerFactory->createStemmer();
$stemmedText = $stemmer->stem($text);
$stopwordRemovedText = $stopword->remove($stemmedText);
$sentiment = $analyzer->analyze($stopwordRemovedText);

echo "Teks: " . $text . "<br>";
echo "Sentimen: " . $sentiment->getCategory() . "<br>";
echo "Skor Sentimen: " . $sentiment->getScore() . "<br>";
?>
