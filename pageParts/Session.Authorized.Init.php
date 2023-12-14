<?php
session_start();
require_once 'Classes/DataProviders/SessionDataProvider.php';

use Classes\DataProviders\SessionDataProvider;

$sessionDataProvider = new SessionDataProvider();

if (!$sessionDataProvider->GetIsProviderDataExist() || !$sessionDataProvider->GetIsAuthorized()) {
    header("Location:/sessionBroken.php", true, 303);
    die(303);
}