<?php
if($_SERVER['HTTP_ORIGIN'] == "https://chotapandit.com") {
    header('Access-Control-Allow-Origin: https://chotapandit.com');
    require_once "dbinfo2.php";
    $usermail=$_GET["mail"];
    $friendmail=$_GET['femail'];
    $pwd=$_GET['pwd'];
    $pwde=base64_decode($pwd);
    $t=time();
    if($pwde>=$t){
    $usermaile=base64_decode($usermail);
    $friendmaile=base64_decode($friendmail);
    // $usermaile=1;
    // $friendmaile=2;
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT email FROM friendlist WHERE email = '$friendmaile'");
    $stmt->execute(); 
    $row = $stmt->fetch();
    if($row== 0) {
    http_response_code(400);
    echo 'Failed';
    }
    else {
    $stmt = $conn->prepare("INSERT IGNORE INTO friends (one,two)
    VALUES ('$usermaile','$friendmaile')"
    );
    $stmt->execute();
    echo 'Donee';
    }
    }
    else{echo "DONE";}
 }
?>