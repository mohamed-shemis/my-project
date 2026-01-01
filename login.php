<?php
session_start();
require 'db_connect.php';

// استقبال البيانات
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if (empty($email) || empty($password)) {
    exit("error"); // بيانات ناقصة
}

// التحقق من وجود المستخدم
$stmt = $pdo->prepare("SELECT id, name, password_hash FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    exit("not_found"); // البريد غير مسجل
}

// التحقق من كلمة المرور
if (!password_verify($password, $user['password_hash'])) {
    exit("wrong_password"); // كلمة المرور خطأ
}

// ✅ نجاح تسجيل الدخول
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];

exit("success");
?>
