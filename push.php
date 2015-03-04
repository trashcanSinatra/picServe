<?php
$css = "https://my.smartmedreminder.com/resources/css/";
// include($_SERVER["DOCUMENT_ROOT"]  . "firePHP/firePHP.class.php");
include('_classes/dataLink.class.php');
?>

	<link href="<?php echo $css; ?>lib/jquery-ui.css" rel="stylesheet">
	<link href="<?php echo $css; ?>bootstrap.css" rel="stylesheet">
	<link href="<?php echo $css; ?>bootstrap-responsive.css" rel="stylesheet">
	<link href="<?php echo $css; ?>bootstrap-overrides.css" rel="stylesheet">
    <link href="<?php echo $css; ?>lib/fullcalendar.css" rel="stylesheet" />
    <link href="<?php echo $css; ?>lib/fullcalendar.print.css" rel="stylesheet" media="print" />
	 <link href="<?php echo $css; ?>style.css" rel="stylesheet">


<div class="container">
	<div class="offset2">
			<h2>Send a Message</h2>
	</div>


<?php
	$infoSaved = false;
	$infoError = false;

	if (isset($_POST["SUBMIT"]))
	{
		// send message
		$db = new dataLink();
		$registatoin_ids = $db->createPushList();
	
		$message = array("message"=>$_POST["message"]);
		if ($_POST["message"] == "") {
			$infoError = true;
		} else {
			$result = json_decode(send_notification($registatoin_ids, $message));
			if ($result->success == true) {
				$infoSaved = true;
			} else {
				$infoError = true;
			}
		}	
	}
	
	// Good or error
	if ($infoSaved)
	{
		echo '<div class="alert alert-success">Message Sent.<a class="close" data-dismiss="alert" href="#">&times;</a></div>';
	}
	elseif ($infoError)
	{
		echo '<div class="alert alert-error">Message Not Sent<a class="close" data-dismiss="alert" href="#">&times;</a></div>';
	}

?>


	<form method="POST">
	<p></p>
		<div class="well span8 offset2">

			<label><b>What message would you like to send?</b></label>
			<input type="text" style="width:700px;" name="message" size="80" placeholder="Message" value="" />
			
		</div>

		<div class="span8 offset2">
		<p><input class="btn btn-glow primary" name="SUBMIT" type="SUBMIT" value="Send Message" /></p>

		</div>
	</form>
</div>
<?php

function send_notification($registatoin_ids, $message) {
        
        // Set POST variables
        $url = 'https://android.googleapis.com/gcm/send';
 
        $fields = array(
            'registration_ids' => $registatoin_ids,
            'data' => $message,
        );
 
        $headers = array(
            'Authorization: key=AIzaSyC8U2Lyv4IjpzixSh-uoCfRjvGwO6GbyrE',
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();
 
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
 
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
 
        // Close connection
        curl_close($ch);
        return $result;
 
}


?>
