<?php
include_once ("../../Config.php");
include_once("../../Model/DBConnection/Enum_Model.php");
include_once("../../Model/DBConnection/DbModel.php");
include_once( "../../Model/User/LoginModel.php");
$UDATA = LoginModel::GetUser("LOGINID", $_REQUEST["uid"]);
?>

<html lang="en">
    <script type="text/javascript" src="<?php echo SITEPATH.DASHBOARD_DIR; ?>/js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo SITEPATH.DASHBOARD_DIR; ?>/js/jquery.min.js"></script>

  <script type="text/javascript" src="<?php echo SITEPATH.DASHBOARD_DIR; ?>/js_lib/angular.js"></script>
    <script type="" src="<?php echo SITEPATH.DASHBOARD_DIR; ?>/js_lib/utility.js"> </script>
<?php include 'head.php'; ?>
<body>

    <div id="wrapper" ng-app="UserVarify">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
          

        </nav>
        <div id="page-wrapper" style="margin-left: 0px; padding: 0px 250px">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Welcome ! <?php echo $UDATA[0]->UserName;    ?></h1>
                </div>
                
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Let's start creating your profile
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" ng-controller="UserVarify_Controller">
                                        <input type="hidden" id="userid" value="<?php echo $UDATA[0]->LoginId ?>" />
                                        <div class="form-group">
                                            <label>Address Line 1</label>
                                            <input class="form-control" id="add1" ng-model="Profile.add1">
                                        </div>
                                        <div class="form-group">
                                            <label>Address Line 2</label>
                                            <input class="form-control" id="add2" ng-model="Profile.add2">
                                        </div>
                                        <div class="form-group">
                                            <label>Selects Country</label>
                                            <select id="country" class="form-control" ng-model="Profile.country" onchange="showCity(this.val,0);">
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
                                            <select id="city" class="form-control" ng-model="Profile.city"></select>
                                        </div>
                                        <div class="form-group">
                                            <label>Location</label>
                                            <input class="form-control" id="location" ng-model="Profile.location">
                                        </div>
                                        <div class="form-group">
                                            <label>Zipcode</label>
                                            <input class="form-control" id="zipcode" ng-model="Profile.zipcode">
                                            <p class="help-block">your city code ex :- XXXXXX</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Contact Number</label>
                                            <input class="form-control" id="contact" ng-model="Profile.contact">
                                        </div>
                                        <div class="form-group">
                                            <label>I am</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="profile1" ng-model="Profile.volunteer" id="profile1" value="1">VOLUNTEER
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="profile2" ng-model="Profile.ngo" id="profile2" value="2">NGO
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="profile3" ng-model="Profile.company" id="profile3" value="3">COMPANY
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-primary" ng-click="CreateProfile();">Create Profile</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo SITEPATH.DASHBOARD_DIR; ?>/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo SITEPATH.DASHBOARD_DIR; ?>/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo SITEPATH.DASHBOARD_DIR; ?>/js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo SITEPATH.DASHBOARD_DIR; ?>/js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo SITEPATH.DASHBOARD_DIR; ?>/js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo SITEPATH.DASHBOARD_DIR; ?>/js/plugins/morris/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo SITEPATH.DASHBOARD_DIR; ?>/js/sb-admin-2.js"></script>

</body>

</html>