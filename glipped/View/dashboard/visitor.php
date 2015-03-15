<?php include_once ("../../Config.php"); 
session_start();
if($_SESSION["UserName"] == "")
{
    header("Location:../../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo SITEPATH.DASHBOARD_DIR; ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo SITEPATH.DASHBOARD_DIR; ?>/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo SITEPATH.DASHBOARD_DIR; ?>/css/plugins/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo SITEPATH.DASHBOARD_DIR; ?>/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo SITEPATH.DASHBOARD_DIR; ?>/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo SITEPATH.DASHBOARD_DIR; ?>/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="<?php echo SITEPATH.WEBDIR; ?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo SITEPATH.WEBDIR; ?>/js/jquery.min.js"></script>
    
    <script type="text/javascript" src="<?php echo SITEPATH.WEBDIR; ?>/js_lib/angular.js"></script>
    <script type="text/javascript" src="<?php echo SITEPATH.WEBDIR; ?>/js_lib/popup_test.js"></script>
    <link rel="stylesheet" href="<?php echo SITEPATH.WEBDIR; ?>/css/popup_test.css" type="text/css">
    
    <script>
        var Visitor = angular.module('Visitor', []);
Visitor.controller('VisitorController', ['$scope', '$http', function VisitorController($scope, $http) {
    var profile = { Profile: [{ About: '', ProfilePicturePath: ''}] };
    
    $scope.init = function (VisitorId,UserId) {
        
        if(UserId > 0)
        {
            jQuery.ajax({
                url: "../../Controller/User/UserController.php",
                type: "POST",
                dataType:"json",
                data: { ACTION: "GETUSERPROFILE", LOGINID:UserId},
                success: function (jsondata) {
                    $scope.$apply(function () {
                        $scope.UserProfile = jsondata[0];
                    });
                }
            });
            jQuery.ajax({
                url: "../../Controller/User/UserController.php",
                type: "POST",
                dataType:"json",
                data: { ACTION: "GETUSERPROFILE", LOGINID:VisitorId},
                success: function (jsondata) {
                    $scope.$apply(function () {
                        $scope.Visitor = jsondata[0];
                        if($scope.Visitor.UserType == "VOLUNTEER")
                        {
                            $scope.Visitor.WorkShow = true;
                        }
                    });
                }
            });
            jQuery.ajax({
                url: "../../Controller/Blog/BlogController.php",
                type: "POST",
                dataType:"json",
                data: { ACTION: "GETBLOG", USERID:VisitorId},
                success: function (jsondata) {
                    $scope.$apply(function () {
                        $scope.Blog = jsondata;
                    });
                }
            });
        }
    }
} ]);
    </script>
</head>
<body ng-app="Visitor">
  <form name="form" id="form1" ng-controller="VisitorController" data-ng-init="init('<?php echo $_GET['uid'];?>','<?php echo $_SESSION['LoginId'];?>');">
    <div id="wrapper">

       <?php include_once ("menu.php");?>

         <div id="page-wrapper">
    
            <div class="row">
                <div class="col-lg-12">
                      <br/>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-8"  style="width: 75%;">
                    
                    <div class="panel ">
                        <div class="">
                            <div class="col-lg-8">
                                <div align="center">
                                    <img src="../dashboard/UserImage/{{Visitor.Profile[0].ProfilePicturePath}}" id="profilepicture" width="200px" height="200px" alt="User Avatar" class="img-circle" />
                                </div>
                                <div align="center" >
                                    <span style="font-weight: bold; font-size: 18px;" class="text-primary">{{Visitor.UserName}}</span>
                                        <br/>
                                        <strong class="text-primary">{{Visitor.Address[0].CountryName}}</strong>

                                </div>
                            </div>
                            <div class="col-lg-4" style="margin-top: 25px;">
                                <p>Email : {{Visitor.Email}}</p>
                                <p>Contact : {{Visitor.Address[0].ContactNumber}}</p>
                                <br>
                                <h4>Addresses</h4>
                                <address>
                                    <strong>{{Visitor.Address[0].AddressLineOne}},
                                    {{Visitor.Address[0].AddressLineTwo}}</strong>
                                    <br>{{Visitor.Address[0].Location}}, {{Visitor.Address[0].CityName}}
                                    <br>{{Visitor.Address[0].CountryName}}
                                    <br>{{Visitor.Address[0].Zipcode}}
                                </address>
                            </div>
                            
                        </div>
                    </div>
                </div>
               
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8"  style="width: 75%;">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-user fa-fw"></i> About
                        </div>
                        <div class="panel-body" >
                            <div class="form-group">
                                <span id="userabout" style="word-wrap: break-word;" >{{Visitor.Profile[0].About}}</span>
                            </div>
                            <div ng-show="Visitor.WorkShow">
                                <p>Work Profile : {{Visitor.Profile[0].WorkProfile}}</p>
                                <p>Organigation : {{Visitor.Profile[0].WorkPlaceName}}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div><br/></div>
                    <div class="panel panel-default" ng-repeat="blogdata in Blog">
                        <div class="panel-heading">
                            <img src="../dashboard/BlogImage/{{blogdata.User[0].Profile[0].ProfilePicturePath}}" id="profilepicture" width="50px" height="50px" alt="User Avatar"  />
                            <span class="timeline-title" style="font-size: 16px; font-weight: bold; margin-left: 8px;">{{blogdata.UserName}}</span>
                            <span class="timeline-title pull-right" style="margin-top: 15px;"><i class="fa fa-clock-o fa-fw" style="width: 30px;"></i>{{blogdata.BlogDateTime}}</span>
                        </div>
                        <div class="panel-body" >
                            <div class="form-group">
                                <p>{{blogdata.BlogDescription}}</p>
                            </div>
                        </div>
                        <div class="panel-heading">
                            <i class="fa fa-thumbs-up fa-fw" style="width: 30px;"></i>{{blogdata.BlogLike}}
                            <button type="button" class="btn btn-link">Like</button>
                        </div>
                    </div>
                </div>
               
            </div>
            <!-- /.row -->
    
        </div>

    </div>
    <!-- /#wrapper -->
    
    <!-- jQuery Version 1.11.0 -->

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo SITEPATH.DASHBOARD_DIR; ?>/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo SITEPATH.DASHBOARD_DIR; ?>/js/plugins/metisMenu/metisMenu.min.js"></script>

    

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo SITEPATH.DASHBOARD_DIR; ?>/js/sb-admin-2.js"></script>
    
  </form>
</body>

</html>
