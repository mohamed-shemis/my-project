<?php
include 'db_connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['unit_id'])) {
    $unit_id = intval($_POST['unit_id']);

    // المجلدات
    $pdfDir = "uploads/contracts/";
    $imgDir = "uploads/images/";
    $vidDir = "uploads/videos/";

    $pdfPath = null;
    $imgPath = null;
    $vidPath = null;

    // رفع PDF
    if (!empty($_FILES['contract_pdf']['name'])) {
        $pdfName = uniqid() . "_" . basename($_FILES['contract_pdf']['name']);
        $targetFile = $pdfDir . $pdfName;
        if (move_uploaded_file($_FILES["contract_pdf"]["tmp_name"], $targetFile)) {
            $pdfPath = $targetFile;
        }
    }

    // رفع صورة
    if (!empty($_FILES['project_image']['name'])) {
        $imgName = uniqid() . "_" . basename($_FILES['project_image']['name']);
        $targetFile = $imgDir . $imgName;
        if (move_uploaded_file($_FILES["project_image"]["tmp_name"], $targetFile)) {
            $imgPath = $targetFile;
        }
    }

    // رفع فيديو
    if (!empty($_FILES['project_video']['name'])) {
        $vidName = uniqid() . "_" . basename($_FILES['project_video']['name']);
        $targetFile = $vidDir . $vidName;
        if (move_uploaded_file($_FILES["project_video"]["tmp_name"], $targetFile)) {
            $vidPath = $targetFile;
        }
    }

    // تحديث قاعدة البيانات
    $stmt = $conn->prepare("UPDATE units SET contract_pdf=?, project_image=?, project_video=? WHERE id=?");
    $stmt->bind_param("sssi", $pdfPath, $imgPath, $vidPath, $unit_id);
    $stmt->execute();

    echo "<script>alert('تم رفع الملفات بنجاح!'); window.location='upload_contract.php';</script>";
} else {
    echo "طلب غير صالح.";
}
?>
