<?php
    echo '';

    function checkEtatServeur($serverIp, $serverPort = '25565')
    {

        $fp = @fsockopen($serverIp, $serverPort, $errno, $errstr, 1);

        if ($fp >= 1) {
            $serveur_etat = '<img src="assets/png/enabled.png" width="16" height="16" border="0" style="vertical-align: middle;" /> <p>Online</p>';
        } else {
            $serveur_etat = '<img src="assets/png/disabled.png" width="16" height="16" border="0" style="vertical-align: middle;" /> <p>Offline</p>';
        }

        return $serveur_etat;
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
            <?php echo checkEtatServeur('92.92.116.88', '25565'); ?>
        </div>
    </div>
</body>

</html>