<?php 


sleep(1); // avoid spamming.

if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['reason']) && isset($_POST['message'])) {
	if ($_POST['email'] != "" && $_POST['name'] != "" && $_POST['message'] != "") {
		$from = strip_tags($_POST['email']);
		$name = strip_tags($_POST['name']);
		$subject = "4 Me - ".strip_tags($_POST['reason']);
		$message = strip_tags($_POST['message']);
		$message .= "\n\r\n\rMessage from IP : ".$_SERVER['REMOTE_ADDR'];

		if (strpos($subject, "Website") > 0) {
			$to = "bltdev4me@gmail.com";
		}else{
			$to = "malcamtrustfoundation@gmail.com";
		}
		mail($to, $subject, "$name sent you a message saying : \n\r $message", "from: $from");
		echo("#sent"); 
	}else{
		echo("#failed");
	}
}




?>