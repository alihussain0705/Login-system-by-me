<?php
    $server="localhost";
    $username="root";
    $password="";
    $database="ols";
    $conn = new mysqli("localhost", "root", "", "ols");
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>