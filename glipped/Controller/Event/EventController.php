<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
include_once("../../Model/DBConnection/Enum_Model.php");
include_once("../../Model/DBConnection/DbModel.php");
include_once( "../../Model/Event/EventModel.php");
include_once( "../../Model/User/LoginModel.php");
switch($_REQUEST['ACTION']){
    case "SAVE":
        $Data = $_REQUEST['DATA'];
        $Data = str_replace('\\','', $Data);
        $obj = json_decode($Data);
        EventModel::Save($obj->Event[0]->User[0]->UserId, $obj->Event[0]->EventTitle, $obj->Event[0]->EventDescription
                , $obj->Event[0]->EventStartDate, $obj->Event[0]->EventEndDate, $obj->Event[0]->EventCreateDate
                , $obj->Event[0]->EventLocation, $obj->Event[0]->EventStatus);
        echo json_encode("SUCCESS");
        break;
    case "UPDATE":
        $Data = $_REQUEST['DATA'];
        $Data = str_replace('\\','', $Data);
        $obj = json_decode($Data);
        EventModel::Save($obj->Event[0]->EventId,$obj->Event[0]->User[0]->UserId, $obj->Event[0]->EventTitle, $obj->Event[0]->EventDescription
                , $obj->Event[0]->EventStartDate, $obj->Event[0]->EventEndDate
                , $obj->Event[0]->EventLocation, $obj->Event[0]->EventStatus);
        echo json_encode("SUCCESS");
        break;
    case "GETEVENT":
        $RESPONSE = EventModel::GetEvent($_REQUEST['EVENTID']);
        echo json_encode($RESPONSE);
        break;
    case "GETUSEREVENT":
        $RESPONSE = EventModel::GetUserEvent($_REQUEST['EVENTID']);
        echo json_encode($RESPONSE);
        break;
}
?>
