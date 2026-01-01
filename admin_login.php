<?php
session_start();
include 'db_connect.php'; // الاتصال بقاعدة البيانات

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // التحقق من وجود المدير في قاعدة البيانات
    $stmt = $pdo->prepare("SELECT id, name, email, password_hash FROM admins WHERE email = ? LIMIT 1");
    $stmt->execute([$email]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin && password_verify($password, $admin['password_hash'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_name'] = $admin['name'];
        header("Location: admin_dashboard.php");
        exit;
    } else {
        $message = "❌ البريد الإلكتروني أو كلمة المرور غير صحيحة";
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>تسجيل دخول المدير</title>
<style>
body {
    font-family: Tahoma;
    text-align: center;
    background-color: #f4f4f4;
    margin-top: 100px;
}
form {
    background: #fff;
    display: inline-block;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 10px #ccc;
    width: 320px;
}
input {
    margin: 10px 0;
    padding: 8px;
    width: 90%;
    border: 1px solid #ccc;
    border-radius: 5px;
}
button {
    padding: 8px 20px;
    background: #007BFF;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
button:hover {
    background: #0056b3;
}
.message {
    color: red;
    margin-bottom: 15px;
}
</style>
</head>
<body>

<h2>تسجيل دخول المدير</h2>

<?php if ($message): ?>
    <div class="message"><?= $message ?></div>
<?php endif; ?>

<form method="POST" action="" autocomplete="off">
    <input type="email" name="email" placeholder="البريد الإلكتروني" required><br>
    <input type="password" name="password" placeholder="كلمة المرور" required><br>
    <button type="submit">دخول</button>
</form>

</body>
</html>
