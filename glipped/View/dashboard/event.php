<?php
include_once ("../../Config.php");
include_once("../../Model/DBConnection/Enum_Model.php");
include_once("../../Model/DBConnection/DbModel.php");
include_once( "../../Model/User/LoginModel.php");
session_start();
if($_SESSION["UserName"] == "")
{
    header("Location:../../index.php");
}
$UDATA = LoginModel::GetUser("LOGINID", $_REQUEST["uid"]);
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
    <link href="<?php echo SITEPATH.DASHBOARD_DIR; ?>/js_lib/styles.css" rel="stylesheet" type="text/css"/>
    <script src="<?php echo SITEPATH.DASHBOARD_DIR; ?>/js_lib/jquery.autocomplete.js" type="text/javascript"></script>
    
    <script type="text/javascript" src="<?php echo SITEPATH.DASHBOARD_DIR; ?>/js_lib/angular.js"></script>
    <script type="text/javascript" src="<?php echo SITEPATH.DASHBOARD_DIR; ?>/js_lib/popup_test.js"></script>
    <link rel="stylesheet" href="<?php echo SITEPATH.WEBDIR; ?>/css/popup_test.css" type="text/css">
    
    <script src="<?php echo SITEPATH.DASHBOARD_DIR; ?>/js_lib/home.js"></script>
    <script type="" src="<?php echo SITEPATH.DASHBOARD_DIR; ?>/js_lib/utility.js"> </script>
</head>
<body ng-app="UserHome">
  <form name="form" id="form1" ng-controller="UserHomeController" data-ng-init="init('<?php echo $_GET['uid'];?>');">
    <div id="wrapper">

       <?php include_once ("menu.php");?>

         <div id="page-wrapper">
    
            <div class="row">
                <div class="col-lg-12">
                      <br/>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <button type="button" class="btn btn-primary" onclick="OpenPopUp('popup_test');">Change Photo</button>
            <br/><br/>
            <div class="row" ng-show="UserProfile.showcontact">
                <div class="col-lg-8"  style="width: 75%;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-user fa-fw"></i> Contact Information
                            <div class="pull-right">
                                <div class="btn-group" style="margin-top: -6px;">
                                    <button type="button" class="btn btn-primary" ng-click="ShowUpdate();" >Edit</button>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <p>Email : {{UserProfile.Email}}</p>
                        <p>Contact : {{UserProfile.Address[0].ContactNumber}}</p>
                        <br>
                        <h4>Addresses</h4>
                        <address>
                            <strong>{{UserProfile.Address[0].AddressLineOne}},
                            {{UserProfile.Address[0].AddressLineTwo}}</strong>
                            <br>{{UserProfile.Address[0].Location}}, {{UserProfile.Address[0].CityName}}
                            <br>{{UserProfile.Address[0].CountryName}}
                            <br>{{UserProfile.Address[0].Zipcode}}
                        </address>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
            <div class="row" ng-show="UserProfile.updatecontact">
                <div class="col-lg-8" style="width: 75%;">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-user fa-fw"></i> Contact Information
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" id="add1" ng-model="UserProfile.Address[0].AddressLineOne">
                        </div>
                        <div class="form-group">
                            <label>Address Line 2</label>
                            <input class="form-control" id="add2" ng-model="UserProfile.Address[0].AddressLineTwo">
                        </div>
                        <div class="form-group">
                            <label>Selects Country</label>
                            <select id="country" class="form-control" ng-model="UserProfile.Address[0].CountryId" onchange="showCity(this.val,0);">
                                <option value="">Select Country</option>
                                <?php
                                $CountryData = Utility::GetCountry();
                                while ($row = mysql_fetch_array($CountryData, MYSQL_ASSOC))
                                {
                                    echo "<option value='".$row["CountryId"]."'>".$row["CountryName"]."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Selects City</label>
                            <select id="city" class="form-control" ng-model="UserProfile.Address[0].CityId"></select>
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <input class="form-control" id="location" ng-model="UserProfile.Address[0].Location">
                        </div>
                        <div class="form-group">
                            <label>Zipcode</label>
                            <input class="form-control" id="zipcode" ng-model="UserProfile.Address[0].Zipcode">
                            <p class="help-block">your city code ex :- XXXXXX</p>
                        </div>
                        <div class="form-group">
                            <label>Contact Number</label>
                            <input class="form-control" id="contact" ng-model="UserProfile.Address[0].ContactNumber">
                        </div>
                        <button type="button" class="btn btn-primary" 
                                ng-click="UpdateProfile();">Update Profile</button>
                            <button type="button" class="btn btn-primary" 
                                ng-click="CancelUpdate();">Cancel</button>
                        </div>
                    </div>
                        
                    
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8"  style="width: 75%;">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-user fa-fw"></i> About
                            <div class="pull-right">
                                <div class="btn-group" style="margin-top: -6px;">
                                    <button type="button" class="btn btn-primary" ng-click="ShowUpdateAbout();" >Edit</button>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body" ng-show="UserProfile.ShowDetails">
                            <div class="form-group" >
                                <span id="userabout" style="word-wrap: break-word;" >{{UserProfile.Profile[0].About}}</span>
                            </div>
                            <div ng-show="UserProfile.WorkShow">
                                <p>Work Profile : {{UserProfile.Profile[0].WorkProfile}}</p>
                                <p>Organigation : {{UserProfile.Profile[0].WorkPlaceName}}</p>
                            </div>
                        </div>
                        <div class="panel-body" ng-show="UserProfile.VolunteerDetails">
                            <div class="form-group">
                                <label>Say something about you</label>
                                <textarea class="form-control" rows="4" name="about" id="about" ng-model="UserProfile.Profile[0].About"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Selects Causes</label>
                                <select id="causes" name="causes" class="form-control" ng-model="UserProfile.Profile[0].CausesId">
                                    <option value="">Select Causes</option>
                                    <?php
                                    $CausesData = Utility::GetCauses();
                                    while ($row = mysql_fetch_array($CausesData, MYSQL_ASSOC))
                                    {
                                        echo "<option value='".$row["CauseId"]."'>".$row["CauseName"]."</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Work Profile</label>
                                <input class="form-control" id="workprofile" name="workprofile" ng-model="UserProfile.Profile[0].WorkProfile">
                            </div>
                            <div class="form-group">
                                <label>Where you working mantioned name</label>
                                <input class="form-control" id="workplace" name="workplace" ng-model="UserProfile.Profile[0].WorkPlaceName">
                            </div>
                            <button type="button" class="btn btn-primary" 
                                ng-click="UpdateAboutVolunteer();">Update</button>
                            <button type="button" class="btn btn-primary" 
                                ng-click="CancelAboutVolunteer();">Cancel</button>
                        </div>
                        <div class="panel-body" ng-show="UserProfile.CompanyNgoDetails">
                            <div class="form-group">
                                <label>Say something about you</label>
                                <textarea class="form-control" rows="4" name="about" id="about" ng-model="UserProfile.Profile[0].About"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Selects Causes</label>
                                <select id="causes" name="causes" class="form-control"  ng-model="UserProfile.Profile[0].CausesId">
                                    <option value="">Select Causes</option>
                                    <?php
                                    $CausesData = Utility::GetCauses();
                                    while ($row = mysql_fetch_array($CausesData, MYSQL_ASSOC))
                                    {
                                        echo "<option value='".$row["CauseId"]."'>".$row["CauseName"]."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="button" class="btn btn-primary" 
                                ng-click="UpdateAboutNgoCompany();">Update</button>
                            <button type="button" class="btn btn-primary" 
                                ng-click="CancelAboutNgoCompany();">Cancel</button>
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
<script type="text/javascript">
        function ShowpImagePreview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#ImgPrv').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
<div id="popup_test" class="popupContact" style="border: 18px solid gray;border-radius:18px;width: 600px;height:400px; ">
	<div style="border:8px solid #ffffff;height:300px;padding: 0px;">
	<form name="uploader" role="form" enctype="multipart/form-data">
            <div class="form-group" align="center" style="margin-top: 20px;">
                <img ID="ImgPrv" style=" width: 240px; height: 150px;" /><br /><br />
               <input type="file" name="fileToUpload" id="fileToUpload" onchange="ShowpImagePreview(this);">
               <br/>
               <button type="submit" class="btn btn-primary" >Save</button>
               <a class="btn btn-primary" onclick="disablePopup();">Close</a>
           </div>
           
       </form>
        <script>
             
            $("form[name='uploader']").submit(function(e) {
        var formData = new FormData($(this)[0]);

        $.ajax({
            url: "profilephoto.php",
            type: "POST",
            data: formData,
            async: false,
            success: function (msg) {
                disablePopup();
            },
            cache: false,
            contentType: false,
            processData: false
        });

        e.preventDefault();
    });
        </script>		
	</div>
</div><div id="backgroundPopup"></div>
</html>



