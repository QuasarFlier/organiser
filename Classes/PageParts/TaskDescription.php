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
        if (!isset($_GET["task"])) {
            $this -> _database -> DefaultDescription();
            return;
        }
        $taskID = $this -> GetTaskID();
        $descriptionFromDB = $this-> _database -> GetTaskDescription($taskID);
        
        $nameFromDB = $this -> _database -> GetTaskName($taskID);
        $dateFromDB = $this -> _database -> GetTaskDate($taskID);
        $taskDescriptionHtml = <<< TASK_DESCRIPTION
            <div class="output-container-item">
                <h2>Название задачи: $nameFromDB</h2>
            </div>
            <div class="output-container-item task-list">
                <h1>Описание задачи:</h1>
                <p class="main-text">$descriptionFromDB</p>
                <p class="main-text">Сроки выполнения: $dateFromDB</p>
            </div>
        TASK_DESCRIPTION;

        echo $taskDescriptionHtml;
    }
}