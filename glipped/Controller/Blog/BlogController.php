<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
include_once("../../Model/DBConnection/Enum_Model.php");
include_once("../../Model/DBConnection/DbModel.php");
include_once( "../../Model/Blog/BlogModel.php");
include_once( "../../Model/User/LoginModel.php");
switch($_REQUEST['ACTION']){
    case "SAVEBLOG":
        if($_REQUEST['DATATYPE'] == "TEXT"){
            Blog::Save($_REQUEST['DATA'],$_REQUEST['USERID'],$_REQUEST['DATATYPE'],"");
        }
        else if($_REQUEST['DATATYPE'] == "VIDEO"){
            Blog::Save("",$_REQUEST['USERID'],$_REQUEST['DATATYPE'],$_REQUEST['DATA']);
        }
        else if($_REQUEST['DATATYPE'] == "IMAGE"){
            Blog::Save("",$_REQUEST['USERID'],$_REQUEST['DATATYPE'],$_REQUEST['DATA']);
        }
        $RESPONSE = Blog::GetUserBlog($_REQUEST['USERID']);
        echo json_encode($RESPONSE);
        break;
    case "GETBLOG":
        $RESPONSE = Blog::GetUserBlog($_REQUEST['USERID']);
        echo json_encode($RESPONSE);
        break;
}
?>
