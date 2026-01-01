<?php
session_start();
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    // التحقق من الإدخال
    if (empty($name) || empty($email) || empty($password)) {
        echo "error";
        exit;
    }

    try {
        // فحص البريد الإلكتروني
        $check = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $check->execute([$email]);

        if ($check->fetch()) {
            echo "exists"; // البريد مستخدم من قبل
            exit;
        }

        // تشفير كلمة المرور
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // إدخال المستخدم الجديد
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password_hash) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $hash]);

        echo "success"; // تم إنشاء الحساب بنجاح
        exit;

    } catch (Exception $e) {
        echo "error"; // في حالة خطأ غير متوقع
        exit;
    }
}
?>
