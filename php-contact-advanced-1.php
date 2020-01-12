<!-- Note: put the Bootstrap CSS file in your HEAD tag -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
                                  
<div class="container">
    <form method="POST" action="send.php">
        <div><label>Your Name:</label></div>
        <div><input type="text" name="myName" class="form-control" /></div>
        <div><label>Your Email:</label></div>
        <div><input type="text" name="myEmail" class="form-control" /></div>
                                      
        <div><label>Message:</label></div>
        <div><textarea cols="40" rows="5" name="myMessage" class="form-control"></textarea></div>
        <div class="float-right mt-2">
            <input type="submit" value="Send" class="btn btn-primary" />
        </div>
    </form>
</div>

<?php

$errors = ”;

$myemail = ‘mariah.marasco@gmail.com’;//<—–Put Your email address here. if(empty($_POST[‘name’]) ||

empty($_POST[’email’]) ||

empty($_POST[‘message’]))

{

$errors .= “\n Error: all fields are required”;

}

$name = $_POST[‘name’];

$email_address = $_POST[’email’];

$message = $_POST[‘message’];

if (!preg_match(

“/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i”, $email_address))

{

$errors .= “\n Error: Invalid email address”;

}

if( empty($errors))

{

$to = $myemail;

$email_subject = “Contact form submission: $name”;

$email_body = “You have received a new message. “.

” Here are the details:\n Name: $name \n “.

“Email: $email_address\n Message \n $message”;

$headers = “From: $myemail\n”;

$headers .= “Reply-To: $email_address”;

mail($to,$email_subject,$email_body,$headers);

//redirect to the ‘thank you’ page

header(‘Location: contact-form-thank-you.html’);

}

?>
