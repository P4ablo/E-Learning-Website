<!-- Przypominanie hasła -->

<head>
<link rel="stylesheet" href="../css/styleadmina.css ? <?php echo time(); ?>">
<script src="https://kit.fontawesome.com/25702e5cf9.js" crossorigin="anonymous"></script>
</head>

<a href="http://localhost/files/strona/index.php">
		<button class="backButton">Back</button>
</a> 
<div class="contactform">
        <h1>Remind me my password</h1>
            <form class="contact-form" method="post" action="remindpass.php">
        
                <div class="form-group">
                    <label for="Email" class="label">Your email address</label>
                    <div class="input-group">
                        <input type="email" id="Email" name="Email" class="form-control" required>
                    </div>
        
                <div class="form-group">
                <input class="sendInputPass" type="submit" name="send_message" value="Send message with password" />
                </div>
        
            </form>
    </div>

    <?php
    require_once('../cfg.php');
    if(isset($_POST['send_message']))
    {
    if (empty($_POST['Email']))
    {
        echo '[fill all inputs]';
    }
    else
    {
        
        $mail['body'] = $pass;
        $mail['reciptient'] = $_POST['Email'];

        $header = "Your password";

        mail($mail['reciptient'],$mail['body'], $header);
        echo '[message sent]';
    }
}
?>