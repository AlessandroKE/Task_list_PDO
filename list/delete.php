<?php

require 'includes/config.php';
$conn = getConn($host, $db_name, $user, $password); 

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM todos WHERE id = :id";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':id', $id);

if($stmt->execute()){
header("location: tasks.php");
}
else{
echo "Failed to delete";
}
    
}