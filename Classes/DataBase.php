<?php

namespace Classes;


use SQLite3;
use Classes\Deck;
use SQLite3Result;

class DataBase {

    public const DATABASE_FILE = "db.sqlite";

    private SQLite3 $_sqlite3;

    public function __construct()
    {
        $this -> _sqlite3 = new SQLite3(self::DATABASE_FILE, SQLITE3_OPEN_READWRITE);
    }

    public function __destruct()
    {
        $this -> _sqlite3 -> close();
    }


    public function ExecuteInstallQuery(string $query):bool {
        return $this -> _sqlite3 -> exec($query);
    }

    public function AuthorizeUser($userName, $userHash):bool {
        $query = <<<AUTH_QUERY
        SELECT a.UserName, p.Balance
        FROM Auth AS a, Profile AS p
        WHERE p.AuthID = a.ID AND a.UserName="$userName" AND a.UserHash="$userHash";
        AUTH_QUERY;

        $result = $this -> _sqlite3 -> query($query);
        $resultArray = $result -> fetchArray(SQLITE3_ASSOC);
        //var_dump($result);
        //var_dump($result1);
        return $resultArray !== false;
    }

    public function GetBalance($userName):int {
        $query = <<<BALANCE_QUERY
        SELECT a.UserName, p.Balance
        FROM Auth AS a, Profile AS p
        WHERE p.AuthID = a.ID AND a.UserName="$userName";
        BALANCE_QUERY;

        $result = $this -> _sqlite3 -> query($query);
        $resultArray = $result -> fetchArray(SQLITE3_ASSOC);
        return $resultArray["Balance"];
    }

    public function GetTaskNumber():int {
        $query = <<<TASK_NUMBER_QUERY
        SELECT COUNT(*)
        FROM Tasks
        TASK_NUMBER_QUERY;

        $result = $this -> _sqlite3 -> query($query);
        $row = $result -> fetchArray(SQLITE3_ASSOC);
        $total = $row["COUNT(*)"];
        return $total;
    }

    public function GetTaskName($ID):string {
        $query = <<<TASK_NAME_QUERY
        SELECT Name
        FROM Tasks
        WHERE ID="$ID"
        TASK_NAME_QUERY;

        $result = $this -> _sqlite3 -> query($query);
        $resultArray = $result -> fetchArray(SQLITE3_ASSOC);
        return $resultArray["Name"];
    }

    public function GetTaskDescription($ID):string {
        $query = <<<TASK_DESCRIPTION_QUERY
        SELECT Description
        FROM Tasks
        WHERE ID="$ID"
        TASK_DESCRIPTION_QUERY;

        $result = $this -> _sqlite3 -> query($query);
        $resultArray = $result -> fetchArray(SQLITE3_ASSOC);
        return $resultArray["Description"];
    }

    public function GetTaskDate($ID) {
        $query = <<<TASK_DESCRIPTION_QUERY
        SELECT Date
        FROM Tasks
        WHERE ID="$ID"
        TASK_DESCRIPTION_QUERY;

        $result = $this -> _sqlite3 -> query($query);
        $resultArray = $result -> fetchArray(SQLITE3_ASSOC);
        return $resultArray["Date"];
    }
}