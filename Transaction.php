<?php
    require 'includes/config.php';

    // Performing Transactions, commits, and rollbacks:
    $conn = getConn($host, $db_name, $user, $password);

    if ($conn) {
        try {
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // BEGIN TRANSACTION
            $conn->beginTransaction();
            $sql1 = "INSERT INTO post (title, body) VALUES (:title, :body)";
            $stmt1 = $conn->prepare($sql1);

            //Pass variables instead of literals as arguments to bindParam()
            $title1 = 'JavaScript';
            $body1 = 'I love JavaScript';
            $stmt1->bindParam(':title', $title1);
            $stmt1->bindParam(':body', $body1);
            $stmt1->execute();

            $sql2 = "INSERT INTO post (title, body) VALUES (:title, :body)";
            $stmt2 = $conn->prepare($sql2);
            $title2 = 'php';
            $body2 = 'best scripting language';
            $stmt2->bindParam(':title', $title2);
            $stmt2->bindParam(':body', $body2);
            $stmt2->execute();

            // CHECKING WHETHER ALL OPERATIONS COMPLETED SUCCESSFULLY
            // COMMIT TRANSACTION
            if ($stmt1->rowCount() > 0 && $stmt2->rowCount() > 0) {
                $conn->commit();
                echo "Transaction Successful";
            } else {
                $conn->rollback();
                echo "Transaction Failed";
            }
        } catch (PDOException $e) {
            $conn->rollback();
            echo "Transaction failed: " . $e->getMessage();
        }
    }
?>
