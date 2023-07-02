<?php
require 'includes/config.php';
$conn = getConn($host, $db_name, $user, $password); 

if($conn){

    try{

        // Validating the input. 
            if(!empty($task) && !empty($status)){

                $sql = "INSERT INTO todos (title, status) VALUES (:title, :status)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':title', $task);
                $stmt->bindParam(':status', $status);

                if ($stmt->execute()){
                    echo "Data inserted successfully";
                } else {
                    die("An error occurred");
                }

            } else {
                echo "Please enter both task and status";
            }

        } catch(Exception $e) {

        echo "An error occurred". '<br>'. $e->getMessage();




    }catch(Exception $e){

        echo "An error occurred". '<br>'. $e->getMessage();

    }
}