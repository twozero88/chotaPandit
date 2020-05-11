<?php
if($_SERVER['HTTP_ORIGIN'] == "https://chotapandit.com") {
    header('Access-Control-Allow-Origin: https://chotapandit.com');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
    header("Content-Type: application/json; charset=UTF-8");
    // header('Access-Control-Allow-Origin: *');
    // header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
    require_once "dbinfo.php";
    $name=$_GET["name"];
    $score=$_GET["score"];
    $namee=base64_decode($name);
    $scoree=base64_decode($score);
    $pwd=$_GET['pwd'];
    $pwde=base64_decode($pwd);
    $ip=$_SERVER['REMOTE_ADDR'];
    $t=time();
    if ($scoree>10000){
        die('Please do not do this.Help at chotapanditgame@gmail.com');
    }
    if ($namee=='rK' or $name=='hacked by rK'){
        die('Please do not do this.Help at chotapanditgame@gmail.com');
    }
    if($pwde>=$t){
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO score (name,score,ip)
    VALUES ('$namee','$scoree','$ip')";
    $conn->exec($sql);
    $conn = null;
    echo 'DONE.';
    }
    else{
        echo "DONE";
    }
    
} 

?>