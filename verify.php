<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);
    $code = trim($_POST["code"]);

    // ✅ تحقق من وجود المستخدم
    $stmt = $conn->prepare("SELECT reset_code, reset_expires FROM users WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // تحقق من الكود وصلاحيته
        if ($row['reset_code'] == $code && strtotime($row['reset_expires']) > time()) {
            echo "verified"; // ✅ الكود صحيح
        } else {
            echo "invalid"; // ❌ كود خطأ أو منتهي
        }
    } else {
        echo "not_found"; // ❌ البريد غير موجود
    }
}
?>
