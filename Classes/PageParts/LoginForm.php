<?php

namespace Classes\PageParts;

require_once 'Classes/Profile.php';
require_once 'Classes/PageParts/PagePartsBase.php';

use Classes\Profile;

class LoginForm extends PagePartsBase {

    public function __construct(Profile $profile)
    {
        parent::__construct($profile);
    }

    public function EchoLoginForm():void {

        if ($this -> _IsAuthorized || $this -> _IsFormDataExist) {
            return;
        }

        $LoginHtml = <<<LOGIN_FORM
        <br>
        <form action="index.php" method="get">
            Name: <input type="text" name="name"><br>
            Password: <input type="text" name="password"><br>
            <input type="submit" value="Submit">
        </form>
        LOGIN_FORM;

        echo $LoginHtml;
    }




    
}