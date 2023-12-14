<?php

namespace Classes\PageParts;

require_once "Classes/DataBase.php";

use Classes\DataBase;

class NewTaskForm {

    private DataBase $dataBase;

    public function EchoNewTaskForm():void {
        $taskFormHtml = <<<NEW_TASK_FORM
        <form action="NewTask.php" method="get">
            Название задачи: <input type="text" name="newTask"><br>
            Текст задачи: <input type="text" name="description"><br>
            <input type="submit" value="Добавить задачу">
        </form>
        NEW_TASK_FORM;

        echo $taskFormHtml;
    }

    public function CreateTask($taskName, $taskDescription):void {
        $addTaksDataQuery = <<<ADD_TASK_DATA_QUERY
            INSERT INTO Tasks(Name, Description)
                VALUES ("$taskName", "$taskDescription")
        ADD_TASK_DATA_QUERY;

        $this -> ExecuteAddTableRowQuery($addTaksDataQuery, "Tasks", "Task");
    
    } 

    public function ExecuteAddTableRowQuery(string $query, string $tableName, string $description):void {
        echo "[$description] info adding on [$tableName] table on database: ";
        if (!isset($this -> dataBase)){
            $this -> dataBase = new DataBase();
        }
        $this -> dataBase -> ExecuteInstallQuery($query);
        
        echo "[$tableName] info added => check <br>";
        
    }

    public function AddNewTask():void {
        if (!isset($_GET["newTask"])) {
            return;
        }
        $taskName = $_GET["newTask"];
        $taskDescription = $_GET["description"];
        $this -> CreateTask($taskName, $taskDescription);
    }

}