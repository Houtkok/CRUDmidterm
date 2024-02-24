<?php
require_once 'database.php';
require_once 'user-repository.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $userRepository = new UserRepository($con);
    $success = $userRepository->delete($id);
    if ($success) {
        header("Location: admin_table.php");
        exit();
    } else {
        echo "Delete failed";
    }
} else {
    echo "Invalid request!";
}
?>