<?php

namespace Classes;

use Classes\DataProviders\BaseDataProvider;

class Profile {

    private int $_balance = 0;

    private string $_nickname;

    private bool $_IsAuthorized;

    private bool $_isProviderDataExists;

    private string $_password;

    /**
     * @param BaseDataProvider $dataProvider
     * 
     * $dataProvider is FormDataProvider or SessionDataProvider
     */

    public function __construct(BaseDataProvider $dataProvider) 
    {
        $this -> _isProviderDataExists = $dataProvider -> GetIsProviderDataExist();
        $this -> _nickname = $dataProvider -> GetNickName();
        $this -> _password = $dataProvider -> GetPassword();
        $this -> _IsAuthorized = $dataProvider -> GetIsAuthorized();
        $this -> _balance = $dataProvider -> GetBalance();

    }

    public function GetPassword():string {
        return $this -> _password;
    }

    public function GetIsFormDataExist():bool {
        return $this -> _isProviderDataExists;
    }

    public function GetIsAuthorized():bool {
        return $this -> _IsAuthorized;
    }

    public function GetBalance():int {
        return $this -> _balance;
    }

    public function GetNickName():string {
        return $this -> _nickname;
    }
}