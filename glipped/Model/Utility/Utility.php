<?php
class Utility
{
    public static function GetCountry()
    {
        $Query = "select * from t_country";
        return DBConnection::SelectQuery($Query); 
    }
    public static function GetCountryName($CountryId)
    {
        $Query = "select CountryName from t_country where CountryId = $CountryId";
        $Result = DBConnection::SelectQuery($Query); 
        $Row = mysql_fetch_array($Result, MYSQL_ASSOC);
        return $Row["CountryName"];
    }
    public static function GetCity($CountryId)
    {
        $Query = "select * from t_city where CountryId = $CountryId";
        $result = DBConnection::SelectQuery($Query);
        $counter = 0;
	if(mysql_num_rows($result) > 0)
	{
            while($row = mysql_fetch_row($result))
            {
                $data[$counter] = array('CityId'=>$row[0],'CityName'=>$row[1],'CountryId'=>$row[2]);
                $counter++;
            }
            return $data;
	}
    }
    public static function GetCityName($CityId)
    {
        $Query = "select CityName from t_city where CityId = $CityId";
        $Result = DBConnection::SelectQuery($Query); 
        $Row = mysql_fetch_array($Result, MYSQL_ASSOC);
        return $Row["CityName"];
    }
    public static function GetCauses()
    {
        $Query = "select * from t_causes";
        return DBConnection::SelectQuery($Query); 
    }
}