<?php

require_once __DIR__ . "/vendor/autoload.php";

$json = file_get_contents('config.json'); 
$json_data = json_decode($json, true);

// Google OAuth2 configuration
$clientID     = $json_data['google']['client_id'];
$clientSecret = $json_data['google']['client_secret'];
$redirectUri  = $json_data['google']['redirect_uri'];

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

$link = $client->createAuthUrl();

?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>In:Deck – Login</title>
  <link rel="icon" href="/images/favicon.png" />
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  <style>
    /* Se vuoi un minimo di styling inline per il container */
    .login-container {
      max-width: 400px;
      margin: auto;
    }
  </style>
</head>
<body class="bg-white flex flex-col min-h-screen">
  <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm login-container">
      <img class="mx-auto h-10 w-auto" src="/images/logo_03.png" alt="Intarget Logo">
      <img class="mx-auto w-auto my-8" src="/images/in-deck.png" alt="In:Deck Logo">
      <a
        href="<?= htmlspecialchars($link) ?>"
        class="flex w-full justify-center items-center rounded-full px-4 py-2 bg-gray-200 hover:bg-gray-300 font-semibold text-md text-black">
        <!-- Icona Google -->
        <svg class="me-2 h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" fill="currentColor">
          <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8
            c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657
            C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20
            C44,22.659,43.862,21.35,43.611,20.083z"/>
          <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,16.108,19.868,12,24,12
            c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4
            C15.645,4,8.332,8.65,6.306,14.691z"/>
          <path fill="#4CAF50" d="M24,44c5.389,0,10.205-1.774,14.092-4.808l-6.54-5.568
            C29.403,34.916,26.627,36,24,36c-5.204,0-9.593-3.433-11.212-8.065l-6.671,5.146
            C7.912,39.556,15.292,44,24,44z"/>
          <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.236-2.152,4.179-3.961,5.657
            C29.403,34.916,26.627,36,24,36c-5.204,0-9.593-3.433-11.212-8.065l-6.671,5.146
            C7.912,39.556,15.292,44,24,44c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"/>
        </svg>
        <span>Entra con Google</span>
      </a>
    </div>
  </div>
</body>
</html>
