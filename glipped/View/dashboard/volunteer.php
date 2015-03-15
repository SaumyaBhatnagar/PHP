<?php
include_once ("../../Config.php");
include_once("../../Model/DBConnection/Enum_Model.php");
include_once("../../Model/DBConnection/DbModel.php");
include_once( "../../Model/User/LoginModel.php");
$UDATA = LoginModel::GetUser("LOGINID", $_REQUEST["LOGINID"]);
?>

<html lang="en">
<?php include 'head.php'; ?>
<body>

    <div id="wrapper" >
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
                            Save Profile
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="upload.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="userid" id="userid" value="<?php echo $UDATA[0]->LoginId ?>" />
                                        <input type="hidden" name="usertype" id="usertype" value="<?php echo $UDATA[0]->UserType ?>" />
                                        <div class="form-group">
                                            <label>Say something about you</label>
                                            <textarea class="form-control" rows="4" name="about" id="about"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Selects Causes</label>
                                            <select id="causes" name="causes" class="form-control" >
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
                                            <input class="form-control" id="workprofile" name="workprofile">
                                        </div>
                                        <div class="form-group">
                                            <label>Where you working mantioned name</label>
                                            <input class="form-control" id="workplace" name="workplace">
                                        </div>
                                           <div class="form-group">
                                            <label>Select Image</label>
                                            <input type="file" name="file" id="file" size="50">
                                        </div>
                                        <button type="submit" class="btn btn-primary" >Save</button>
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
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>