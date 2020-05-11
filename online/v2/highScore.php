<?php
if($_SERVER['HTTP_ORIGIN'] == "https://chotapandit.com") {
    header('Access-Control-Allow-Origin: https://chotapandit.com');
    $useremail=$_GET["email"];
    $useremaile=base64_decode($useremail);
    require_once "dbinfo2.php";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT two FROM friends WHERE one = '$useremaile'");
    $stmt->execute();
    $emails = array();
    $scores = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $p  = array(
                  "email" => $two
            );
            array_push($emails, $p);
    }
    foreach ($emails as $email) {
        foreach ($email as $mail) {
        $stmt = $conn->prepare("SELECT name,userTs  FROM friendlist where email = '$mail'");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $p  = array(
                      "name" => $name,
                      "score" => $userTs
                      );
                array_push($scores, $p);
        }
        }

    }
    rsort($scores);
    http_response_code(200);
    echo json_encode([$scores[0]]);
}
?>