<?php 
require_once 'pageParts/Session.All.Init.php';
require_once 'Classes/PageParts/Header.php';
require_once 'Classes/PageParts/NewTaskForm.php';

use Classes\PageParts\Header;
use Classes\PageParts\NewTaskForm;

$header = new Header();
$newTaskForm = new NewTaskForm();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="/CSS/styles.css" /> 
</head>
<header>
    <?php
        $header -> EchoMainHeader();
    ?>
</header>
<body>
    <div class="body-container">
    <?php
        $newTaskForm -> EchoNewTaskForm();
        $newTaskForm -> AddNewTask();
    ?>
    </div>
</body>
</html>