<?php
abstract class DateClass  {

    public static function xFormatDate($dte){
          $dateInput = explode('/',$dte);
          $ukDate = $dateInput[2].'-'.$dateInput[1].'-'.$dateInput[0];
          return $ukDate;
	}
    public static function xFormatDate1($dte){
          $dateInput = explode('-',$dte);
          $ukDate = $dateInput[2].'/'.$dateInput[1].'/'.$dateInput[0];
          return $ukDate;
	}
}

abstract class UserAccountStatus  {
    const ACTIVATE = "ACTIVATE";
    const DEACTIVATE = "DEACTIVATE";
    const CONFIRMATION = "CONFIRMATION";
    const BLOCK = "BLOCK";
}
abstract class QueryAction  {
    const INSERT = "INSERT";
    const UPDATE = "UPDATE";
    const SELECT = "SELECT";
    const DELETE = "DELETE";
    const PAGELOAD = "PAGELOAD";
    const AUTO_COMPLEAT = "AUTO_COMPLEAT";
    const SEARCH = "SEARCH";
}
abstract class QueryResponse  {

    const SUCCESS = "SUCCESS";
    const ERROR = "ERROR";
    const YES = "YES";
    const NO = "NO";
}
abstract class DB_DETAILS  {
    const PC_NAME = "localhost";
    const USER_NAME = "root";
    const PASSWORD = "";
    //const PASSWORD = "root1234";
    const DATABASE_NAME = "glipped";
    
}
?>
