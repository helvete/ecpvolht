<?php

$port = getenv("PORT") ? getenv("PORT") : '8201';
$user = getenv("USER") ? getenv("USER") : 'portal_user';
$passwd = getenv("PASSWD") ? getenv("PASSWD") : 'portal';

$headers = [
    'Content-Type: application/json',
];
$ch = curl_init("https://{$user}:{$passwd}@10.76.72.148:{$port}/api{$_SERVER['REQUEST_URI']}");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

switch ($_SERVER['REQUEST_METHOD']) {
case "GET":
	break;
case "POST":
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, file_get_contents("php://input"));
	break;
case "PUT":
case "DELETE":
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $this->_method);
	curl_setopt($ch, CURLOPT_POSTFIELDS, file_get_contents("php://input"));
	break;
default:
	throw new \Exception('NIY');
}
echo curl_exec($ch);
exit;
