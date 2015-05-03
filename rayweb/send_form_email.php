<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Email</title>
</head>

<body  bgcolor="#6699CC" >

<div align="center" >

<?php
 
if(isset($_POST['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "info@raymer.designerscript.com";
 
    $email_subject = "Message from web resume";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo ' <h1 style="color:#CC0033"> We are very sorry, but there were error(s) found with the form you submitted. </h1> '; 
 
        echo ' <h2 >These errors appear below.<br /><br /> </h2>';
 
        echo $error."<br /><br />";
 
        echo '<h3>Please go back and fix these errors. <br /><br /> </h3>';
		
		echo '<a href="http://raymer.designerscript.com/index.html#contact">Click Here to go back </a>';
		
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['telephone']) ||
		
		!isset($_POST['subject']) ||
 
        !isset($_POST['comments'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');     
 
    }
     
 
    $name = $_POST['name']; // required
 
    $subject = $_POST['subject']; // required
 
    $email_from = $_POST['email']; // required
 
    $telephone = $_POST['telephone']; // not required
 
    $comments = $_POST['comments']; // required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= '<h4 style="color: #990000" >The Email Address you entered does not appear to be valid.<br /></h4>';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
 
    $error_message .= '<h4 style="color: #990000" >The Name you entered does not appear to be valid.<br /></h4>';
 
  }
 
 
   $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$subject)) {
 
    $error_message .= '<h4 style="color: #990000" >The Subject you entered does not appear to be valid.<br /></h4>';
 
  }
 
 
  if(strlen($comments) < 2) {
 
    $error_message .= '<h4 style="color: #990000" >The Message you entered do not appear to be valid.<br /> </h4>';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Name: ".clean_string($name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
	
	$email_message .= "Subject: ".clean_string($subject)."\n";
 
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  


 
?>
 
 
 
<!-- include your own success html here -->
 
 
 
<h2>Thank you for contacting me. I will be in touch with you very soon.</h2>
 
<a href="index.html"> Click Here to go back </a>



 
 
<?php
 
}

?>
</div>

</body>
</html>