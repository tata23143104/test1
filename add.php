<?php
include('dbconnect.php');

$pm1 = $_GET['p1'];
$pm2_5 = $_GET['p2_5'];
$pm10 = $_GET['p10'];

$val1 = $_GET['p1'];
$val2 = $_GET['p2_5'];
$val3 = $_GET['p10'];
$sql = "INSERT INTO pm(PM1, PM2_5, PM10)
        VALUES ('$val1', '$val2', '$val3');";

if ($conn->query($sql) === TRUE) {
    echo "save OK";
}else {
    echo "Error:" . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
