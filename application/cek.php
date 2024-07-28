// Uji koneksi database di file PHP terpisah
<?php
$mysqli = new mysqli("localhost", "your_db_username", "your_db_password", "your_db_name");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
echo "Connected successfully";
?>