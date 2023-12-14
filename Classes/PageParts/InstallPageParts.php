<?php

namespace Classes\PageParts;

require_once "Classes/PageParts/PagePartsBase.php";
require_once "Classes/DataBase.php";

use Classes\DataBase;
use Classes\PageParts\PagePartsBase;

class InstallPageParts extends PagePartsBase {

    private bool $_isFormDataExists;
    private DataBase $dataBase;


    public function __construct()
    {
        $this -> _isFormDataExists = isset($_GET["action"]);
    }

    public function EchoForm():void {
        echo <<<INSTALL_FORM
            <form action="" method="get">
                <input name="action" value="start" type="hidden">
                <input type="submit" value="reset">
            </form>
        INSTALL_FORM;
    }

    public function CreateDbFile():void {
        
        if (!$this -> _isFormDataExists) {
            return;
        }
        
        $fileName = DataBase::DATABASE_FILE;

        if (is_file($fileName)) {
        } else {
            echo "File $fileName not found => failed <br>";
            $file = fopen($fileName, "w");
            fclose($file);
        }
    } 

    public function CreateTaskTableOnDb():void {
        $query = <<<SQL_QUERY
            DROP TABLE IF EXISTS Tasks;
            CREATE TABLE Tasks (
                ID INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                Name VARCHAR,
                Description VARCHAR,
                Date DATETIME,
                State INTEGER DEFAULT 1
            )
        SQL_QUERY;

        $this -> ExecuteReCreateTableQuery($query, "Tasks");
    } 

    public function CreateTask($taskName, $taskDescription, $taskDeadline):void {
        $addTaksDataQuery = <<<ADD_TASK_DATA_QUERY
            INSERT INTO Tasks(Name, Description, Date)
                VALUES ("$taskName", "$taskDescription", "$taskDeadline")
        ADD_TASK_DATA_QUERY;

        $this -> ExecuteAddTableRowQuery($addTaksDataQuery, "Tasks", "Task");
    
    } 

    public function AddNewTask():void {
        $taskName = $_GET["newTask"];
        $taskDescription = $_GET["description"];
        $taskDeadline = $_GET["deadline"];
        $this -> CreateTask($taskName, $taskDescription, $taskDeadline);
    }

    public function CreateDefaultTask():void {
        $this -> CreateTask("Приветствуем", "Спасибо что пользуетесь нашим организатором задач!", "2024-01-01");
    }

    public function CreateTestTask():void {
        $this -> CreateTask("test", "test Спасибо что пользуетесь нашим организатором задач!", "2024-01-01");
    }

    public function CreateTest2Task():void {
        $this -> CreateTask("test2", "test2 Спасибо что пользуетесь нашим организатором задач!", "2024-01-01");
    }

    public function ExecuteReCreateTableQuery(string $query, string $tableName):void {

        if (!$this -> _isFormDataExists) {
            return;
        }
        
        if (!isset($this -> dataBase)){
            $this -> dataBase = new DataBase();
        }
        $this -> dataBase -> ExecuteInstallQuery($query);
        
        
    }

    public function ExecuteAddTableRowQuery(string $query, string $tableName, string $description):void {

        if (!$this -> _isFormDataExists) {
            return;
        }
        
        if (!isset($this -> dataBase)){
            $this -> dataBase = new DataBase();
        }
        $this -> dataBase -> ExecuteInstallQuery($query);
    
        
    }
    
}