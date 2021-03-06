<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'consultoriacontablecolombia@gmail.com'; 
$email_subject = "Te ha contactado el Sr(a):  $name con el correo $email_address";
$email_body = "Informacion de contacto\n"."Nombre: $name\nEmail: $email_address\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: serviciocontactenos@consultoriacontable.com\n"; 
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?>
