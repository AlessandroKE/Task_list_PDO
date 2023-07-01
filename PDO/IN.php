<?php

require 'includes/config.php';


$conn = getConn($host, $db_name, $user, $password);

if ($conn) 
{

   // IN KEYWORD

   //The IN keyword is used in SQL queries to specify multiple values for a condition in the WHERE clause
   //It allows you to retrieve rows that match any of the specified values.

   $sql = "SELECT * FROM users WHERE id IN (15,16,17, 18, 1)";

   $stmt = $conn->prepare($sql);
   //$stmt->bindParam(':pattern', $pattern);
   $stmt->execute();


 }else{

 }