<?php

require 'includes/config.php';

$conn = getConn($host, $db_name, $user, $password);

$pattern = '%'. 'Alessandro' .'%';

if($conn){
    // like key word:

    $sql = "SELECT * FROM post WHERE body LIKE :pattern";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':pattern', $pattern);
    $stmt->execute();

    print_r ($stmt->fetchAll(PDO::FETCH_ASSOC));
}