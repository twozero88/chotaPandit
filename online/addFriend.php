<?php
// if($_SERVER['HTTP_ORIGIN'] == "https://chotapandit.com") {
    header('Access-Control-Allow-Origin: https://chotapandit.com');
    require_once "dbinfo.php";
    $usermail=$_GET["mail"];
    $friendmail=$_GET['femail'];
    $usermaile=base64_decode($usermail);
    $friendmaile=base64_decode($friendmail);
    // $usermaile=1;
    // $friendmaile=2;
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("INSERT INTO friends (one,two)
    VALUES ('$usermaile','$friendmaile')"
    );
    $stmt->execute();
//}
?>