<?php 

namespace Classes\DataProviders;

require_once "BaseDataProvider.php";
require_once "DatabaseDataProvider.php";

use stdClass;

class FormDataProvider extends BaseDataProvider {
    
    public function __construct()
    {
        $data = new stdClass();
        $databaseDataProvider = new DatabaseDataProvider();

        $IsNameValueFromFormExist = key_exists("name", $_GET);
        $IsPasswordValueFromFormExist = key_exists("password", $_GET);
        
        $data -> IsProviderDataExists = $IsPasswordValueFromFormExist && $IsNameValueFromFormExist;
        $data -> Nickname = $IsNameValueFromFormExist ? $_GET["name"] : "unknown";
        $data -> Password = $IsPasswordValueFromFormExist ? $_GET["password"] : "unknown";
        $data -> IsAuthorized = $data -> IsProviderDataExists && strtolower($data -> Nickname) == "root";
        $data -> Balance = $databaseDataProvider -> GetProfileBalance();

        parent::__construct($data);
    }

    public function SetBalance(int $balance): void {
        $this -> _balance = $balance;
    }

    public function SetIsAuthorized(bool $isAuthorized): void {
        $this -> _isAuthorized = $isAuthorized;
    }
}