<?php
require 'includes/config.php';
$conn = getConn($host, $db_name, $user, $password); 

if($conn){

    try{
        if(isset($_POST['submit'])){

            $task = $_POST['mytask'];
            $status = $_POST['status'];

        // Validating the input. 
            if(!empty($task) && !empty($status)){

                $sql = "INSERT INTO todos (title, status) VALUES (:title, :status)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':title', $task);
                $stmt->bindParam(':status', $status);

                if ($stmt->execute()){
                    echo "Data inserted successfully";
                    header("location:tasks.php");
                } else {
                    die("An error occurred");
                }

            } else {
                echo "Please input both task and status";
            }
        
        }
        } catch(Exception $e) {

        echo "An error occurred". '<br>'. $e->getMessage();
}
}