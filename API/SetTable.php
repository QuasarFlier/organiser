<?php
chdir("..");

require_once "pageParts/Session.Authorized.Init.php";
require_once "Classes/Session.php";
require_once "Classes/DataBase.php";
require_once "Classes/Deck.php";

use Classes\DataBase;
use Classes\Session;
use Classes\Deck;

if (!isset($_POST["hash"])) {
    http_response_code(502);
    die();
}

$tableHash = $_POST["hash"];
$dataBase = new DataBase();
$lobbyDecks = $dataBase->GetLobbyDecks();

$currentDeck = null;

foreach ($lobbyDecks as $encodedDeckState) {
    $deck = new Deck();
    $deck->RestoreDeckState($encodedDeckState);
    if ($deck->GetHashedDeckState() === $tableHash){
        $currentDeck = $deck;
    }
}

$gameId = $dataBase->GetGameId($deck->GetEncodedDeckState());

Session::SetCurrentGameId($gameId);

header("Location:/Game.php", true, 303);
die();
?>