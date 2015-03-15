<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        
            <div class="navbar-header">
                <a class="navbar-brand" href="#">GLIPPED</a>
            </div>
            
<ul class="nav navbar-top-links navbar-right">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a><i class="fa fa-user fa-fw"></i><?php echo $_SESSION["UserName"];?></a>
            </li>
            <li class="divider"></li>
            <li><a href="<?php echo SITEPATH.LOGOUT; ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>
        </ul>
        <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
</ul>
<!-- /.navbar-top-links -->

<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div align="center">
                                <img src="../dashboard/UserImage/{{UserProfile.Profile[0].ProfilePicturePath}}" id="profilepicture" width="200px" height="200px" alt="User Avatar" class="img-circle" />
                            </div>
                            <div align="center" >
                                <span style="font-weight: bold; font-size: 18px;" class="text-primary">{{UserProfile.UserName}}</span>
                                    <br/>
                                    <strong class="text-primary">{{UserProfile.Address[0].CountryName}}</strong>
                                
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a class="active" href="index.php?uid=<?php echo $_GET['uid'];?>"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a href="profile.php?uid=<?php echo $_GET['uid'];?>"><i class="fa fa-user fa-fw"></i> Profile</a>
                        </li>
                        <li>
                            <a href="event.php?uid=<?php echo $_GET['uid'];?>"><i class="fa fa-user fa-fw"></i> Profile</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
        </nav>