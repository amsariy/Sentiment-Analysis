<?php 
// include 'perbaikitext.php';
require_once 'textmining/TextMining.php';

// error_reporting(0);
$servername = 'localhost';
$username = 'root';
$password = 'bismillah';
$dbname = 'quran';

$conn = new mysqli($servername, $username, $password, $dbname);
// Inisialisasi objek TextMining
$textMining = new TextMining();

if($conn->connect_error) {
    die("Error connecting to database: " . mysqli_error_string($conn));
}
?>
<form method="get" action="">
    <input type="text" name="q" value="" />
    <input type="submit" value="cari">
</form>

<?php 
if(isset($_GET['q'])){
    $keyword = $_GET['q'];

    // Memisahkan teks menjadi kata-kata
    $words = $textMining->tokenizeText($keyword);

    $filteredWords = $textMining->removeStopWords($words, $stopwords);

    foreach ($filteredWords as $word) {
        $word1 = $word1." ".$word;
    } 
    $stemmedWords = $textMining->stemWords($filteredWords);
    foreach ($stemmedWords as $word) {
        $word2 = $word2." ".$word." ";
    }
    // echo "hasil pencarian:<br>";
    // echo "Mungkin menurut anda adalah:".completeText($keyword)."<hr>";
    
    //query untuk pencarian dengan metode NLP fulltext search
    // $keyword = $_GET['q'];
    

    $query = $conn->query("SELECT quran_text.aya as ayat, quran_text.sura, quran_text.text as arab, id_indonesian.text as arti from quran_text JOIN id_indonesian ON quran_text.aya = id_indonesian.aya where MATCH (id_indonesian.text) AGAINST ('$word2' IN NATURAL LANGUAGE MODE)");
    echo "hasil steming: ".$word2."<hr>";
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            echo "Ayat: ".$row['ayat']."<br>";
            echo "Arab: ".$row['arab']."<br>";
            echo "Arti: ".$row['arti']."<br>";
        }
    }else{
        echo "Tidak ada data sesuai";
    }
}
$conn->close();