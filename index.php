<?php

$method= $_SERVER['REQUEST_METHOD'];
if($method=="POST")
{
	$requestbody =file_get_contents('php://input');
	$json = json_decode($requestbody);
	var_dump($json);
	$text= $json->result->parameters->salle_reservation;
	$headers=$json->result;
	$context=$json->context;
	switch($text)
	{
	case 'hi':
		$speech = "hi nice to meet you";
		break;
	case 'bye':
		$speech= "bye ,good night";
		break;
	case 'anything':
		$speech="yes you can type anything";
		break;
	default:
		$speech ="sorry, i didnt get that";
		break;
		}
	$response = new \stdClass();
	$response->speech=$speech;
	$response->displayText=$headers;
	$response->context=$context;
	$response->source="webhook";
	$reponse->json=$json;
	echo json_encode($response);
}else
	echo "method not allowed";

?>