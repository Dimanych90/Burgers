<?php

//$host = '127.0.0.1';
//
//$mysqli = new mysqli('localhost', 'root', 'root', 'test_db', 3306);
//
////if ($mysqli == 0) {
////    echo 'Соединение отсутвует';
////} else {
////    echo 'Все ок';
////}
//echo '<br>';
//$ret = $mysqli->query("SELECT * FROM first_table");
//$data = $ret->fetch_all();
//echo 'affected_rows: ' . $mysqli->affected_rows . '<pre>';
//echo 'Result: <pre> ' . print_r($data, 1) . '</pre>>';

try {
    $pdo = new PDO('mysql:host=localhost;dbname=test_db', 'root', 'root');
} catch (PDOException $e) {
    echo $e->getMessage();
    die;
}
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('ignore_repeated_errors', 0);
$email = $_POST['email'];
if ($email) {
    $ret = $pdo->query("SELECT * FROM first_table WHERE `email`= '$email'");

    $user = $ret->fetchAll(PDO::FETCH_ASSOC);
//    echo 'Здравствуйте,' . '<pre>' . print_r($user, 1) . '</pre>';
//    die;
}


$name = $_POST['name'];
if ($name) {
    $ret = $pdo->query("SELECT * FROM first_table WHERE `name` = '$name'");

    $user = $ret->fetchAll(PDO::FETCH_ASSOC);

    echo 'Здравствуйте,' . '<pre>' . print_r($user, 1) . '</pre>';
    //die;
}

$phone = $_POST['phone'];
if ($phone) {
    $ret = $pdo->query("SELECT * FROM first_table WHERE `phone` = '$phone'");

    $user = $ret->fetchAll(PDO::FETCH_ASSOC);
//    echo 'Здравствуйте,' . '<pre>' . print_r($user, 1) . '</pre>';
//    die;
}

$street = $_POST['street'];
$home = $_POST['home'];
$part = $_POST['part'];
$appt = $_POST['appt'];
$floor = $_POST['floor'];
$comment = $_POST['comment'];
//$payment = $_POST['payment'];
//$callback = $_POST['callback'];


$ret = $pdo->query("INSERT INTO adress(`street`, `building`, `build`,`flat`, `floor`, `comment`)
 VALUES ('$street', '$home', '$part','$appt', '$floor','$comment')");
$user = $ret->fetchAll(PDO::FETCH_ASSOC);
if ($ret == true) {
    echo "Информация занесена в базу данных";
} else {
    echo "Информация не занесена в базу данных";
}
$id = $_POST['id'];
$ret = $pdo->query("SELECT * FROM first_table JOIN adress ON id='id'");
$name = $ret->fetchAll(PDO::FETCH_ASSOC);
file_put_contents('orders.txt',$name);
