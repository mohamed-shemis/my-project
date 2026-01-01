<?php
include 'connect.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);

    if (empty($email)) {
        echo "empty_email";
        exit;
    }

    // ✅ تحقق أن البريد موجود في قاعدة البيانات
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "not_found";
        exit;
    }

    // ✅ توليد كود إعادة تعيين
    $reset_code = rand(100000, 999999);
    $expires = date("Y-m-d H:i:s", strtotime("+15 minutes"));

    // ✅ حفظ الكود في قاعدة البيانات
    $update = $conn->prepare("UPDATE users SET reset_code = ?, reset_expires = ? WHERE email = ?");
    $update->bind_param("sss", $reset_code, $expires, $email);
    $update->execute();

    // ✅ إرسال البريد الإلكتروني
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mohamedshemis348@gmail.com';
        $mail->Password = 'uymz npop yvvx gchl'; // كود تطبيق Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';

        $mail->setFrom('mohamedshemis348@gmail.com', 'El Amar Group');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = '🔐 إعادة تعيين كلمة المرور';
        $mail->Body = "
            <div style='font-family:Tahoma; direction:rtl;'>
                <h3>مرحبًا!</h3>
                <p>كود إعادة تعيين كلمة المرور الخاص بك هو:</p>
                <h2 style='color:#007bff;'>$reset_code</h2>
                <p>الكود صالح لمدة <strong>15 دقيقة</strong> فقط.</p>
            </div>
        ";

        // ✅ لو تم الإرسال بنجاح، نرجع "sent" عشان الجافاسكربت يفهم
        if ($mail->send()) {
            echo "sent";
            exit;
        } else {
            echo "error_send";
            exit;
        }

    } catch (Exception $e) {
        echo "error_mailer";
        exit;
    }
}
?>
