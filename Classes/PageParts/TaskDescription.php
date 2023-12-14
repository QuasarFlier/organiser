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
        $dateFromDB = $this -> _database -> GetTaskDate($taskID);
        $taskDescriptionHtml = <<< TASK_DESCRIPTION
            <div class="description">
                <h2>Название задачи: $nameFromDB</h2>
                <br>
                <h3>Описание задачи:</h3>
                <h4>$descriptionFromDB</h4>
                <h3>Сроки выполнения: $dateFromDB</h3>
            </div>
        TASK_DESCRIPTION;

        echo $taskDescriptionHtml;
    }
}