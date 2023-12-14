<?php

namespace Classes\PageParts;

require_once "Classes/DataBase.php";

use Classes\DataBase;

class NewTaskForm {

    private DataBase $dataBase;

    public function EchoNewTaskForm():void {
        $taskFormHtml = <<<NEW_TASK_FORM
        <form action="NewTask.php" method="get">
            Название задачи: <input type="text" name="newTask" style="heigth: 30px; width 150px"><br><br><br>
            Текст задачи: <input type="text" name="description" style="height: 250px; width: 400px"><br><br><br>
            Срок задачи: <input type="date" name="deadline"><br><br><br>
            <input type="submit" value="Добавить задачу" class="submit-button">
        </form>
        NEW_TASK_FORM;

        echo $taskFormHtml;
    }

    public function CreateTask($taskName, $taskDescription, $taskDeadline):void {
        $addTaksDataQuery = <<<ADD_TASK_DATA_QUERY
            INSERT INTO Tasks(Name, Description, Date)
                VALUES ("$taskName", "$taskDescription", "$taskDeadline")
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
        $taskDeadline = $_GET["deadline"];
        $this -> CreateTask($taskName, $taskDescription, $taskDeadline);
    }

}