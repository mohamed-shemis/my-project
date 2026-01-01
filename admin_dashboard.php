<?php
session_start();

// 🔒 التحقق من أن الأدمن مسجل دخول
if (empty($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit();
}

require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['unit_id'])) {
    $unit_id = $_POST['unit_id'];
    $upload_errors = [];

    // 🟣 رفع عقد PDF
    if (!empty($_FILES['contract_pdf']['name'])) {
        $upload_dir = 'uploads/contracts/';
        if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);
        $file_name = time() . '_' . basename($_FILES['contract_pdf']['name']);
        $target_file = $upload_dir . $file_name;
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if ($file_type === 'pdf') {
            move_uploaded_file($_FILES['contract_pdf']['tmp_name'], $target_file);
            $pdo->prepare("UPDATE units SET contract_pdf = ? WHERE id = ?")->execute([$target_file, $unit_id]);
        } else {
            $upload_errors[] = "❌ العقد يجب أن يكون ملف PDF فقط.";
        }
    }

    // 🟢 رفع صورة المشروع
    if (!empty($_FILES['project_image']['name'])) {
        $upload_dir = 'uploads/images/';
        if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);
        $file_name = time() . '_' . basename($_FILES['project_image']['name']);
        $target_file = $upload_dir . $file_name;
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($file_type, ['jpg', 'jpeg', 'png', 'webp'])) {
            move_uploaded_file($_FILES['project_image']['tmp_name'], $target_file);
            $pdo->prepare("UPDATE units SET project_image = ? WHERE id = ?")->execute([$target_file, $unit_id]);
        } else {
            $upload_errors[] = "❌ الصورة يجب أن تكون بصيغة JPG أو PNG أو WEBP.";
        }
    }

    // 🟡 رفع فيديو قصير
    if (!empty($_FILES['project_video']['name'])) {
        $upload_dir = 'uploads/videos/';
        if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);
        $file_name = time() . '_' . basename($_FILES['project_video']['name']);
        $target_file = $upload_dir . $file_name;
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($file_type, ['mp4', 'mov', 'avi'])) {
            move_uploaded_file($_FILES['project_video']['tmp_name'], $target_file);
            $pdo->prepare("UPDATE units SET project_video = ? WHERE id = ?")->execute([$target_file, $unit_id]);
        } else {
            $upload_errors[] = "❌ الفيديو يجب أن يكون بصيغة MP4 أو MOV أو AVI.";
        }
    }

    if (empty($upload_errors)) {
        echo "<p style='color:green;'>✅ تم رفع الملفات بنجاح للوحدة رقم {$unit_id}</p>";
    } else {
        foreach ($upload_errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>📁 إدارة ملفات الوحدة</title>
<style>
body { font-family: Tahoma; text-align: center; margin-top: 50px; background: #f9fafb; }
form { background: white; display: inline-block; padding: 30px 50px; border-radius: 15px; box-shadow: 0 0 15px rgba(0,0,0,0.1); }
input[type="file"], input[type="number"] { margin: 10px; }
button { background: #007bff; color: white; padding: 10px 25px; border: none; border-radius: 10px; cursor: pointer; }
button:hover { background: #0056b3; }
.logout-btn { background: #ef4444; margin-top: 15px; }
.logout-btn:hover { background: #dc2626; }
</style>
</head>
<body>
    <h2>👨‍💼 لوحة التحكم - رفع ملفات الوحدات</h2>
    <p>مرحبًا بك يا <strong><?= htmlspecialchars($_SESSION['admin_name']) ?></strong></p>

    <form action="" method="POST" enctype="multipart/form-data">
        <label>🔢 رقم الوحدة (ID):</label><br>
        <input type="number" name="unit_id" required><br><br>

        <label>📄 عقد الوحدة (PDF):</label><br>
        <input type="file" name="contract_pdf" accept="application/pdf"><br><br>

        <label>🖼️ صورة المشروع:</label><br>
        <input type="file" name="project_image" accept="image/*"><br><br>

        <label>🎥 فيديو المشروع:</label><br>
        <input type="file" name="project_video" accept="video/*"><br><br>

        <button type="submit">رفع الملفات</button>
    </form>

    <form method="POST" action="logout.php">
        <button class="logout-btn" type="submit">تسجيل الخروج</button>
    </form>
</body>
</html>
