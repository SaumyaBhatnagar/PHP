<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
define('DOC_ROOT',$_SERVER['DOCUMENT_ROOT']);
define('SITE_ROOT',DOC_ROOT.'glipped');
define('ROOT',"/glipped/");
define('SITEPATH','http://'.$_SERVER['HTTP_HOST'].'/glipped/');
define('WEBINDEX','View/web/index.php');
define('WEBDIR','View/web');
define('DASHBOARD_DIR','View/dashboard');
define('DASHBOARD','View/dashboard/index.php');
define("VERIFY", DASHBOARD_DIR."/varifyuser.php");
define("LOGOUT", DASHBOARD_DIR."/logout.php");
define("MODEL", SITEPATH."/Model/");
define("CONTROLLER", SITEPATH."/Controller/");

function getpage($PageName)
{
    switch($PageName)
    {
        case "verify":
            return VERIFY;
            break;
        case "logout":
            return LOGOUT;
            break;
        default :
            return WEBINDEX;
            break;
    }
    return WEBINDEX;
}