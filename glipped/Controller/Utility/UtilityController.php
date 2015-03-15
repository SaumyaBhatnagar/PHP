<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
include_once("../../Model/DBConnection/Enum_Model.php");
include_once("../../Model/DBConnection/DbModel.php");
include_once( "../../Model/User/LoginModel.php");
include_once( "../../Model/Utility/Utility.php");
include_once( "../../Model/Email/Email.php");
switch($_REQUEST['ACTION']){
    case "USERVARIFY":
        $Data = $_REQUEST['DATA'];
        $Data = str_replace('\\','', $Data);
        $obj = json_decode($Data);
        $LOGINID = $_REQUEST['LOGINID'];
        LoginModel::Update($obj->usertype, "UserType", $LOGINID);
        LoginModel::Update(UserAccountStatus::ACTIVATE, "AccountStatus", $LOGINID);
        UserAddress::SaveAddress($LOGINID, "PARMANENT", $obj->add1, $obj->add2, $obj->location, $obj->city, $obj->country, $obj->zipcode, $obj->contact);
        echo json_encode($obj->usertype);
        break;
    case "CHANGEPASSWORD":
        $Data = $_REQUEST['DATA'];
        $Data = str_replace('\\','', $Data);
        $obj = json_decode($Data);
        $RESPONSE = LoginModel::Update($obj,"Password");
        echo json_encode($RESPONSE);
        break;
    case "GETCITY":
        $RESPONSE = Utility::GetCity($_REQUEST['COUNTRYID']);
        echo json_encode($RESPONSE);
        break;
}
?>
