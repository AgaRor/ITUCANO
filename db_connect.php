<?php 
echo '1';
    $servername='localhost';
    $username='root';
    $password='';
    $db_name='db_itucano';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);

    echo "include success";
?>