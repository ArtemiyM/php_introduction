<?php

global $pdo;
$pdo = new \PDO(
    'mysql:host=localhost;dbname=Lab3',
    "root",
    "1234"
);

if(isset($_GET["category"])){
    $category = htmlspecialchars($_GET["category"]);
    $res = $pdo->query("select * from Photo where Category = '$category'");
}else{
    $res = $pdo->query('select * from Photo;');
}

$Photos = [];
while($photo = $res->fetch()){
    $Photos[] = $photo;
}


function getPhoto($id){

    global $pdo;
    $res = $pdo->query("select * from Photo where id = $id;");
    // var_dump($res->fetch());
    return $res->fetch();
}


function savePhoto($Photo_link,$Category,){
    global $pdo;

    $sqlString = "INSERT INTO Photo (user_id,Photo_link,Category) VALUES ('1','$Photo_link','$Category')";

    return $pdo->exec($sqlString);
}

function deletePhoto($id){
    global $pdo;

    $sqlString = "DELETE FROM Photo WHERE id = '$id'";

    return $pdo->exec($sqlString);
}