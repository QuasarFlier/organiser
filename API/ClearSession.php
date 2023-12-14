<?php
chdir("..");

require_once "pageParts/Session.All.Init.php";
require_once "Classes/Session.php";


if (!isset($_POST["from"])) {
    http_response_code(502);
    die();
}

$redirectUrl = $_POST["from"];

$_SESSION = [];

header("Location:".$redirectUrl, true, 303);
die();
?>