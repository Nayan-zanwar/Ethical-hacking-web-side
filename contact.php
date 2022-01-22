<?php
$myemail  = "hacker93master@gmail.com";
$yourname = check_input($_POST['yourname'], "Enter your name");
$subject  = check_input($_POST['subject'], "Write a subject");
$email    = check_input($_POST['email']);
$comments = check_input($_POST['comments'], "Write your comments");
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}
$message = "Hello!
Your contact form has been submitted by:
Name: $yourname
E-mail: $email
URL: $website
Comments:$comments
End of message
";
mail($myemail, $subject, $message);
header('Location: thanks.html');
exit();
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