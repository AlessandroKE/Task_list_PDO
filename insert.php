<?php

// calling the database

require('includes/config.php');

$title = "PHP Server";
$body = "A PHP server is a computer or software that runs PHP scripts, processes them, and generates HTML responses to be sent to clients. It interprets PHP code, accesses databases, handles HTTP requests, and delivers dynamic web content. It provides the necessary environment to execute PHP applications, making them accessible over the web and enabling the creation of interactive and data-driven websites and web applications.";

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