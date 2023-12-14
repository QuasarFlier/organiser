<?php 
require_once 'pageParts/Session.All.Init.php';
require_once 'Classes/PageParts/Header.php';
require_once 'Classes/PageParts/Field.php';
require_once 'Classes/PageParts/NewTask.php';
require_once 'Classes/PageParts/TaskDescription.php';
require_once "Classes/PageParts/InstallPageParts.php";

use Classes\PageParts\Header;
use Classes\PageParts\Field;
use Classes\PageParts\NewTask;
use Classes\PageParts\TaskDescription;
use Classes\PageParts\InstallPageParts;

$header = new Header();
$field = new Field();
$newTask = new NewTask();
$taskDescription = new TaskDescription();
$installPageParts = new InstallPageParts();
?>
<html lang="en">
    <head>
    <link rel="stylesheet" type="text/css" href="/CSS/styles.css" /> 
    </head>
<header>
    <?php 
    $header -> EchoMainHeader();
    ?>
    
</header>
<body>
    <div class="body-container">
        <div class="tasks-container">
            <?php
                $newTask -> EchoNewTask();
            ?>
            <div>
                <div class="task-container-item">
                    <form action="index.php" method="get">
                        <?php
                            $field -> EchoField();
                        ?>
                        <input type="submit" value="Выбрать задачу" class="submit-button">
                    </form>
                </div>
            </div>
        </div>
        <div class="output-container">
        <?php 
            $taskDescription -> EchoTaskDescription();
        ?>
        </div>
    </div>
</body>
<footer class="footer-container">
        <?php $installPageParts -> EchoForm();
         $installPageParts -> CreateDbFile();
         $installPageParts -> CreateTaskTableOnDb();
         $installPageParts -> CreateDefaultTask();
         $installPageParts -> CreateTestTask();
         $installPageParts -> CreateTest2Task(); ?>
        <p>Приложение создано Василием Диком</p>
</footer>
</html>