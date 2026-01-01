<?php
include 'connect.php';
$message = "";
$step = 1; // 1 = إدخال الكود، 2 = إدخال كلمة مرور جديدة

// ✅ التأكد من وجود الإيميل (إما من الرابط أو من POST)
if (isset($_GET['email'])) {
    $email = $_GET['email'];
} elseif (isset($_POST['email'])) {
    $email = $_POST['email'];
} else {
    header("Location: forgot_password.php");
    exit;
}

// ✅ الخطوة الأولى: التحقق من الكود
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['verify_code'])) {
    $code = trim($_POST['code']);
    $stmt = $conn->prepare("SELECT reset_code, reset_expires FROM users WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        if ($row['reset_code'] == $code && strtotime($row['reset_expires']) > time()) {
            $step = 2; // ✅ الكود صحيح والمدة صالحة
        } else {
            $message = "<div class='alert error'>❌ الكود غير صحيح أو انتهت صلاحيته.</div>";
        }
    } else {
        $message = "<div class='alert error'>❌ البريد الإلكتروني غير موجود.</div>";
    }
}

// ✅ الخطوة الثانية: تحديث كلمة المرور
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['save_password'])) {
    $new_pass = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
    $update = $conn->prepare("UPDATE users SET password_hash = ?, reset_code = NULL, reset_expires = NULL WHERE email = ?");
    $update->bind_param("ss", $new_pass, $email);
    if ($update->execute()) {
        $message = "<div class='alert success'>✅ تم تعيين كلمة المرور الجديدة بنجاح. سيتم تحويلك لتسجيل الدخول خلال ثوانٍ...</div>";
        $step = 3;
        echo "<meta http-equiv='refresh' content='3;url=customer.html'>";
    } else {
        $message = "<div class='alert error'>❌ حدث خطأ أثناء حفظ كلمة المرور.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>إعادة تعيين كلمة المرور | El Amar Group</title>
<style>
body {
    font-family: 'Noto Kufi Arabic', sans-serif;
    background: url('assets/imgs/bg.jpg') center/cover no-repeat fixed;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}
.box {
    background: rgba(255,255,255,0.95);
    padding: 30px;
    border-radius: 16px;
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
    width: 400px;
    text-align: center;
}
input {
    width: 90%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 8px;
}
button {
    width: 95%;
    padding: 10px;
    background: #007bff;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 18px;
    cursor: pointer;
}
button:hover {
    background: #0056b3;
}
.alert {
    margin-top: 15px;
    padding: 10px;
    border-radius: 8px;
    font-weight: bold;
}
.alert.success {
    background-color: #d4edda;
    color: #155724;
}
.alert.error {
    background-color: #f8d7da;
    color: #721c24;
}
a {
    text-decoration: none;
    color: #007bff;
    display: inline-block;
    margin-top: 10px;
}
</style>
</head>
<body>
<div class="box">

    <?php if ($step == 1): ?>
        <h2>🔢 إدخال كود التحقق</h2>
        <p>تم إرسال كود إلى بريدك الإلكتروني:</p>
        <strong><?= htmlspecialchars($email) ?></strong>
        <form method="POST">
            <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
            <input type="text" name="code" placeholder="أدخل الكود المكون من 6 أرقام" required>
            <button type="submit" name="verify_code">تحقق من الكود</button>
        </form>

    <?php elseif ($step == 2): ?>
        <h2>🔒 تعيين كلمة مرور جديدة</h2>
        <form method="POST">
            <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
            <input type="password" name="new_password" placeholder="كلمة المرور الجديدة" required>
            <button type="submit" name="save_password">حفظ كلمة المرور</button>
        </form>

    <?php else: ?>
        <h2>✅ تمت إعادة التعيين بنجاح!</h2>
        <a href="customer.html">🔙 العودة لتسجيل الدخول</a>
    <?php endif; ?>

    <div class="msg"><?= $message ?></div>
</div>
</body>
</html>
