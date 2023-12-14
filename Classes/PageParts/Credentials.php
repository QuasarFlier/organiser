<?php

namespace Classes\PageParts;

require_once 'Classes/Profile.php';
require_once 'Classes/PageParts/PagePartsBase.php';

use Classes\Profile;

class Credentials extends PagePartsBase {

    public function __construct(Profile $profile)
    {
        parent::__construct($profile);
    }

    public function EchoCredentials():void {

        if ($this -> _IsAuthorized || !$this -> _IsFormDataExist) {
            return;
        }

        $credentialsHtml = <<<CREDENTIALS
        <br>
        "Hi Mr. $this->_nickname, your password is $this->_password"
        CREDENTIALS;

        echo $credentialsHtml;
    }




    
}