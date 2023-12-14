<?php

namespace Classes\PageParts;

require_once 'Classes/DataBase.php';

use Classes\DataBase;

class TaskDescription {

    private DataBase $_database;

    public function __construct()
    {
        $this -> _database = new DataBase;
    }

    public function GetTaskID() {
        if(!isset($_GET["task"])) {
            return;
        }
        $taskID = $_GET["task"];
        return $taskID;
    }

    public function EchoTaskDescription():void {
        $taskID = $this -> GetTaskID();
        $descriptionFromDB = $this-> _database -> GetTaskDescription($taskID);
        $nameFromDB = $this -> _database -> GetTaskName($taskID);
        $taskDescriptionHtml = <<< TASK_DESCRIPTION
            <div class="description">
                <h2>$nameFromDB</h2>
                <br>
                <br>
                <h4>$descriptionFromDB</h4>
            </div>
        TASK_DESCRIPTION;

        echo $taskDescriptionHtml;
    }
}