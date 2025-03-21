<?php
session_start();
include_once('../../config/config.php');
include_once('auth.php');
$conn = getDBConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['content']) && !empty($_POST['content'])) {
    if (checkIfLoggedIn()) {
        $content = $_POST['content'];
        $user_id = $_SESSION['user_id'];
        
        $stmt = $conn->prepare("INSERT INTO posts (user_id, content, created_at) VALUES (?, ?, NOW())");
        $stmt->bind_param("is", $user_id, $content);
        
        if ($stmt->execute()) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            echo json_encode(['message' => 'Error creating post']);
        }

        $stmt->close();
    } else {
        echo json_encode(['message' => 'User not logged in']);
    }
    exit;
} else {
    header("Location: " . $_SERVER['HTTP_REFERER']);
    echo json_encode(['message' => 'Error creating post']);
}
?>
