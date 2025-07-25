<?php

$start1 = date('d-m-Y', strtotime('last monday'));
$end1 = date('d-m-Y', strtotime('saturday this week'));

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject = "Weekly Discipline Report from '$start1' to '$end1'";
    $body = "Current week Discipline report of M.Kumarasamy college of Engineering By TIH.";
    $attachment = $_FILES["attachment"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "discipline";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch all emails from the database
    $sql = "SELECT id FROM email";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Create a PHPMailer instance
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;  // Set to DEBUG_SERVER for debugging
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'tssakthi02@gmail.com'; // Replace with your Gmail
            $mail->Password   = 'zkajpocfnuznirci'; // Use an app password for Gmail
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Sender
            $mail->setFrom('tssakthi02@gmail.com', 'Sakthi');

            // Attach file
            if ($attachment['error'] == UPLOAD_ERR_OK) {
                $mail->addAttachment($attachment['tmp_name'], $attachment['name']);
            }

            // Email content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = nl2br($body);
            $mail->AltBody = strip_tags($body);

            // Send email to each recipient
            while ($row = $result->fetch_assoc()) {
                $mail->addAddress($row['id']);
                $mail->send();
                $mail->clearAddresses();
            }

            echo 'Message has been sent successfully!';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "No recipients found.";
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
