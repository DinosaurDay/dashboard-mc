<?php
    function checkServerState($serverIp, $serverPort = '25565') {
        $fp = @fsockopen($serverIp, $serverPort, $errno, $errstr, 1);

        if ($fp >= 1) {
            $serveur_etat = '<img src="assets/png/enabled.png" width="16" height="16" border="0" style="vertical-align: middle;" /> <p>Online</p>';
        } else {
            $serveur_etat = '<img src="assets/png/disabled.png" width="16" height="16" border="0" style="vertical-align: middle;" /> <p>Offline</p>';
        }

        return $serveur_etat;
    }

    $url = $_GET["https://api.mcsrvstat.us/3/92.92.116.88"];

    if (isset($_GET['api_url'])) {
        $api_url = $_GET['api_url'];
    
        // Vérifier si l'URL est correcte et sûre
        if (filter_var($api_url, FILTER_VALIDATE_URL)) {
            // Faire la requête à l'API
            $response = file_get_contents($api_url);
    
            if ($response === FALSE) {
                echo "Erreur lors de la requête à l'API.";
            } else {
                // Afficher la réponse de l'API
                echo $response;
            }
        } else {
            echo "URL invalide.";
        }
    } else {
        echo "Le paramètre 'api_url' est manquant.";
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
        <div class="serv-status">
            <?php echo checkServerState('92.92.116.88', '25565');
            echo $response;?>
        </div>
    </div>
</body>

</html>