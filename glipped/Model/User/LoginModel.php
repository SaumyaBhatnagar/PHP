<?php
include '../../Model/Utility/Utility.php';
class LoginModel
{
    public $tablename = "login";
	public $login_field = array("LoginId"=>"","UserName"=>"","Email"=>"","Password"=>"","UserType"=>"","AccountStatus"=>"","JoiningDate"=>"","Address"=>array());
    
	public static function Save($Data)
	{
            $name = $Data->fname." ".$Data->lname;
		$Query = "insert into t_login (UserName, Email, Password, UserType, AccountStatus, JoiningDate) values"
			."('".$name." ','".$Data->Email."','".$Data->Password."','','".UserAccountStatus::CONFIRMATION."','".date('Y-m-d h:i:sa')."');";
		return DBConnection::InsertQuery($Query);
	}
	public static function Update($value,$coulmnname,$loginid)
	{
		$Query = "update t_login set ";
		switch($coulmnname)
		{
			case "UserName":
				$Query = $Query." UserName = '".$value."' ";
			    break;
			case "Password":
				$Query = $Query." Password = '".$value."' ";
				break;
			case "UserType":
				$Query = $Query." UserType = '".$value."' ";
				break;
			case "AccountStatus":
				$Query = $Query." AccountStatus = '".$value."' ";
				break;
		}
		$Query = $Query." where LoginId = ".$loginid."";
		return DBConnection::UpdateQuery($Query);
	}
	public static function CheckLogin($login_field)
	{
		$Query = "select * from t_login where Email = '".$login_field->Email."' and Password = '".$login_field->Password."'";
		$Result = DBConnection::SelectQuery($Query);
		$Data = self::FillUser($Result);
		if($Data != null)
		{
                    session_start();	
                    $_SESSION['LoginId']= $Data[0]->LoginId;
                    $_SESSION['UserName']= $Data[0]->UserName;
                    $_SESSION['Email']= $Data[0]->Email;
                    $_SESSION['UserType']= $Data[0]->UserType;
                    return $Data;
		}
	}
        public static function CheckUserEmailExist($Email)
        {
            $Query = "select count(*) as usernumber from t_login where Email = '".$value."'";
            $Result = DBConnection::SelectQuery($Query);
            $Row = mysql_fetch_array($Result,MYSQL_ASSOC);
            if($Row['usernumber'] > 0)
            {
                return true;
            }
            else{
                return false;
            }
        }
	public static function GetUser($tag,$value)
	{
		$Query = "";
		switch($tag)
		{
			case "EMAIL":
				$Query = "select * from t_login where Email = '".$value."'";
			break;
			case "LOGINID":
				$Query = "select * from t_login where LoginId = ".$value;
			break;
			case "ALL":
                            $Query = "select * from t_login where AccountStatus = 'ACTIVATE';";
			break;
			default:
			break;
		}
		$Result = DBConnection::SelectQuery($Query);
		$Data = self::FillUser($Result);
		if($Data != null)
		{
			return $Data;
		}
	}
	public static function FillUser($Result)
	{
		$Row = mysql_fetch_array($Result,MYSQL_ASSOC);
                //$user_field = array("LoginId"=>"","UserName"=>"","Email"=>"","Password"=>"","UserType"=>"","AccountStatus"=>"","JoiningDate"=>"","Address"=>array(),"Profile"=>array());
		if($Row['LoginId'] > 0 && $Row['Email'] != "")
		{
			$user_field[0]->LoginId = $Row['LoginId'];
			$user_field[0]->UserName = $Row['UserName'];
			$user_field[0]->Email = $Row['Email'];
			$user_field[0]->UserType = $Row['UserType'];
			$user_field[0]->AccountStatus = $Row['AccountStatus'];
			$user_field[0]->JoiningDate = $Row['JoiningDate'];
                        $user_field[0]->Address = UserAddress::GetAddress($Row['LoginId'],"");
                        if($Row['UserType'] == "VOLUNTEER")
                        {
                            $user_field[0]->Profile = self::GetVolunteerProfile($Row['LoginId']);
                        }
                         else if($Row['UserType'] == "NGO" || $Row['UserType'] == "COMPANY"){
                            $user_field[0]->Profile = self::GetNGOCompanyProfile($Row['LoginId']);
                        }
			return $user_field;
		}
		else{
		   return null;	
		}
	}
        
        public static function SaveNGOCompanyProfile($UserId,$About,$ImagePath,$Causesid)
        {
            $Query = "insert into t_ngo_company (UserId, About, ProfilePicturePath, CausesId, Rank) values "
                    . "($UserId,'$About','$ImagePath',$Causesid,0);";
            return DBConnection::InsertQuery($Query);
        }
        public static function UpdateNGOCompanyProfile($UserId,$About,$ImagePath,$Causesid)
        {
            $Query = "update t_ngo_company set About = '$About', ProfilePicturePath = '$ImagePath',"
                    . " CausesId = $Causesid where UserId = $UserId;";
            return DBConnection::UpdateQuery($Query);
        }
        public static function UpdateVolunteerProfile($UserId,$About,$ImagePath,$Causesid,$work,$workplacename)
        {
            $Query = "update t_volunteer set About = '$About', CausesId = $Causesid, WorkProfile = '$work', WorkPlaceName = '$workplacename', ProfilePicturePath = '$ImagePath' where UserId = $UserId;";
            
            return DBConnection::UpdateQuery($Query);
        }
        
        public static function GetNGOCompanyProfile($UserId)
        {
            $Query = "select * from t_ngo_company where UserId = $UserId";
            $result = DBConnection::SelectQuery($Query);
            $counter = 0;
            if(mysql_num_rows($result) > 0)
            {
                while($row = mysql_fetch_row($result))
                {
                    $data[$counter] = array('UserId'=>$row[0],'About'=>$row[1],'ProfilePicturePath'=>$row[2],
                        'CausesId'=>$row[3],'Rank'=>$row[4]);
                    $counter++;
                }
                return $data;
            }
        }
        public static function GetVolunteerProfile($UserId)
        {
            $Query = "select * from t_volunteer where UserId = $UserId";
            $result = DBConnection::SelectQuery($Query);
            $counter = 0;
            if(mysql_num_rows($result) > 0)
            {
                while($row = mysql_fetch_row($result))
                {
                    $data[$counter] = array('UserId'=>$row[0],'About'=>$row[1],'CausesId'=>$row[2],
                        'WorkProfile'=>$row[3],'WorkPlaceName'=>$row[4],'ProfilePicturePath'=>$row[5],
                        'Rank'=>$row[6]);
                    $counter++;
                }
                return $data;
            }
        }
        public static function AutoFill()
        {
            $Query = "select LoginId, UserName from t_login where AccountStatus = 'ACTIVATE';";
            $result = DBConnection::SelectQuery($Query);
            $counter = 0;
            if(mysql_num_rows($result) > 0)
            {
                while($row = mysql_fetch_row($result))
                {
                    $data[$counter] = array('LoginId'=>$row[0],'UserName'=>$row[1]);
                    $counter++;
                }
                return $data;
            }
        }
}
class UserAddress
{
    public static function SaveAddress($UserId,$AddressType,$AddressLineOne,$AddressLineTwo,$Location,$CityId,$CountryId,$Zipcode,$ContactNumber)
    {
        $Query = "insert into t_address (UserId, AddressType, AddressLineOne, AddressLineTwo, Location, CityId,"
                . " CountryId, Zipcode, ContactNumber) VALUES ($UserId,'$AddressType','$AddressLineOne','$AddressLineTwo','$Location',$CityId,$CountryId,$Zipcode,'$ContactNumber')";
        return DBConnection::InsertQuery($Query);
    }
    public static function UpdateAddress($UserId,$AddressType,$AddressLineOne,$AddressLineTwo,$Location,$CityId,$CountryId,$Zipcode,$ContactNumber)
    {
        $Query = "update t_address set AddressLineOne = '$AddressLineOne', AddressLineTwo = '$AddressLineTwo', Location = '$Location', CityId = $CityId
, CountryId = $CountryId, Zipcode = $Zipcode, ContactNumber = '$ContactNumber' where UserId = $UserId AND AddressType = '$AddressType'";
        return DBConnection::UpdateQuery($Query);
    }
    public static function GetAddress($UserId,$AddressType)
    {
        $Query = "";
        if($AddressType == "")
        {
            $Query = "select ad.*,cut.CountryName,ct.CityName from t_address as ad
inner join t_country as cut on ad.CountryId = cut.CountryId
inner join t_city as ct on ad.CityId = ct.CityID  where ad.UserId = $UserId;";
        }
        else
        {
            $Query = "select ad.*,cut.CountryName,ct.CityName from t_address as ad
inner join t_country as cut on ad.CountryId = cut.CountryId
inner join t_city as ct on ad.CityId = ct.CityID  where ad.UserId = $UserId AND ad.AddressType = '$AddressType';";
        }
        $result = DBConnection::SelectQuery($Query);
        $counter = 0;
	if(mysql_num_rows($result) > 0)
	{
            while($row = mysql_fetch_row($result))
            {
                $data[$counter] = array('UserId'=>$row[0],'AddressType'=>$row[1],'AddressLineOne'=>$row[2],
                    'AddressLineTwo'=>$row[3],'Location'=>$row[4],'CityId'=>$row[5], 'CountryId'=>$row[6], 'Zipcode'=>$row[7],
                    'ContactNumber'=>$row[8],'CountryName'=>$row[9],'CityName'=>$row[10]);
                $counter++;
            }
            return $data;
	}
    }
    public static function DeleteAddress($UserId,$AddressType)
    {
        $Query = "delete from t_address where UserId = $UserId AND AddressType = '$AddressType';";
        return DBConnection::InsertQuery($Query);
    }
}