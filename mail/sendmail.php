<?php
    if(!isset($typeUser) || $typeUser == 0) {
        include PATH_ROOT_APP."/mail/PHPMailer/src/PHPMailer.php";
        include PATH_ROOT_APP."/mail/PHPMailer/src/Exception.php";
        include PATH_ROOT_APP."/mail/PHPMailer/src/SMTP.php";
    } else if($typeUser == 1) {
        include_once PATH_ROOT."/mail/PHPMailer/src/PHPMailer.php";
        include_once PATH_ROOT."/mail/PHPMailer/src/Exception.php";
        include_once PATH_ROOT."/mail/PHPMailer/src/SMTP.php";
    }
   
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
    
    //Load Composer's autoloader
    
    //Create an instance; passing `true` enables exceptions
                           // Passing `true` enables exceptions
  function sendmail($title, $message, $email, $username, $addReplyTo) {
      try {
            // $emailToSend = 'dotescoautoservice@gmail.com';
            // $password = 'wotfmypipufttjgi';
            $emailToSend = 'letankim2810@gmail.com';
            $password = 'qpgxowptqcndgmvt';
            $name = 'CÔNG TY TNHH DỊCH VỤ KỸ THUẬT DOTESCO';
          //Server settings
          $mail = new PHPMailer(true);
          $mail->CharSet = "UTF-8";   
          $mail->SMTPDebug = 0;                                 // Enable verbose debug output
          $mail->isSMTP();                                      // Set mailer to use SMTP
          $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
          $mail->SMTPAuth = true;                               // Enable SMTP authentication
          $mail->Username = $emailToSend;                 // SMTP username
          $mail->Password = $password;                               // SMTP password
          $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
          $mail->Port = 587;                                    // TCP port to connect to
        
          //Recipients
          $mail->setFrom($emailToSend, $name);
          if($addReplyTo != "") {
            $mail->addReplyTo($addReplyTo, $name);
          }
          $mail->addAddress($email, $username);     // Add a recipient
        
          //Content
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = $title;
          // $mail->Body    = "$message ".$emailUser." ".$phone."";
          // biến gửi đi
          $mail->Body = $message;
          $mail->send();
          return true;
      } catch (Exception $e) {
          return false;
      }
  }
?>