<?php 

namespace Classes\DataProviders;

class DatabaseDataProvider{
    
    private int $_profileBalance = 0;

    public function GetProfileBalance(): int {
        return $this -> _profileBalance;
    }

}