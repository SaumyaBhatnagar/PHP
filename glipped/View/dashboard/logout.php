<?php include_once '../../Config.php';
session_start();
$_SESSION['UserName'] = "";
$_SESSION['LoginId']= "";
$_SESSION['Email']= "";
$_SESSION['UserType']= "";
header("location:".SITEPATH);?>