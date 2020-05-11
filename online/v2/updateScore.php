<?php
if($_SERVER['HTTP_ORIGIN'] == "https://chotapandit.com") {
    header('Cache-Control','no-cache,no-store,max-age=0,must-revalidate');
    header('Pragma','no-cache');
    header('Expires','-1');
    header('Access-Control-Allow-Origin: https://chotapandit.com');
    require_once "dbinfo2.php";
    $email=$_GET["email"];
    $score=$_GET["score"];
    $emaile=base64_decode($email);
    $scoree=base64_decode($score);
    $pwd=$_POST['pwd'];
    $pwde=base64_decode($pwd);
    $t=time();
    if($pwde>=$t){
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT userTs FROM friendlist WHERE email = '$emaile'");
    $stmt->execute();
    // $products = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $prevScore = $row['userTs'];
            if ($score > $prevScore){
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "UPDATE friendlist SET userTs = '$scoree' WHERE email = '$emaile'";
                $conn->exec($sql);
                $conn = null;
            }
            echo $score;
            }
}
}
?>