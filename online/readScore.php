<?php
if($_SERVER['HTTP_ORIGIN'] == "https://chotapandit.com") {
    header('Access-Control-Allow-Origin: https://chotapandit.com');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
    header("Content-Type: application/json; charset=UTF-8");
    require_once "dbinfo.php";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT name, score FROM score ORDER BY score DESC LIMIT 10");
    $stmt->execute();
    $products = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $p  = array(
                  "name" => $name,
                  "score" => $score
                  );
            array_push($products, $p);
    }
    http_response_code(200);
    echo json_encode($products);
}
// else{
    // echo "LOL";
// }
?>