<?php
include "input_posting.php";

include "input_komen.php";

require_once __DIR__ . '/autoload.php';
$sentiment = new \PHPInsight\Sentiment();


error_reporting(0);
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'uas';

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error) {
    die("Error connecting to database: " . mysqli_error_string($conn));
}

$query = $conn->query("SELECT * FROM table_posting");

?>
<!-- // $jumlah = $positif + $negatif + $netral;
// $rata_rata =  $jumlah / $jumlah_kat; -->

<table border="1" cellspacing="1.5">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Posting</th>
            <th style="width:25%">Judul Posting</th>
            <th>Banyak Komentar</th>
            <th>Negatif</th>
            <th>Positif</th>
            <th>Netral</th>
            <th>Grafik</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i=1;

        while ($row=$query->fetch_assoc()){

            $id_posting = $row['id_posting'];
            $count_comment = $conn->query("SELECT count(id_posting) as banyak FROM table_komentar")->fetch_row();
            $komentar = $conn->query("SELECT komentar FROM table_komentar where id_posting=$id_posting;");
		    $class = $sentiment->categorise($string);
            $positif = 0;
            $negatif = 0;
            $netral = 0;
            // $data = [$positif,$negatif,$netral];

            while($komen = $komentar->fetch_assoc()){
                $kategori = $sentiment->categorise($komen['komentar']);
                if($kategori=='positif'){
                    $positif++;
                }
                elseif($kategori=='negatif'){
                    $negatif++;
                }
                elseif($kategori=='netral'){
                    $netral++;
                }
            }
                ?>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                    google.charts.load('current', { 'packages': ['corechart'] });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart<?php echo $id_posting; ?>() {
                    var data = google.visualization.arrayToDataTable([
                        ['Kategori', 'Jumlah'],
                        ['Positif', <?php echo $positif; ?>],
                        ['Negatif', <?php echo $negatif; ?>],
                        ['Netral', <?php echo $netral; ?>],
                    ]);

                        var options = {
                            title: 'Sentiment Analysis',
                            is3D: false
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('piechart<?php echo $count_comment; ?>'));

                        chart.draw(data, options);
                    }
                </script>
            <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $id_posting;?></td>
                <td><?php echo $row['judul_posting'];?></td>
                <td><?php echo $count_comment[0];?></td>
                <td><?php echo $negatif;?></td>
                <td><?php echo $positif;?></td>
                <td><?php echo $netral;?></td>
                <td>
                    <div id="piechart<?php echo $count_comment; ?>" style="width: 20px; height: 10px;"></div>
                </td>
            </tr>
            
        <?php } ?>
</tbody>
</table>













