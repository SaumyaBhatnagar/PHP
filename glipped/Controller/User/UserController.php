<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
error_reporting(E_ALL);
include_once("../../Model/DBConnection/Enum_Model.php");
include_once("../../Model/DBConnection/DbModel.php");
include_once( "../../Model/User/LoginModel.php");
include_once( "../../Model/Email/Email.php");
switch($_REQUEST['ACTION']){
    case "SIGNUP":
        $Data = $_REQUEST['DATA'];
        $Data = str_replace('\\','', $Data);
        $obj = json_decode($Data);
        if(LoginModel::CheckUserEmailExist($obj->Email))
        {
            echo "ALREADY";
        }
        else
        {
            $userid = LoginModel::Save($obj);
            $UDATA = LoginModel::GetUser("LOGINID", $userid);
            Email::SendVaricationMail($UDATA->UserName, $UDATA->Email, $UDATA->LoginId);
            echo json_encode($UDATA);
        }
        break;
    case "LOGIN":
        $Data = $_REQUEST['DATA'];
        $Data = str_replace('\\','', $Data);
        $obj = json_decode($Data);
        $UDATA = LoginModel::CheckLogin($obj);
        echo json_encode($UDATA);
        break;
    case "FORGOTPASSWORD":
        
        echo json_encode($Print);
        break;
    case "CHANGEPASSWORD":
        $Data = $_REQUEST['DATA'];
        $Data = str_replace('\\','', $Data);
        $obj = json_decode($Data);
        $RESPONSE = LoginModel::Update($obj,"Password");
        echo json_encode($RESPONSE);
        break;
    case "GETUSERPROFILE":
        $RESPONSE = LoginModel::GetUser("LOGINID",$_REQUEST['LOGINID']);
        echo json_encode($RESPONSE);
        break;
    case "AUTOUSER":
        $RESPONSE = LoginModel::AutoFill();
        echo json_encode($RESPONSE);
        break;
    case "UPDATEADDRESS":
        $Data = $_REQUEST['DATA'];
        $Data = str_replace('\\','', $Data);
        $obj = json_decode($Data);
        UserAddress::UpdateAddress($obj->Address[0]->UserId, "PARMANENT", $obj->Address[0]->AddressLineOne, $obj->Address[0]->AddressLineTwo, $obj->Address[0]->Location, $obj->Address[0]->CityId, $obj->Address[0]->CountryId, $obj->Address[0]->Zipcode, $obj->Address[0]->ContactNumber);
        $RESPONSE = LoginModel::GetUser("LOGINID",$obj->Address[0]->UserId);
        echo json_encode($RESPONSE);
        break;
    case "UPDATENGOCOMPANY":
        $Data = $_REQUEST['DATA'];
        $Data = str_replace('\\','', $Data);
        $obj = json_decode($Data);
        LoginModel::UpdateNGOCompanyProfile($obj->Profile[0]->UserId, $obj->Profile[0]->About, $obj->Profile[0]->ProfilePicturePath, $obj->Profile[0]->Causesid);
        $RESPONSE = LoginModel::GetUser("LOGINID",$obj->Address[0]->UserId);
        echo json_encode($RESPONSE);
        break;
    case "UPDATEVOLUNTEER":
        $Data = $_REQUEST['DATA'];
        $Data = str_replace('\\','', $Data);
        $obj = json_decode($Data);
        LoginModel::UpdateVolunteerProfile($obj->Profile[0]->UserId, $obj->Profile[0]->About, $obj->Profile[0]->ProfilePicturePath, $obj->Profile[0]->CausesId, $obj->Profile[0]->WorkProfile, $obj->Profile[0]->WorkPlaceName);
        $RESPONSE = LoginModel::GetUser("LOGINID",$obj->Address[0]->UserId);
        echo json_encode($RESPONSE);
        break;
}
?>
