<?php 

namespace Classes\DataProviders;

require_once "BaseDataProvider.php";
require_once "Classes/Session.php";

use stdClass;
use Classes\Session;
use \Error;

class SessionDataProvider extends BaseDataProvider {

    private null|int $_gameId;

    public function GetGameId ():null|int {
        return $this->_gameId;
    }

    public function SetGameId (false|int $_gameId):void {
        $this->$_gameId = $_gameId;

        Session::SetSessionDataProviderCustomData($this);
    }

    public function __construct()
    {
        $customSessionDataProviderData = Session::GetSessionDataProvidersCustomData();
        $this -> _gameId = $customSessionDataProviderData[Session::GameIdValue];
        
        $data = new stdClass();
        $data -> Nickname = "unknown";
        $data -> IsAuthorized = false;
        $data -> Balance = 0;

        try {
            $dataProviderData = Session::GetDataProvidersData();
            $data -> Nickname = $dataProviderData[Session::NickNameValue];
            $data -> Balance = $dataProviderData[Session::BalanceValue];
            $data -> IsAuthorized = $dataProviderData[Session::IsAuthorizedValue];
            $data -> IsProviderDataExists = true;
        } catch (Error $exception) {
            $data -> IsProviderDataExists = false;
        }

        $data -> Password = "Unknown";

        parent::__construct($data);
    }
}