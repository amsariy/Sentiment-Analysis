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

$query = $conn->query("SELECT * FROM table_komentar");
?>

<div class="komentar">
    <form action="post_komen.php" method="post">
        <table>
            <tr>
                <td><h4>Input Komentar pada Postingan</h4></td>
            </tr>
            <tr>
                <td>ID Posting</td>
                <td><input type="number" name="id_posting">
                </td>
            </tr>
            <tr>
                <td>Komentar</td>
                <td><textarea name="komen" id="komen" cols="22" rows="3"></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" value="Submit" ></td>
            </tr>
            <tr><td>
                <br>
            </td></tr>
        </table>
    </form>
</div>