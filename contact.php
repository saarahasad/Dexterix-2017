<?php
/* Set e-mail recipient */
$myemail  = "johnkaramchand@gmail.com";
$subject = "DexteriX Enquiry" ;
/* Check all form inputs using check_input function */
$name = check_input($_POST['name']);
/*$subject  = check_input($_POST['subject'], "Write a subject");*/
$email    = check_input($_POST['email']);
$phone    = check_input($_POST['phone']);
/*$website  = check_input($_POST['website']);
$likeit   = check_input($_POST['likeit']);
$how_find = check_input($_POST['how']);*/
$comments = check_input($_POST['message']);

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}

/* If URL is not valid set $website to empty
if (!preg_match("/^(https?:\/\/+[\w\-]+\.[\w\-]+)/i", $website))
{
    $website = '';
} */

/* Let's prepare the message for the e-mail */
$message = "Hello!

Your contact form has been submitted by:

Name: $name
E-mail: $email
Phoneno: $phone

Comments:
$message

End of message
";

/* Send the message using mail() function */
mail($myemail, $subject, $message);
echo "Thank You! We will Get back to you ASAP";


/* Redirect visitor to the thank you page */
header('Location: contact.html');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <body>

    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}
?>
