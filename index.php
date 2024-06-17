<?php

//Utilisation socket rsx pour récupérer les infos indispensables comme l'état du serv sans aucun délai
function checkServerState($serverIp, $serverPort) {
    $fp = @fsockopen($serverIp, $serverPort, $errno, $errstr, 1);
    if ($fp >= 1) {
        $serveur_etat = '<img src="assets/png/enabled.png" width="16" height="16" border="0" style="vertical-align: middle;"/> <p>Online</p>';
    } else {
        $serveur_etat = '<img src="assets/png/disabled.png" width="16" height="16" border="0" style="vertical-align: middle;"/> <p>Offline</p>';
    }

    return $serveur_etat;
}

function getApiFResponse($api_url) {
    $response = file_get_contents($api_url);
    $json_response = json_decode($response, true);

    if (!$response) {
        return false;
    }
    echo $response;
    return $json_response;
}

function testApiUrl($api_url) : string|false {
    if ($api_url) {
        // Vérifier si l'URL est correcte et sûre
        if (filter_var($api_url, FILTER_VALIDATE_URL)) {
            return $api_url;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

//Assignation valeur de retour fonction dans var $api_url puis test de la var avec if
if ($api_url = testApiUrl($_GET['api_url'])) {
    $json_data = getApiFResponse($api_url);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Ouga bouga</h1>
    <div class="serv-status-container card">
        <h2>Server status</h2>
        <!-- <div class="serv-status"> -->
        <?php
            echo checkServerState('92.92.116.88', '25565');
            if ($json_data) {
                echo ($json_data['ip']);
            }
        ?>
        <!-- </div> -->
    </div>
    <div class="serv-status-container card">
        <h2>Server status</h2>
        <!-- <div class="serv-status"> -->
        <?php
            echo checkServerState('92.92.116.88', '25565');
            if ($json_data) {
                echo ($json_data['ip']);
            }
        ?>
        <!-- </div> -->
    </div>
    <a href="index.php?api_url=https://api.mcsrvstat.us/3/92.92.116.88">Vers l'API</a>
</body>

</html>