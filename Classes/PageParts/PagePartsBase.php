<?php

namespace Classes\PageParts;

use Classes\Profile;

class PagePartsBase {

    protected int $_balance = 0;

    protected string $_nickname;

    protected string $_password;

    protected bool $_IsAuthorized;

    protected bool $_IsFormDataExist;

    public function __construct(Profile $profile)
    {
        $this -> _nickname = $profile -> GetNickName();
        $this -> _balance = $profile -> GetBalance();
        $this -> _IsAuthorized = $profile -> GetIsAuthorized();
        $this -> _IsFormDataExist = $profile -> GetIsFormDataExist();
        $this -> _password = $profile -> GetPassword();
    }


    public function EchoHeader():void {
        return;
    }
}