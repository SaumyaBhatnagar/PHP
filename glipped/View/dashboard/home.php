<script src="<?php echo SITEPATH.DASHBOARD_DIR; ?>/js_lib/home.js"></script>
<div ng-app="UserHome" id="page-wrapper">
    <form name="form" id="form1" ng-controller="UserHomeController" data-ng-init="init('<?php echo $_GET['uid'];?>');">
            <div class="row">
                <div class="col-lg-12">
                      <br/>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                 <!-- /.col-lg-8 -->
                 <div class="col-lg-4" style="width: 25%;">
                    <div class=" panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-user fa-fw"></i> Profile
                        </div>
                        <div class="panel-body" >
                            <div align="center">
                                <img src="../dashboard/UserImage/{{UserProfile.Profile[0].ProfilePicturePath}}" id="profilepicture" width="200px" height="200px" alt="User Avatar" class="img-circle" />
                            </div>
                            <div align="center" >
                                <span style="font-weight: bold; font-size: 18px;" class="text-primary">{{UserProfile.UserName}}</span>
                                    <br/>
                                    <strong class="text-primary">{{UserProfile.Address[0].CountryName}}</strong>
                                
                            </div>
                            <br/>
                            <strong>About</strong>
                            <p>{{UserProfile.Profile[0].About}}</p>
                            <strong>Email</strong>
                            <address>
                                {{UserProfile.Email}}
                            </address>
                            <strong>Contact</strong>
                            <address>
                                {{UserProfile.Address[0].ContactNumber}}
                            </address>
                        </div>
                    </div>
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-8"  style="width: 75%;">
                    
                    <div class="sidebar-search" style="padding-bottom: 10px;">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search volunteer, ngo, company.....">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                    </div>
                    <!-- /input-group -->
                     </div>
                    
                    <div class="form-group">
                        <textarea class="form-control" rows="4" placeholder="wright own idea....." ng-model="Blog.PostData"></textarea>
                    </div>
                    <button type="button" class="btn btn-primary" ng-click="PostBlog();" >Post</button>
                    <div><br/></div>
                    <div class="panel panel-default" ng-repeat="blogdata in Blog">
                        <div class="panel-body" >
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">{{blogdata.UserName}}</h4>
                                    <p><small class="text-primary"><i class="fa fa-clock-o"></i>{{blogdata.BlogDateTime}}</small>
                                    </p>
                                </div>
                                <div class="timeline-body">
                                    <p>{{blogdata.BlogDescription}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
            <!-- /.row -->
    </form>
</div>