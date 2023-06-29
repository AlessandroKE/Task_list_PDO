<?php

require 'includes/config.php';
$sandro = getConn($host, $db_name, $user, $password); 
//$conn = getConn($host, $db_name, $user, $password);

if ($sandro) {
    try {
        // Prepare and execute the SQL query
        $stmt = $sandro->prepare("SELECT * FROM post");
        $stmt->execute();

        // Fetch the title from the result
        //$title = $stmt->fetchColumn();
        //Fetch all titles from the result using fetchAll()
        $titles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Output the fetched title
        // using the for each loop to collect title in a  database
        foreach($titles as $title){
            print_r ($title);
        //echo "</br> Fetched Title: $title </br>";
        }
    } catch (PDOException $e) {
        echo "Query failed: " . $e->getMessage();
    }
}