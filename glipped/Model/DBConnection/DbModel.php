<?php
 class DBConnection {
	public $DbObject;
	public $Database;
	public static function GetDatabaseObject()
	{
		$DbObject = mysql_connect(DB_DETAILS::PC_NAME,DB_DETAILS::USER_NAME,DB_DETAILS::PASSWORD);
		$Database = mysql_select_db(DB_DETAILS::DATABASE_NAME,$DbObject);
		return $DbObject;
	}
	public static function CloseObject($DbObject)
	{
		mysql_close($DbObject);
		return $DbObject;
	}
	public static function ExecuteQuery($DbObject,$Query)
	{
		$Result = mysql_query($Query,$DbObject);
		return $Result;
	}
	public static function InsertQuery($Query){
		//echo($Query);
		  $Result = "" ;
          try{	
			$DbObject = mysql_connect(DB_DETAILS::PC_NAME,DB_DETAILS::USER_NAME,DB_DETAILS::PASSWORD) or die("Unable to connect to MySQL");
			$Db_Name = mysql_select_db(DB_DETAILS::DATABASE_NAME,$DbObject) or die("Could not select database");
			$Result = mysql_query($Query,$DbObject);
			$insert_id = mysql_insert_id($DbObject);
			mysql_close($DbObject);
			if(!$Result)
		    {
			  die('Could not enter data: ' . mysql_error());
			  return QueryResponse::ERROR;
			}
			else
			{
                return $insert_id;
			}
		  } catch (Exception $ex) {
            //echo "in catch" . $ex ;
            //exit();
			mysql_close($DbObject);
              
		  }
	}
	public static function SelectQuery($Query){
		  $Result = "" ;
          try{	
		  $My_Sql = mysql_connect(DB_DETAILS::PC_NAME,DB_DETAILS::USER_NAME,DB_DETAILS::PASSWORD) or die(" Unable to connect toMySQL");
			$Db_Name = mysql_select_db(DB_DETAILS::DATABASE_NAME,$My_Sql) or die("Could not select database");
		  
			$Result = mysql_query($Query,$My_Sql);
			mysql_close($My_Sql);
			if(!$Result)
		    {
			  die('Could not select data: ' . mysql_error());
			  return QueryResponse::ERROR;
			}
			else
			{
			  return $Result;
			}
		  } catch (Exception $ex) {
		  	mysql_close($My_Sql);
		  }
	}
    public static function UpdateQuery($Query){
		  $Result = "" ;
		  $My_Sql = mysql_connect(DB_DETAILS::PC_NAME,DB_DETAILS::USER_NAME,DB_DETAILS::PASSWORD) or die("Unable to connect to MySQL");
		  $Db_Name = mysql_select_db(DB_DETAILS::DATABASE_NAME,$My_Sql) or die("Could not select examples");
		  try{	
			$Result = mysql_query($Query,$My_Sql);
			mysql_close($My_Sql);
			if(!$Result)
	        {
	      	  die('Could not update data: ' . mysql_error());
		  	  return QueryResponse::ERROR;
		    }
		    else
		    {
		  	  return QueryResponse::SUCCESS;
		    }
		  } 
		  catch (Exception $ex) {
		  	mysql_close($My_Sql);
		  }
	}
    public static function DeleteQuery($Query){
        $Result = "" ;
        $My_Sql = mysql_connect(DB_DETAILS::PC_NAME,DB_DETAILS::USER_NAME,DB_DETAILS::PASSWORD) or die("Unable to connect to MySQL");
        $Db_Name = mysql_select_db(DB_DETAILS::DATABASE_NAME,$My_Sql) or die("Could not select examples");
        try{	
			$Result = mysql_query($Query,$My_Sql);
			mysql_close($My_Sql);
			if(!$Result)
	        {
	      	  die('Could not update data: ' . mysql_error());
		  	  return QueryResponse::ERROR;
		    }
		    else
		    {
		  	  return QueryResponse::SUCCESS;
		    }
        } 
        catch (Exception $ex) {
            mysql_close($My_Sql);
        }
	}
}
?>