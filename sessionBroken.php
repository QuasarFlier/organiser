<?php 
require_once 'pageParts/Session.All.Init.php';

require_once 'Classes/DataProviders/SessionDataProvider.php';

use Classes\DataProviders\SessionDataProvider;

$sessionDataProvider = new SessionDataProvider();
?>
<html>
    <head>
    </head>
    <body>
        <h1>Something went wrong:</h1>
        <h2>Session data exists: <?php echo $sessionDataProvider -> GetIsProviderDataExist() ?></h2>
        <h2>You are authorized: <?php echo $sessionDataProvider -> GetIsAuthorized() ?></h2>
        <h2>Your login: <?php echo $sessionDataProvider -> GetNickName() ?></h2>
        <br>
        <a href="index.php"><button>Re-authorize please.</button></a>
    </body>
</html>