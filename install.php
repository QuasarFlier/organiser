<?php 
require_once "pageParts/Session.All.Init.php";
require_once "Classes/PageParts/InstallPageParts.php";

use Classes\PageParts\InstallPageParts;

$installPageParts = new InstallPageParts();
?>
<html>
    <head>
    </head>
    <body>
        <h1>Database installer</h1>
        <hr>
        <?php $installPageParts -> EchoForm(); ?>
        <?php $installPageParts -> CreateDbFile(); ?>
        <?php $installPageParts -> CreateTaskTableOnDb(); ?>
        <?php $installPageParts -> CreateDefaultTask(); ?>
        <?php $installPageParts -> CreateTestTask(); ?>
        <?php $installPageParts -> CreateTest2Task(); ?>
        <hr>
    </body>
</html>