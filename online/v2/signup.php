<?php
if($_SERVER['HTTP_ORIGIN'] == "https://chotapandit.com") {
    header('Access-Control-Allow-Origin: https://chotapandit.com');
    require_once "dbinfo2.php";
    $name=$_GET["name"];
    $mail=$_GET['mail'];
    $pic=$_GET['p'];
    $pwd=$_GET['pwd'];
    echo $pwd;
    $pwde=base64_decode($pwd);
    $t=time();
    // echo $pwd;
    // echo '<br>';
    // $pwde=$pwde+1;
    // echo $pwde;
    // echo '<br>';
    // echo $t;
    if($pwde>=$t){
    $namee=base64_decode($name);
    $maile=base64_decode($mail);
    $pice=base64_decode($pic);
    $userTs=0;
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("INSERT INTO friendlist (name,email,userTs,friends)
    VALUES ('$namee','$maile','$userTs','$pice')"
    );
    $stmt->execute();
    echo 'Done.';
}
else{
    echo "Done";
}
}
?>