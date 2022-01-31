<!-- Wysyłanie wiadomości e-mail -->

<head>
	<link rel="stylesheet" href="../css/styleadmina.css">	
</head>

<a href="http://localhost/files/strona/html/paneladmina.php">
		<button class="backButton">Back</button>
</a> 
<!-- Ułożenie elementów na stronie -->
<div class="wrapper">
    <div>
        <h1>Message</h1>
            <form method="post" action="contact.php">
        
                <div>
                    <label for="Email" class="label">Your email address</label>
                    <div>
                        <input type="email" id="Email" name="Email" class="form-control" required>
                    </div>
                </div>
                <div>
                    <label for="Topic">Topic</label>
                    <div>
                        <input type="text" id="Topic" name="Topic" required>
                    </div>
                </div>
                <div>
                    <label for="Message">Your message</label>
                    <div>
                        <textarea id="Message" name="Message" rows="6" maxlength="3000" required></textarea>
                    </div>
                </div>
        
                <div>
                     <input class="sendInput" type="submit" name="send_message" value="Send Message" />
                </div>
        
            </form>
    </div>

</div>

<?php
$odbiorca = "";
if(isset($_POST['send_message'])){
    if (empty($_POST['Topic']) || empty($_POST['Message']) || empty($_POST['Email']))
    {
        echo '[fill all inputs]';
    }
    else
    {
        $mail['subject'] = $_POST['Topic'];
        $mail['body'] = $_POST['Message'];
        $mail['sender'] = $_POST['Email'];
        $mail['reciptient'] = "";

        $header = "From: Formularz kontaktowy <".$mail['sender'].">\n";
        $header .="X-Sender: <".$mail['sender'].">\n";

        mail($mail['reciptient'],$mail['subject'],$mail['body'], $header);
        echo '[message sent]';
    }
}
?>