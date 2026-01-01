<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $code = trim($_POST['code']);

    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? AND activation_code = ? AND is_active = 0 LIMIT 1");
    $stmt->bind_param("ss", $email, $code);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        $user = $res->fetch_assoc();
        $update = $conn->prepare("UPDATE users SET is_active = 1, activation_code = NULL WHERE id = ?");
        $update->bind_param("i", $user['id']);
        $update->execute();
        echo "activated";
    } else {
        echo "invalid";
    }
}
?>
