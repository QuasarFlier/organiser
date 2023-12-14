<?php 

namespace Classes\DataProviders;

use stdClass;

class BaseDataProvider {

    protected int $_balance;

    private string $_nickname;
     
    private string $_password;
    
    protected bool $_isAuthorized;
    
    private bool $_isProviderDataExists;


    /**
     * @param stdClass $data
     * 
     * std class should contain fields:
     * 
     * int $Balance;
     * string $Nickname;
     * string $Password;
     * bool $IsAuthorized;
     * bool $IsProviderDataExist;
     * 
     * all required fields will be checked
     */

    public function __construct(stdClass $data) 
    {

        $this -> _isProviderDataExists = $data -> IsProviderDataExists;
        $this -> _nickname = $data -> Nickname;
        $this -> _password = $data -> Password;
        $this -> _isAuthorized = $data -> IsAuthorized;
        $this -> _balance = $data -> Balance;

    }

    public function GetPassword():string {
        return $this -> _password;
    }

    public function GetIsProviderDataExist():bool {
        return $this -> _isProviderDataExists;
    }

    public function GetIsAuthorized():bool {
        return $this -> _isAuthorized;
    }

    public function GetBalance():int {
        return $this -> _balance;
    }

    public function GetNickName():string {
        return $this -> _nickname;
    }

}