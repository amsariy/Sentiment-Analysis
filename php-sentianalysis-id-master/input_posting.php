<?php
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
<div class="posting">
    <form action="post_posting.php" method="post">
        <table border='0'>
            <tr>
                <td><h4>Input Data Posting</h4> 
                </td>
            </tr>
            <tr>
                <td>Judul Posting</td>
                <td><input type="text" name="judul_posting"/></td>
            </tr>
            <tr>
                <td>Tanggal Posting</td>
                <td><input type="date" name='tgl_posting'></td>
            </tr>
            <tr>
                <td><input type="submit" value="Submit" ></td>
            </tr>
            <tr><td>
                <br>
            </td></tr>
    </form>
</div>


