<?php
  require 'phpmailer/src/Exception.php';
  require 'phpmailer/src/PHPMailer.php';
  require 'phpmailer/src/SMTP.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // access
        $secretKey = '6LdjV28UAAAAAF09HgWSa6d_LMtMLdPlxMqa8D82';
        $captcha = $_POST['g-recaptcha-response'];

        if(!$captcha){
          echo '<p class="alert alert-warning">Please check the the captcha form.</p>';
          exit;
        }

        # FIX: Replace this email with recipient email
        
        # Sender Data
        $name = str_replace(array("\r","\n"),array(" "," ") , strip_tags(trim($_POST["name"])));
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $phone = trim($_POST["phone"]);
        $message = trim($_POST["message"]);
        
        if ( empty($name) OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR empty($phone) OR empty($message)) {
            # Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo '<p class="alert alert-warning">Please complete the form and try again.</p>';
            exit;
        }
		$msg="";
        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);

        if(intval($responseKeys["success"]) !== 1) {
          echo '<p class="alert alert-warning">Please check the the captcha form.</p>';
        } else {
			$mail = new PHPMailer\PHPMailer\PHPMailer();
				// Passing `true` enables exceptions
                                                          //Server settings
			$mail->SMTPDebug = 2;                                 // Enable verbose debug output
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to
			//$mail->SMTPAutoTLS = false;
	
			$mail->Username = 'skalskaa77@gmail.com';       // SMTP username .. This id should be login into device otherwise authentication failed msg 
			$mail->Password = 'qwertyuiop987654321';                     // SMTP password
    

			$mail->setFrom($email,$name);                                  // Sender mail id and name
			$mail->addAddress("singh.deepanshu207@gmail.com", "Spiritual Events");     // Add a recipient email-id and password
                                                                

			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = 'Contacting Mail';
			$mail->Body    = "Username= ".$name."<br>phone=".$phone." <br>Email= ".$email."<br> message=".$message;
			$mail->AltBody = 'Reply asap!!!!';

			if(!$mail->send())
			{
			http_response_code(500);
             $msg ="error";
			}
			else{
				http_response_code(200);
				$msg="success";
			
				header('Location:contactus.php');
			}
         

        }

    } else {
        # Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo '<p class="alert alert-warning">There was a problem with your submission, please try again.</p>';
    }

?>
