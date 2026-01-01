<?php
session_start();

// حذف جميع بيانات الجلسة
session_unset();
session_destroy();

// إعادة التوجيه إلى الصفحة الرئيسية
header("Location: index.html");
exit;
?>
