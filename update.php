<?php

require ('includes/config.php');

//UPDATED VARIABLES

$new_title = "JavaScript(Big Language):";
$new_body = 'JavaScript is a popular programming language primarily used for web development. It allows for dynamic and interactive elements on webpages, enhancing user experience. JavaScript is executed on the client-side, enabling manipulation of webpage content, handling events, and making asynchronous requests. It supports object-oriented programming and offers a wide range of functionalities through built-in functions and libraries, making it versatile for various applications beyond web development.';
$id = 38505559;

$conn = getConn($host, $db_name, $user, $password);

$sql = "UPDATE post SET title = :title, body = :body where id = :id";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':id', $id);
$stmt->bindParam(':title', $new_title);
$stmt->bindParam(':body', $new_body);

if ($stmt->execute()){
    die('Data updated successfully');

}else{
echo"An error occured while updating the data";
}

