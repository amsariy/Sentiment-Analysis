<?php
class TextMining
{
    // Fungsi untuk memisahkan teks menjadi kata-kata
    public function tokenizeText($text)
    {
        $text = strtolower($text); // Mengubah teks menjadi lowercase
        $text = preg_replace('/[^a-zA-Z0-9\s]/', '', $text); // Menghapus karakter non-alphanumeric
        $words = preg_split('/\s+/', $text); // Memisahkan teks menjadi kata-kata

        return $words;
    }

    // Fungsi untuk menghitung frekuensi kemunculan kata
    public function calculateWordFrequency($words)
    {
        $wordFrequency = array_count_values($words);

        return $wordFrequency;
    }

    // Fungsi untuk menghapus stop words dari kata-kata
    public function removeStopWords($words, $stopWords)
    {
        $filteredWords = array_diff($words, $stopWords);

        return $filteredWords;
    }

    // Fungsi untuk melakukan stemming pada kata-kata
    public function stemWords($words)
    {
        $stemmedWords = array();
        foreach ($words as $word) {
            // Implementasi algoritma stemming (misalnya menggunakan algoritma Porter Stemmer)
            // ...
            // $stemmedWord = ...; // Hasil stemming untuk kata tertentu
            // $stemmedWords[] = $stemmedWord;

            // Contoh sederhana tanpa algoritma stemming
            $stemmedWords[] = $word;
        }

        return $stemmedWords;
    }
}

$stopwords = array("ajak", "akan", "beliau", "khan", "lah", "dong", "ahh", "sob", "elo", "so", "kena", "kenapa", "yang", "dan", "tidak", "agak", "kata", "bilang", "sejak", "kagak", "cukup", "jua", "cuma", "hanya", "karena", "oleh", "lain", "setiap", "untuk", "dari", "dapat", "dapet", "sudah", "udah", "selesai", "punya", "belum", "boleh", "gue", "gua", "aku", "kamu", "dia", "mereka", "kami", "kita", "jika", "bila", "kalo", "kalau", "dalam", "nya", "atau", "seperti", "mungkin", "sering", "kerap", "acap", "harus", "banyak", "doang", "kemudian", "nyala", "mati", "milik", "juga", "mau", "dimana", "apa", "kapan", "kemana", "selama", "siapa", "mengapa", "dengan", "kalian", "bakal", "bakalan", "tentang", "setelah", "hadap", "semua", "hampir", "antara", "sebuah", "apapun", "sebagai", "di", "tapi", "lainnya", "bagaimana", "namun", "tetapi", "biar", "pun", "itu", "ini", "suka", "paling", "mari", "ayo", "barangkali", "mudah", "kali", "sangat", "banget", "disana", "disini", "terlalu", "lalu", "terus", "trus", "sungguh", "telah", "mana", "apanya", "ada", "adanya", "adalah", "adapun", "agaknya", "agar", "akankah", "akhirnya", "akulah", "amat", "amatlah", "anda", "andalah", "antar", "diantaranya", "antaranya", "diantara", "apaan", "apabila", "apakah", "apalagi", "apatah", "ataukah", "ataupun", "bagai", "bagaikan", "sebagainya", "bagaimanapun", "sebagaimana", "bagaimanakah", "bagi", "bahkan", "bahwa", "bahwasanya", "sebaliknya", "sebanyak", "beberapa", "seberapa", "begini", "beginian", "beginikah", "beginilah", "sebegini", "begitu", "begitukah", "begitulah", "begitupun", "sebegitu", "belumlah", "sebelum", "sebelumnya", "sebenarnya", "berapa", "berapakah", "berapalah", "berapapun", "betulkah", "sebetulnya", "biasa", "biasanya", "bilakah", "bisa", "bisakah", "sebisanya", "bolehkah", "bolehlah", "buat", "bukan", "bukankah", "bukanlah", "bukannya", "percuma", "dahulu", "daripada", "dekat", "demi", "demikian", "demikianlah", "sedemikian", "depan", "dialah", "dini", "diri", "dirinya", "terdiri", "dulu", "enggak", "enggaknya", "entah", "entahlah", "terhadap", "terhadapnya", "hal", "hanyalah", "haruslah", "harusnya", "seharusnya", "hendak", "hendaklah", "hendaknya", "hingga", "sehingga", "ia", "ialah", "ibarat", "ingin", "inginkah", "inginkan", "inikah", "inilah", "itukah", "itulah", "jangan", "jangankan", "janganlah", "jikalau", "justru", "kala", "kalaulah", "kalaupun", "kamilah", "kamulah", "kan", "kau", "kapankah", "kapanpun", "dikarenakan", "karenanya", "ke", "kecil", "kepada", "kepadanya", "ketika", "seketika", "khususnya", "kini", "kinilah", "kiranya", "sekiranya", "kitalah", "kok", "lagi", "lagian", "selagi", "melainkan", "selaku", "melalui", "lama", "lamanya", "selamanya", "lebih", "terlebih", "bermacam", "macam", "semacam", "maka", "makanya", "makin", "malah", "malahan", "mampu", "mampukah", "manakala", "manalagi", "masih", "masihkah", "semasih", "masing", "maupun", "semaunya", "memang", "merekalah", "meski", "meskipun", "semula", "mungkinkah", "nah", "nanti", "nantinya", "nyaris", "olehnya", "seorang", "seseorang", "pada", "padanya", "padahal", "sepanjang", "pantas", "sepantasnya", "sepantasnyalah", "para", "pasti", "pastilah", "per", "pernah", "pula", "merupakan", "rupanya", "serupa", "saat", "saatnya", "sesaat", "aja", "saja", "sajalah", "saling", "bersama", "sama", "sesama", "sambil", "sampai", "sana", "sangatlah", "saya", "sayalah", "se", "sebab", "sebabnya", "tersebut", "tersebutlah", "sedang", "sedangkan", "sedikit", "sedikitnya", "segala", "segalanya", "segera", "sesegera", "sejenak", "sekali", "sekalian", "sekalipun", "sesekali", "sekaligus", "sekarang", "sekitar", "sekitarnya", "sela", "selain", "selalu", "seluruh", "seluruhnya", "semakin", "sementara", "sempat", "semuanya", "sendiri", "sendirinya", "seolah", "sepertinya", "seringnya", "serta", "siapakah", "siapapun", "disinilah", "sini", "sinilah", "sesuatu", "sesuatunya", "suatu", "sesudah", "sesudahnya", "sudahkah", "sudahlah", "supaya", "tadi", "tadinya", "tak", "tanpa", "tentu", "tentulah", "tertentu", "seterusnya", "tiap", "setidaknya", "tidakkah", "tidaklah", "toh", "waduh", "wah", "wahai", "sewaktu", "walau", "walaupun", "wong", "yaitu", "yakni");
?>