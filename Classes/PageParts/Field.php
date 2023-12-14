<?php

namespace Classes\PageParts;

require_once 'Classes/DataBase.php';

use Classes\DataBase;

class Field {

    public int $taskNumber = 0;

    public int $taskID;

    public string $taskName;

    private DataBase $_database;

    public function __construct()
    {
        $this -> _database = new DataBase;
    }

    public function EchoTask($name, $id):void {
        $taskHtml = <<< TASK
        <label for="$name">$name</label>
        <input type="radio" id="$name" name="task" value="$id"><br>
        TASK;

        echo $taskHtml;
    }

    public function EchoField():void {
        $taskNumber = $this -> _database -> GetTaskNumber();
        for ($counter = 1; $counter <=$taskNumber; $counter++) {
            if (date("Y-m-d") < $this -> _database -> GetTaskDate($counter)) {
                $taskName = $this -> _database -> GetTaskName($counter);
                $this -> EchoTask($taskName, $counter);
            }
        }
    }

    
    
}