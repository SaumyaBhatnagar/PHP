<?php

class EventModel{
    public $tablename = "t_event";
    public $Event_OBJ = array("EventId"=>"","UserId"=>"","EventTitle"=>"","EventDescription"=>"",
        "EventStartDate"=>"","EventEndDate"=>"","EventCreateDate"=>"","EventLocation"=>"","EventStatus"=>"","EventAttand"=>"");
    
    public static function Save($UserId, $EventTitle, $EventDescription, $EventStartDate, $EventEndDate, $EventLocation){
        $Query = "insert into t_event (UserId, EventTitle, EventDescription, EventStartDate, EventEndDate, EventCreateDate, EventLocation, EventStatus) values ($UserId, '$EventTitle', '$EventDescription', '$EventStartDate', '$EventEndDate', '".date('Y-m-d H:i:s')."', '$EventLocation', 'OPEN');";
        //echo $Query;
        return DBConnection::InsertQuery($Query);
    }
    public static function Update($EventId,$UserId, $EventTitle, $EventDescription, $EventStartDate, $EventEndDate, $EventLocation,$EventStatus){
        $Query = "update t_event set UserId = $UserId, EventTitle = '$EventTitle', EventDescription = '$EventDescription',"
                . " EventStartDate = '$EventStartDate', EventEndDate = '$EventEndDate', EventLocation = '$EventLocation'"
                . ", EventStatus = '$EventStatus' where EventId = $EventId;";
        //echo $Query;
        return DBConnection::UpdateQuery($Query);
    }
    public static function GetEvent($EventId)
    {
        $Query = "";
        if($EventId > 0){
            $Query = "select * from t_event where EventId = $EventId AND EventStatus = 'OPEN' ORDER BY EventId DESC";
        }
        else{
            $Query = "select * from t_event where EventStatus = 'OPEN' ORDER BY EventId DESC";
        }
        $result = DBConnection::SelectQuery($Query);
        return self::FillEventData($result);
    }
    public static function GetUserEvent($UserId)
    {
        $Query = "select * from t_event where UserId = $UserId AND EventStatus = 'OPEN' ORDER BY EventId DESC";
        $result = DBConnection::SelectQuery($Query);
        return self::FillEventData($result);
    }
    public static function FillEventData($result)
    {
        $counter = 0;
        if(mysql_num_rows($result) > 0)
        {
            while($row = mysql_fetch_row($result))
            {
                $data[$counter] = array('EventId'=>$row[0],'User'=>LoginModel::GetUser("LOGINID", $row[1]),'EventTitle'=>$row[2],
                    'EventDescription'=>$row[3],'EventStartDate'=>$row[4],'EventEndDate'=>$row[5],'EventCreateDate'=>$row[6],
                    'EventLocation'=>$row[7],'EventStatus'=>$row[8],"EventAttand"=>EventAttand::GetEventtAttandStatus($row[0]));
                $counter++;
            }
            return $data;
        }
    }
}

class EventAttand{
    public $tablename = "t_event_joining_details";
    public $Event_OBJ = array("EventID"=>"","UserID"=>"","JoinStatus"=>"");
    
    public static function Save($EventID, $UserID, $JoinStatus){
        $Query = "insert into t_event_joining_details (EventID, UserID, JoinStatus) values ($EventID,$UserID, '$JoinStatus');";
        //echo $Query;
        return DBConnection::InsertQuery($Query);
    }
    public static function Update($EventID, $UserID, $JoinStatus){
        $Query = "update t_event_joining_details set JoinStatus = '$JoinStatus' where EventID = $EventID AND UserID = $UserID;";
        //echo $Query;
        return DBConnection::UpdateQuery($Query);
    }
    public static function GetEventtAttandStatus($EventID)
    {
        $Query = "select * from t_event_joining_details where EventID = $EventID";
        $result = DBConnection::SelectQuery($Query);
        $counter = 0;
        if(mysql_num_rows($result) > 0)
        {
            while($row = mysql_fetch_row($result))
            {
                $data[$counter] = array('EventID'=>$row[0],'UserID'=>$row[1],'JoinStatus'=>$row[2]);
                $counter++;
            }
            return $data;
        }
    }
}