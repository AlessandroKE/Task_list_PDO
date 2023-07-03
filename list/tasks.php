<?php
require 'includes/config.php';
$conn = getConn($host, $db_name, $user, $password); 

if($conn){
    try {
        // Prepare and execute the SQL query
        $stmt = $conn->prepare("SELECT * FROM todos");
        $stmt->execute();

        // Fetch all tasks from the result
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Query failed: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Task List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php if(isset($tasks) && count($tasks) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Date Created</th>
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>
                <?php foreach($tasks as $task): ?>
                    <tr>
                        <td><?php echo $task['id']; ?></td>
                        <td><?php echo $task['title']; ?></td>
                        <td><?php echo $task['status']; ?></td>
                        <td><?php echo $task['created_at']; ?></td>
                        <td> <button type="submit" class="btn btn-primary" name = "submit"><a href="delete.php?id=<?php echo $task['id']; ?>" class="btn btn-primary">Delete</a></button></td>
                        <td> <button type="submit" class="btn btn-primary" name = "submit"><a href="update.php?id=<?php echo $task['id']; ?>" class="btn btn-primary">update</a></button></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No tasks found.</p>
    <?php endif; ?>

    <a href="Form.html">Add a new task</a>
</body>
</html>
