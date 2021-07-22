<?php

$ch = curl_init(sprintf(
    'https://%s:%s@%s:%s/api%s',
    $_SERVER['PHP_AUTH_USER'],
    $_SERVER['PHP_AUTH_PW'],
    getenv("ESB_URL")?: '10.76.72.150',
    getenv("PORT")?: '8181',
    $_SERVER['REQUEST_URI']
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 300);

switch ($_SERVER['REQUEST_METHOD']) {
case "GET":
    break;
case "POST":
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, file_get_contents("php://input"));
    break;
case "PUT":
case "DELETE":
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $_SERVER['REQUEST_METHOD']);
    curl_setopt($ch, CURLOPT_POSTFIELDS, file_get_contents("php://input"));
    break;
default:
    throw new \Exception('NIY');
}
echo curl_exec($ch);
http_response_code(curl_getinfo($ch, CURLINFO_HTTP_CODE));
curl_close($ch);
exit;
