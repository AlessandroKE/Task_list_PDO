<?php

require 'includes/config.php';
//$sandro = getConn($host, $db_name, $user, $password); 
$conn = getConn($host, $db_name, $user, $password);

if ($sandro) {
    try {
        // Prepare and execute the SQL query
        $stmt = $conn->prepare("SELECT title FROM post");
        $stmt->execute();

        // Fetch the title from the result
        $title = $stmt->fetchColumn();

        // Output the fetched title
        echo "Fetched Title: " . $title;
    } catch (PDOException $e) {
        echo "Query failed: " . $e->getMessage();
    }
}