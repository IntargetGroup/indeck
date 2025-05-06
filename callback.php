<?php
require_once __DIR__ . "/vendor/autoload.php";

// **Imposto la timezone a Europe/Rome** per avere il timestamp corretto
date_default_timezone_set('Europe/Rome');

$json = file_get_contents('config.json'); 
$json_data = json_decode($json, true);

// --- Configurazione Google OAuth ---
$clientID     = $json_data['google']['client_id'];
$clientSecret = $json_data['google']['client_secret'];
$redirectUri  = $json_data['google']['redirct_uri'];

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// --- Scambio del code per token e fetch userinfo ---
$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
if (isset($token['error'])) {
    file_put_contents(__DIR__ . '/debug.log', "[".date('c')."] Token error: {$token['error_description']}\n", FILE_APPEND);
    exit('Errore durante l\'autenticazione.');
}
$client->setAccessToken($token['access_token']);
$oauth2 = new \Google_Service_Oauth2($client);
$info   = $oauth2->userinfo->get();
$email  = $info->email;

// --- Avvio sessione ---
session_start();
$_SESSION['is_logged'] = true;
$_SESSION['email']     = $email;

// --- Debug logging iniziale ---
error_reporting(E_ALL);
ini_set('display_errors', 1);
file_put_contents(__DIR__ . '/debug.log', "-----\n[".date('c')."] callback.php start\n", FILE_APPEND);

// --- Tracking accessi totali ---
$loginsFile = __DIR__ . '/logins.json';
file_put_contents(__DIR__ . '/debug.log', "[".date('c')."] LOGINSFILE: $loginsFile\n", FILE_APPEND);

if (! file_exists($loginsFile)) {
    file_put_contents($loginsFile, json_encode([], JSON_PRETTY_PRINT));
    file_put_contents(__DIR__ . '/debug.log', "[".date('c')."] Created new logins.json\n", FILE_APPEND);
}

$raw = file_get_contents($loginsFile);
file_put_contents(__DIR__ . '/debug.log', "[".date('c')."] Raw logins.json content: $raw\n", FILE_APPEND);

$logins = json_decode($raw, true) ?: [];
file_put_contents(__DIR__ . '/debug.log', "[".date('c')."] Before count: " . count($logins) . "\n", FILE_APPEND);

$logins[] = [
    'email' => $email,
    // Ora l’ora sarà in Europe/Rome
    'date'  => date('Y-m-d H:i:s')
];

$json = json_encode($logins, JSON_PRETTY_PRINT);
if (false === file_put_contents($loginsFile, $json)) {
    file_put_contents(__DIR__ . '/debug.log', "[".date('c')."] ERROR writing logins.json\n", FILE_APPEND);
} else {
    file_put_contents(__DIR__ . '/debug.log', "[".date('c')."] After count: " . count($logins) . "\n", FILE_APPEND);
}

// --- Fine tracking e redirect ---
file_put_contents(__DIR__ . '/debug.log', "[".date('c')."] Redirecting to index.php\n", FILE_APPEND);
header("Location: index.php");
exit;
?>
