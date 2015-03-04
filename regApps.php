<?php
include('_classes/dataLink.class.php');


if( isset( $_GET["id"])) {

			$db = new dataLink();

			$id = $_GET["id"];
			$cleanID = $db->mysql_text_prep($id);
			$regApp = $db->registerID($cleanID);
			$xml = new SimpleXMLElement('<xml/>');
			$response = "";

					if($regApp) {

							$response = $xml->addChild('response');
    						$response->addAttribute('message', "Your ID was Added.");
    						Header('Content-type: text/xml');
    						print($xml->asXML());
    						exit;

					} else if(!$regApp) {

							$response = $xml->addChild('response');
    						$response->addAttribute('message', "That ID already exists.");
     						Header('Content-type: text/xml');
    						print($xml->asXML());
    						exit;

					} else if ($regApp == 2) {

							$response = $xml->addChild('response');
    						$response->addAttribute('message', "The database could not be reached. Please try agin later.");
     						Header('Content-type: text/xml');
    						print($xml->asXML());
    						exit;


					}
					
} else {

  exit();

}