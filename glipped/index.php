<?php
error_reporting(E_ALL);
	session_start();
	$_SESSION['UserName'] = array_key_exists('UserName', $_SESSION) ? $_SESSION['UserName'] : '';
	include('Config.php');
	if(isset($_GET['p']) && !empty($_GET['p']))
	{
		if($_GET['p'])
		{
			$page = getpage($_GET['p']);
			
			if(isset($_SESSION['UserName'])  && !empty($_SESSION['UserName']))
                        {
			header("Location:".DASHBOARD."?uid=".$_SESSION['LoginId']);
                        }
			else
                        {
                            //echo $page;
                            header("Location:".$page);
			//include($page);
                        }
		}	
	}
	else
	{	
            if(isset($_SESSION['UserName']) && !empty($_SESSION['UserName']))
			header("Location:".DASHBOARD."?uid=".$_SESSION['LoginId']);
			else
			include(WEBINDEX);
	}	
?>