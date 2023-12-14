<?php 

namespace Classes\PageParts;

require_once 'Classes/Profile.php';
require_once 'Classes/PageParts/PagePartsBase.php';

use Classes\Profile;

class Menu extends PagePartsBase {

    public function __construct(Profile $profile)
    {
        parent::__construct($profile);
    }


    public function EchoHeader():void {
        if (!$this -> _IsAuthorized) {
            return;
        }
        //add styles there
    }

    public function EchoMenu():void {

        if (!$this -> _IsAuthorized) {
            return;
        }

        $menuHtml = <<< MENU
        <br>
        <table class="menu">
            <td><a href="../newGame.php"><button>New game</button></a></td>
            <td><a href="../lobby.php"><button>Lobby</button></a></td>
            <td><a href="../index.php"><button>Relogin</button></a></td>
            <td><div>Balance: $this->_balance Neut</div></td>
            <td><div>Authorized as $this->_nickname</div></td>
        </table>
        MENU;

        echo $menuHtml;
    }
}


?>