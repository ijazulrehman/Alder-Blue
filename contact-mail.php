<?php
   if(!isset($_POST['submit'])){
       echo "error: you need to submit the form.";
   }else{
    $firstName = strip_tags(trim($_POST['firstName']));
    $lastName = strip_tags(trim($_POST['lastName']));
    $email = $_POST['email'];
    $number = trim($_POST['number']);
    $company = trim($_POST['company']);
    $request = trim($_POST['company']);
 
    if(!$firstName || !$lastName || !$email || !$number || !$company || !$request){
           // Set a 400 (bad request) response code and exit.
           http_response_code(400);
           echo "Oops! There was a problem with your submission. Please complete the form and try again.";
           exit;
    }else{
        $email_from = "jassnj01@gmail.com";
        $email_subject = "$firstName $lastName contacted.";
        $email_body = "You recived message from $firstName $lastName. \n".
                    "Email address: $email \n".
                    "Contact Number: $number \n".
                    "Company Name: $company \n".
                    "Request: $request";
    
        $to = "jassynj@yahoo.com";
        $header = "From: $email_from";
        

        if(mail($to, $email_subject, $email_body, $header)){
             // Set a 200 (okay) response code.
             http_response_code(200);
             echo "Thank You! Your message has been sent.";
         } else {
             // Set a 500 (internal server error) response code.
             http_response_code(500);
             echo "Oops! Something went wrong and we couldn't send your message.";
         }
    }
  
}


?>