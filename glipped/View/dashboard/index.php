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
    <link href="<?php echo SITEPATH.DASHBOARD_DIR; ?>/js_lib/styles.css" rel="stylesheet" type="text/css"/>
    <script src="<?php echo SITEPATH.DASHBOARD_DIR; ?>/js_lib/jquery.autocomplete.js" type="text/javascript"></script>
    
    <script type="text/javascript" src="<?php echo SITEPATH.WEBDIR; ?>/js_lib/angular.js"></script>
    <script type="text/javascript" src="<?php echo SITEPATH.WEBDIR; ?>/js_lib/popup_test.js"></script>
    <link rel="stylesheet" href="<?php echo SITEPATH.WEBDIR; ?>/css/popup_test.css" type="text/css">
    <script src="<?php echo SITEPATH.DASHBOARD_DIR; ?>/js_lib/home.js"></script>
    
</head>
<body ng-app="UserHome">
    <form name="uploader" role="form" ng-controller="UserHomeController" data-ng-init="init('<?php echo $_GET['uid'];?>');" 
          enctype="multipart/form-data">
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
            <div class="row">
                <div class="col-lg-8"  style="width: 75%;">
                    
                    <div class="sidebar-search" style="padding-bottom: 10px;">
                    <div class="input-group custom-search-form">
                        <input type="text" id="autocomplete-ajax-user" 
                               style="z-index: 2; background:transparent;" 
                               placeholder="Search volunteer, ngo, company....." class="form-control"/>
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                    </div>
                    <!-- /input-group -->
                     </div>
                    
                    <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#idea" data-toggle="tab">Share your idea's</a>
                                </li>
                                <li><a href="#Photo" data-toggle="tab">Photo</a>
                                </li>
                                <li><a href="#Video" data-toggle="tab">Video</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="idea">
                                    <div><br/></div>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="4" placeholder="Write now....." ng-model="Blog.PostText"></textarea>
                                    </div>
                                    <button type="button" class="btn btn-primary" ng-click="PostBlog('TEXT');" >Post</button>
                                </div>
                                <div class="tab-pane fade" id="Photo">
                                    <div><br/></div>
                                    <div class="form-group">
                                        <input type="file" name="fileToUpload" id="fileToUpload" size="50"  ng-model="Blog.PostImage">
                                    </div>
                                    <button type="submit" class="btn btn-primary" ng-click="PostBlog('IMAGE');" >Upload</button>
                                </div>
                                <div class="tab-pane fade" id="Video">
                                    <div><br/></div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" rows="4" placeholder="http://www.youtube.com?v=res87ed89e" ng-model="Blog.PostLink"/>
                                    </div>
                                    <button type="button" class="btn btn-primary" ng-click="PostBlog('VIDEO');" >Share Link</button>
                                </div>
                            </div>
                        </div>
                    
                    <div><br/></div>
                    <div class="panel panel-default" ng-repeat="blogdata in Blog">
                        <div class="panel-heading">
                            <img src="../dashboard/UserImage/{{blogdata.User[0].Profile[0].ProfilePicturePath}}" id="profilepicture" width="50px" height="50px" alt="User Avatar"  />
                            <span class="timeline-title" style="font-size: 16px; font-weight: bold; margin-left: 8px;">{{blogdata.UserName}}</span>
                            <span class="timeline-title pull-right" style="margin-top: 15px;"><i class="fa fa-clock-o fa-fw" style="width: 30px;"></i>{{blogdata.BlogDateTime}}</span>
                        </div>
                        <div class="panel-body" >
                            <div class="form-group">
                                <p ng-show="blogdata.ContantType == 'TEXT'">{{blogdata.BlogDescription}}</p>
                                <p ng-show="blogdata.ContantType == 'IMAGE'">
                                    <img src="../dashboard/BlogImage/{{blogdata.ContantPath}}" alt="User Avatar" style="width: 700px; height: 250px;" />
                                    </p>
                                <p ng-show="blogdata.ContantType == 'VIDEO'">
                                    <iframe title="YouTube video player" class="youtube-player" type="text/html" 
width="740" height="390" src="http://www.youtube.com/embed/{{blogdata.ContantPath}}"
frameborder="0" allowFullScreen></iframe>
                                    </p>
                            </div>
                        </div>
<!--                        <div class="panel-heading">
                            <i class="fa fa-thumbs-up fa-fw" style="width: 30px;"></i>{{blogdata.BlogLike}}
                            <button type="button" class="btn btn-link" ng-show=""  ng-click="BlogLikeUpdate('LIKE',blogdata)">Like</button>
                            <button type="button" class="btn btn-link" ng-show="" ng-click="BlogLikeUpdate('UNLIKE',blogdata)">Unlike</button>
                        </div>-->
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
