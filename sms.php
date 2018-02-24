<?php

/*
Author : Shafraz Rahim
*/

ini_set('error_log', 'sms-app-error-jedi.log');

include 'lib/SMSSender.php';
include 'lib/SMSReceiver.php';


date_default_timezone_set("Asia/Colombo");


echo "Sending SMS";
/*** To be filled ****/

$password= "484df3dacd1eef462c2267d53592cc7e";

$applicationId = "APP_042965";

$serverurl= "https://api.dialog.lk/sms/send";


$message = $_REQUEST['mesage'];
$address = $_REQUEST['address'];

try{
	/*************************************************************/
/*	$receiver = new SMSReceiver(file_get_contents('php://input'));
	$content =$receiver->getMessage();
	$content=preg_replace('/\s{2,}/',' ', $content); 
	$address = $receiver->getAddress();
	$address = $receiver->getAddress();
	$requestId = $receiver->getRequestID();
	$applicationId = $receiver->getApplicationId();
	/*************************************************************/
	
*/
	$sender = new SMSSender($serverurl, $applicationId, $password);
	
	print_r($sender);
	
	//list($key, $second) = explode(" ",$content);
	
	

 

	
/*	 if ($second=="go") {
       	
		//Broadcasting A Message
		
	     	$boradmsg = substr($content,7);
       
	     	error_log("Broadcast Message ".$content);
		
	     	$response=$sender->broadcastMessage($boradmsg);


	   }else{

		//Replying to an individual Message
		
	     	error_log("Message received ".$content);
	
	     	$sender->sendMessage("May the force be with you Jedi Master ".$second,$address);

	      
             }
*/

				$response = $sender->sendMessage($message, $address);		
				echo "$response";

	}catch(SMSServiceException $e){

	     	error_log("Passed Exception ".$e);

	
	}

?>
