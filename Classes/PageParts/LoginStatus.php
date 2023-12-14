<?php

namespace Classes\PageParts;

require_once 'Classes/Profile.php';
require_once 'Classes/PageParts/PagePartsBase.php';

use Classes\Profile;

class LoginStatus extends PagePartsBase {

    public function __construct(Profile $profile)
    {
        parent::__construct($profile);
    }

    public function EchoLoginStatus():void {

        if (!$this -> _IsFormDataExist) {
            return;
        }

        $loginStatusText = $this -> _IsAuthorized ? "Logged in successfully" : "Login failed";

        echo <<<LOGIN_STATUS
            <h1>$loginStatusText</h1>
        LOGIN_STATUS;
    }

    public function EchoReloginButton():void {

        if (!$this -> _IsFormDataExist || $this -> _IsAuthorized) {
            return;
        }

        echo <<<RELOGIN_BUTTON
            <br>
            <a href="/index.php"><button>Relogin</button></a>
        RELOGIN_BUTTON;
    }
}



