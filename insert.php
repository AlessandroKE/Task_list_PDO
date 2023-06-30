<?php

// calling the database

require('includes/config.php');

$title = "PHP Server_2022";
$body = "Alessandro is a computer Guru";
$conn = getConn($host, $db_name, $user, $password);

// Query statement


$sql = "INSERT INTO post (title, body) VALUES (:title, :body)";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':body', $body);

if ($stmt->execute()){
    echo "Data inserted successfully";
}else{
    die("An error occurred");
}

?> 