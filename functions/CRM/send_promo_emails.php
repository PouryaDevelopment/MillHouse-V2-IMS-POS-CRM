<?php
require_once('../index/connection2data.php');
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';
    $recipients = $_POST['recipients'] ?? [];

    try {
        // the server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = ':)';
        $mail->Password = ':)'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // the sender
        $mail->setFrom('millhousecafetester@gmail.com', 'Mill House Cafe');

        // recipients mechanics
        if (in_array('all', $recipients)) {
            // fetchs all emails from the promolist table
            $stmt = $connection->query("SELECT email FROM promolist");
            $allRecipients = $stmt->fetchAll(PDO::FETCH_COLUMN);
            
            foreach ($allRecipients as $email) {
                $mail->addBCC($email);
            }
        } else {
            // adds an individual recipient
            foreach ($recipients as $email) {
                $mail->addAddress($email);
            }
        }

        // content of email
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        // redirects

        if ($mail->send()) {
            echo 'Messages have been sent';
             header('Location: ../../CRM-mail.php?message=success');
        } else {
            echo "Messages could not be sent. mailererror: {$mail->ErrorInfo}";
            header('Location: ../../CRM-mail.php?message=emailfail');
        }
    } catch (Exception $e) {
        echo "Message could not be sent. mailererror: {$mail->ErrorInfo}";
        header('Location: ../../CRM-mail.php?message=emailfail');
    } 
}
