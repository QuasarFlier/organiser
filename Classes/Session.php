<?php 

namespace Classes;

require_once 'Classes/DataProviders/BaseDataProvider.php';

use Classes\DataProviders\BaseDataProvider;
use Classes\DataProviders\SessionDataProvider;

class Session {
    
    public const NickNameValue = "NickName";
    public const BalanceValue = "Balance";
    public const IsAuthorizedValue = "IsAuthorized";
    public const DataProviderDataStructure = "DataProviderData";
    //public const TableNumberValue = "TableNumber";
    public const TableHashValue = "TableHash";
    public const GameIdValue = "GameId";
    public const SessionDataProviderDataStructure = "SessionDataProviderData";

    static function SetDataProvidersData(BaseDataProvider $dataProvider):void {
        $dataProviderData = array(
            self::NickNameValue => $dataProvider -> GetNickName(),
            self::BalanceValue => $dataProvider -> GetBalance(),
            self::IsAuthorizedValue => $dataProvider -> GetIsAuthorized()
        );
        
        $_SESSION[self::DataProviderDataStructure] = $dataProviderData;
    }
    
    static function SetSessionDataProviderCustomData(SessionDataProvider $dataProvider):void {
        $dataProviderData = array(
            self::GameIdValue => $dataProvider -> GetGameId()
        );

        $_SESSION[self::SessionDataProviderDataStructure] = $dataProviderData;
    }
    
    static function GetSessionDataProvidersCustomData():array {
        
        if(!isset($_SESSION[self::SessionDataProviderDataStructure])){
            return array (
                self::GameIdValue => null,
            );
        }

        return $_SESSION[self::SessionDataProviderDataStructure];
    }

    static function GetDataProvidersData():array {
        
        if(!isset($_SESSION[self::DataProviderDataStructure])){
            throw new \Error("Unexpected session data not exists");
        }

        return $_SESSION[self::DataProviderDataStructure];
    }

    public static function SetTableHash(string $tableHash) {
        $dataProviderData = [];
        
        if(isset($_SESSION[self::SessionDataProviderDataStructure])) {
            $dataProviderData = $_SESSION[self::SessionDataProviderDataStructure];
        }

        $dataProviderData[self::TableHashValue] = $tableHash;

        $_SESSION[self::SessionDataProviderDataStructure] = $dataProviderData;
    }

    public static function SetCurrentGameId(?int $gameId) {
        $dataProviderData = [];
        
        if(isset($_SESSION[self::SessionDataProviderDataStructure])) {
            $dataProviderData = $_SESSION[self::SessionDataProviderDataStructure];
        }

        $dataProviderData[self::GameIdValue] = $gameId;

        $_SESSION[self::SessionDataProviderDataStructure] = $dataProviderData;
    }
}
