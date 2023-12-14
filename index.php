<?php 
require_once 'pageParts/Session.All.Init.php';
require_once 'Classes/Profile.php';
require_once 'Classes/PageParts/Menu.php';
require_once 'Classes/PageParts/LoginForm.php';
require_once 'Classes/PageParts/LoginStatus.php';
require_once 'Classes/PageParts/Credentials.php';
require_once 'Classes/DataProviders/FormDataProvider.php';
require_once 'Classes/Authenticator.php';
require_once 'Classes/PageParts/Header.php';
require_once 'Classes/PageParts/Field.php';
require_once 'Classes/PageParts/NewTask.php';
require_once 'Classes/PageParts/TaskDescription.php';

use Classes\DataProviders\FormDataProvider;
use Classes\Profile;
use Classes\PageParts\Menu;
use Classes\PageParts\LoginForm;
use Classes\PageParts\LoginStatus;
use Classes\PageParts\Credentials;
use Classes\Authenticator; 
use Classes\PageParts\Header;
use Classes\PageParts\Field;
use Classes\PageParts\NewTask;
use Classes\PageParts\TaskDescription;

$formDataProvider = new FormDataProvider();
$authenticator = new Authenticator($formDataProvider);
$authenticator -> AuthorizeUser();
$profile = new Profile($formDataProvider);
$menu = new Menu($profile);
$loginForm = new LoginForm($profile);
$loginStatus = new LoginStatus($profile);
$credentials = new Credentials($profile);
$header = new Header();
$field = new Field();
$newTask = new NewTask();
$taskDescription = new TaskDescription();
?>
<html lang="en">
<header>
    <?php 
    $menu -> EchoHeader();
    $loginForm -> EchoHeader();
    $loginStatus -> EchoHeader();
    $credentials -> EchoHeader();
    $header -> EchoMainHeader();
    ?>
</header>
<body>

<?php 
    $menu -> EchoMenu();
    $credentials -> EchoCredentials();
    //$loginForm -> EchoLoginForm();
    $loginStatus -> EchoLoginStatus();
    $loginStatus -> EchoReloginButton();
    $newTask -> EchoNewTask();
?>
<form action="index.php" method="get">
    <?php
        $field -> EchoField();
    ?>
    <input type="submit" value="Submit">
</form>
<?php 
    $taskDescription -> EchoTaskDescription();
?>
</body>
</html>