<?php

require ('includes/config.php');
$conn = getConn($host, $db_name, $user, $password);

$stmt = $conn->prepare("SELECT * FROM post");
       // $stmt->execute();
 
if($stmt->execute()){
    $stmt ->rowCount(); 

    //print_r($stmt->rowCount());

    if($stmt->rowCount() > 0){
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo $row ['body'] . "<br>";
    }
}
    else{

        echo "No results yet";

    }
}

