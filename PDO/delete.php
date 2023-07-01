<?php

require 'includes/config.php';
$id = 38505560;
$conn = getConn($host, $db_name, $user, $password);

$sql = "DELETE FROM post WHERE id = :id";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':id', $id);

if($stmt->execute()){
die("Deleted successfully");
}
else{
echo "Failed to delete";
}
    

