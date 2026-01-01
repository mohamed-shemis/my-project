<?php
session_start();
require 'db_connect.php';

// التأكد من أن العميل مسجل دخول 🔒
if (empty($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

// 🧩 جلب بيانات العميل من جدول users
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT name, email, PHONE AS phone FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// 🏠 جلب بيانات الوحدات الخاصة بالعميل من جدول units
$unitsStmt = $pdo->prepare("SELECT project_name, unit_number, price, status, contract_pdf FROM units WHERE user_id = ?");
$unitsStmt->execute([$user_id]);
$units = $unitsStmt->fetchAll(PDO::FETCH_ASSOC);

// 🎥 رابط الفيديو
$video_link = "assetsvid/video shors.mp4";
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ملاك وحدات مشروع شورز</title>

<style>
body {
  margin: 0;
  font-family: "Noto Kufi Arabic", Tahoma, Arial, sans-serif;
  background: url('assetsimgs/687565a1f3f26B-03.jpg.jpg') no-repeat center center fixed;
  background-size: cover;
  color: #333;
}

.header {
  background-color: rgba(79, 70, 229, 0.9);
  color: white;
  padding: 20px;
  text-align: center;
  font-size: 22px;
  font-weight: 700;
  letter-spacing: 1px;
  border-bottom: 4px solid #4338ca;
}

.container {
  max-width: 1000px;
  margin: 40px auto;
  background: rgba(255,255,255,0.95);
  border-radius: 20px;
  box-shadow: 0 4px 20px rgba(0,0,0,0.1);
  overflow: hidden;
  padding-bottom: 20px;
}

.logout {
  position: absolute;
  top: 20px;
  left: 20px;
}
.logout button {
  background: #ef4444;
  border: none;
  color: white;
  padding: 8px 16px;
  border-radius: 6px;
  cursor: pointer;
  font-weight: bold;
}
.logout button:hover { background: #dc2626; }

.user-info {
  padding: 25px;
  background: #f3f4ff;
  border-bottom: 2px solid #e5e7eb;
}
.user-info p {
  margin: 8px 0;
  font-size: 16px;
}
.user-info strong {
  color: #111827;
}

table {
  width: 90%;
  margin: 20px auto;
  border-collapse: collapse;
}
th, td {
  border-bottom: 1px solid #ddd;
  text-align: center;
  padding: 12px;
}
th {
  background-color: #4f46e5;
  color: white;
}
tr:hover { background: #f9fafc; }

.btn-download {
  background-color: #10b981;
  color: white;
  padding: 8px 12px;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  font-weight: 600;
  text-decoration: none;
}
.btn-download:hover { background-color: #059669; }

video {
  width: 120%;
  max-width: 960px;
  display: block;
  margin: 18px auto;
  border-radius: 10px;
  box-shadow: 0 3px 10px rgba(0,0,0,0.2);
}

.footer {
  text-align: center;
  padding: 15px;
  background: rgba(79, 70, 229, 0.9);
  color: white;
  font-size: 14px;
  margin-top: 30px;
}
</style>
</head>

<body>

<div class="header">
    ملاك وحدات مشروع شورز
  <div class="logout">
    <form method="POST" action="logout.php">
      <button type="submit">تسجيل الخروج</button>
    </form>
  </div>
</div>

<div class="container">

  <!-- 🎥 الفيديو -->
  <video controls>
    <source src="<?= htmlspecialchars($video_link) ?>" type="video/mp4">
    متصفحك لا يدعم عرض الفيديو.
  </video>

  <!-- 👤 معلومات العميل -->
  <div class="user-info">
    <h2>مرحبًا، <?= htmlspecialchars($user['name']) ?> 👋</h2>
    <p><strong>الاسم:</strong> <?= htmlspecialchars($user['name']) ?></p>
    <p><strong>البريد الإلكتروني:</strong> <?= htmlspecialchars($user['email']) ?></p>
    <p><strong>رقم الهاتف:</strong> <?= htmlspecialchars($user['phone'] ?? '—') ?></p>
  </div>

  <!-- 🏠 جدول الوحدات -->
  <div class="units">
    <h2 style="text-align:center; margin-top:20px;">وحداتك المسجلة</h2>

    <?php if (count($units) > 0): ?>
      <table>
        <tr>
          <th>اسم المشروع</th>
          <th>رقم الوحدة</th>
          <th>السعر</th>
          <th>الحالة</th>
          <th>العقد</th>
        </tr>
        <?php foreach ($units as $unit): ?>
          <tr>
            <td><?= htmlspecialchars($unit['project_name']) ?></td>
            <td><?= htmlspecialchars($unit['unit_number']) ?></td>
            <td><?= htmlspecialchars($unit['price'] ?? '—') ?></td>
            <td><?= htmlspecialchars($unit['status'] ?? '—') ?></td>
            <td>
              <?php if (!empty($unit['contract_pdf'])): ?>
                <a class="btn-download" href="<?= htmlspecialchars($unit['contract_pdf']) ?>" target="_blank">تحميل العقد</a>
              <?php else: ?>
                لا يوجد
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    <?php else: ?>
      <p style="text-align:center;">🚫 لا توجد وحدات مرتبطة بحسابك حاليًا.</p>
    <?php endif; ?>
  </div>
</div>

<div class="footer">
  &copy; <?= date("Y") ?> العمار جروب - جميع الحقوق محفوظة
</div>

</body>
</html>
