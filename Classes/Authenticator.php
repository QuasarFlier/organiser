<?php 

namespace Classes;

require_once 'DataProviders/FormDataProvider.php';
require_once 'Session.php';
require_once 'Classes/DataBase.php';

use Classes\DataProviders\FormDataProvider;
use Classes\Session;
use Classes\DataBase;

class Authenticator {

    private FormDataProvider $_formDataProvider;
    private DataBase $_database;

    public function __construct(FormDataProvider $_formDataProvider)
    {
        $this -> _formDataProvider = $_formDataProvider;
        $this -> _database = new DataBase();
    }

    public function __destruct()
    {
        unset($this -> _database);
    }

    public function AuthorizeUser():bool {

        $isProviderDataExists = $this -> _formDataProvider -> GetIsProviderDataExist();

        if ($isProviderDataExists === true) {
            
            $userName = strtolower($this -> _formDataProvider -> GetNickName());
            $userPassword = $this -> _formDataProvider -> GetPassword();
            $userHash = self::GetUserCache($userName, $userPassword);
            $isAuthorized = $this -> _database -> AuthorizeUser($userName, $userHash); 
            
            $this -> _formDataProvider -> SetIsAuthorized($isAuthorized);
            
            if ($isAuthorized === true) {
                $balance = $this -> _database -> GetBalance($userName);
                $this -> _formDataProvider -> SetBalance($balance);
            }
        } else {
            $this -> _formDataProvider -> SetIsAuthorized(false);
        }

        Session::SetDataProvidersData($this -> _formDataProvider);

        return $isAuthorized ?? false;
    }

    public static function GetUserCache(string $login, string $password):string {
        $encodedSecret = base64_encode("$login:$password");

        return hash("sha256", $encodedSecret);
    }

}