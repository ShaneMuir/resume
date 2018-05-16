<?php
/**
 * This example shows how to handle a simple contact form.
 */
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
$msg = '';
//Don't run this unless we're handling a form submission
if (array_key_exists('email', $_POST)) {
    date_default_timezone_set('Etc/UTC');
    require 'vendor/autoload.php';
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    //Tell PHPMailer to use SMTP - requires a local mail server
    //Faster and safer than using mail()
    $mail->isSMTP();
    $mail->Host = 'ssdrs6.layerip.com';
       $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'shane@shanemuirhead.co.uk';                 // SMTP username
    $mail->Password = 'Oliver110617@';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;
    $mail->setFrom('shane@shanemuirhead.co.uk', 'Shane Muirhead');
    $mail->addAddress('shane@shanemuirhead.co.uk', 'Shane Muirhead');
    if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
        $mail->Subject = 'Someone has just sent you a contact form!';
        //Keep it simple - don't use HTML
        $mail->isHTML(false);
        //Build a simple message body
        $mail->Body = <<<EOT
Name: {$_POST['name']}
Email: {$_POST['email']}
Message: {$_POST['message']}
EOT;
        //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            //but you shouldn't display errors to users - process the error, log it on your server.
            $msg = 'Sorry, something went wrong. Please try again later.';
        } else {
            $msg = 'Message sent! Thanks for contacting Me.';
        }
    } else {
        $msg = 'Invalid email address, message ignored.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.0/css/hover-min.css" type="text/css" />
    <link rel="stylesheet" href="assetts/css/stylesold.css" type="text/css" />
    <title>Shane Muirhead CV Page</title>
</head>

<body>
    <header class="container-fluid">
        <div class="row">
            <a href "index.html">
                <div class="col-md-4 logo">
            </a>
            </div>
            <div class="col-md-8">
                <div class="row bg-color-name-title">
                    <div class="heading">
                        <h1 class="name">Shane Muirhead </h1>
                        <h2 class="title">Full Stack Web Developer</h2>
                    </div>
                </div>
                <div class="row">
                    <ul id="nav" class="list-inline clearfix">
                        <li class="col-xs-6 col-sm-3 ul-menu-color-home menuitem">
                            <a href="index.html" class="hvr-sweep-to-bottom"><i class="fa fa-home" arla-hidden="true"></i><span>Home</span></a>
                        </li>
                        <li class="col-xs-6 col-sm-3 ul-menu-color-resume menuitem">
                            <a href="resume.html" class="hvr-sweep-to-bottom"><i class="fa fa-graduation-cap" arla-hidden="true"></i><span>Resume</span></a>
                        </li>
                        <li class="col-xs-6 col-sm-3 ul-menu-color-contact menuitem">
                            <a href="contact.php" class="hvr-sweep-to-bottom"><i class="fa fa-commenting-o" arla-hidden="true"></i><span>Contact</span></a>
                        </li>
                        <li class="col-xs-6 col-sm-3 ul-menu-color-download menuitem">
                            <a href="assetts/cv/Muirhead-Shane.pdf" target="_blank" class="hvr-sweep-to-bottom"><i class="fa fa-download" arla-hidden="true"></i><span>Download CV</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>


    <section class="container-fluid">
        <div class="row bg-color-contact">
            <div>
                <h3 class="contact-heading uppercase text-center">Got a project in mind?</h3>
                <h5 class="uppercase text-center">Let's work together</h5>
            </div>
      

            <div class="center-form">
                     <?php if (!empty($msg)) {
    echo "<h2>$msg</h2>";
} ?>
                <form method="POST">
                    <input type="text" name="name" class="form-control" id="fullname" placeholder="Name" required/>
                    <input type="text" name="email" class="form-control" id="emailaddress" placeholder="Email" required/>
                    <textarea rows="5" name="message" class="form-control" id="projectsummary" placeholder="Project Description" required></textarea>
                    <button type="submit" class="btn btn-secondary center-block">Send Project Request</button>
                 <!--   <label class="text-success">Thank you for contacting me, I'll be in touch shortly.</label>
                    <label class="text-danger">There is an Error!</label> -->
                                    </form>
            </div>
        </div>
    </section>
    

    <footer class="container-fluid">
        <div id="footer-details" class="row">
            <div class="col-sm-4">
                <h5 class="uppercase general-sub">About</h5>
                <p class="inline-block">
                    Full Stack Web Developer skilled in everything from HTML, CSS, Javascript, Bootstrap, MongoDB, Python and Django.
                </p>
            </div>
            <div class="col-sm-4">
                <h5 class="uppercase general-sub">Download My CV</h5>
                <p class="inline-block">
                    Need a printable version of my CV? Download it here.
                    <a href="assetts/cv/Muirhead-Shane.pdf" target="_blank" class="cvpdf"> <i class="fa fa-download" arla-hidden="true"></i></a>
                </p>
            </div>
            <div class="col-sm-4">
                <h5 class="uppercase general-sub">My Social</h5>
                <ul class="list-inline social-links">
                    <li><a target="_blank" href="https://www.facebook.com/Shane.Muirhead1"><i class="fa fa-facebook"></i></a></li>
                    <li><a target="_blank" href="https://twitter.com/IBoxuh"><i class="fa fa-twitter"></i></a></li>
                    <li><a target="_blank" href="https://www.linkedin.com/in/shane-muirhead/"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </footer>

</html>
