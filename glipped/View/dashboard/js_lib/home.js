var UserHome = angular.module('UserHome', []);
UserHome.controller('UserHomeController', ['$scope', '$http', function UserHomeController($scope, $http) {
    var profile = { Profile: [{ About: '', ProfilePicturePath: ''}] };
    $scope.init = function (UserId) {
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
                        $scope.UserProfile.showcontact = true;
                        $scope.UserProfile.ShowDetails = true;
                        if($scope.UserProfile.UserType == "VOLUNTEER")
                        {
                            $scope.UserProfile.WorkShow = true;
                            
                        }
                    });
                }
            });
            jQuery.ajax({
                url: "../../Controller/Blog/BlogController.php",
                type: "POST",
                dataType:"json",
                data: { ACTION: "GETBLOG", USERID:UserId},
                success: function (jsondata) {
                    $scope.$apply(function () {
                        $scope.Blog = jsondata;
                    });
                }
            });
        }
    }
    $scope.PostBlog = function (BlogType) {
        if(BlogType == "TEXT"){
            $scope.Blog.PostData = $scope.Blog.PostText;
        }
        else if(BlogType == "IMAGE"){
            //$scope.Blog.PostData = $scope.Blog.PostImage;
        }
        else if(BlogType == "VIDEO"){
            $scope.Blog.PostData = $scope.Blog.PostLink.split('=')[1];
        }
        if(BlogType != "IMAGE" && $scope.Blog.PostData != "")
        {
            jQuery.ajax({
                url: "../../Controller/Blog/BlogController.php",
                type: "POST",
                dataType:"json",
                data: { ACTION: "SAVEBLOG", USERID:$scope.UserProfile.LoginId,DATA:$scope.Blog.PostData,DATATYPE:BlogType},
                success: function (jsondata) {
                    $scope.$apply(function () {
                        $scope.Blog = jsondata;
                    });
                }
            });
        }
        else
        {
            $("form[name='uploader']").submit(function(e) {
            var formData = new FormData($(this)[0]);
            $.ajax({
            url: "blogphoto.php",
            type: "POST",
            data: formData,
            async: false,
            success: function (msg) {
                if(msg != ""){
                    jQuery.ajax({
                        url: "../../Controller/Blog/BlogController.php",
                        type: "POST",
                        dataType:"json",
                        data: { ACTION: "SAVEBLOG", USERID:$scope.UserProfile.LoginId,DATA:msg,DATATYPE:BlogType},
                        success: function (jsondata) {
                            $scope.$apply(function () {
                                $scope.Blog = jsondata;
                            });
                        }
                    });
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
 e.preventDefault();
    });
               
        }
    }
    $scope.BlogLikeUpdate = function (Status,blogdata){
        alert($scope.blogdata.BlogId);
        //$scope.Challan._items.splice($scope.Challan._items.indexOf(item), 1);
        jQuery.ajax({
                url: "../../Controller/Blog/BlogController.php",
                type: "POST",
                dataType:"json",
                data: { ACTION: "SAVEBLOG", USERID:$scope.UserProfile.LoginId,DATA:$scope.Blog.PostData,DATATYPE:BlogType},
                success: function (jsondata) {
                    $scope.$apply(function () {
                        $scope.Blog = jsondata;
                    });
                }
            });
    }
    $scope.ShowUpdate = function () {
        $scope.UserProfile.showcontact = false;
        $scope.UserProfile.updatecontact = true;
    }
    $scope.CancelUpdate = function () {
        $scope.UserProfile.showcontact = true;
        $scope.UserProfile.updatecontact = false;
    }
    $scope.UpdateProfile = function () {
        var json_string = JSON.stringify($scope.UserProfile);
        jQuery.ajax({
            url: "../../Controller/User/UserController.php",
            type: "POST",
            dataType:"json",
            data: { ACTION: "UPDATEADDRESS", DATA:json_string},
            success: function (jsondata) {
                $scope.$apply(function () {
                    $scope.UserProfile = jsondata[0];
                    if($scope.UserProfile.UserType == "VOLUNTEER")
                    {
                        $scope.UserProfile.showcontact = true;
                        $scope.UserProfile.updatecontact = false;
                        $scope.UserProfile.Showphoto = true;
                    }
                });
            }
        });
        
    }
    
    
    
    $scope.ShowUpdateAbout = function () {
        if($scope.UserProfile.UserType == "VOLUNTEER")
        {
            $scope.UserProfile.ShowDetails = false;
            $scope.UserProfile.VolunteerDetails = true;
        }
        else 
        {
            $scope.UserProfile.ShowDetails = false;
            $scope.UserProfile.CompanyNgoDetails = true;
        }
    }
    $scope.UpdateAboutVolunteer = function () {
        var json_string = JSON.stringify($scope.UserProfile);
        jQuery.ajax({
            url: "../../Controller/User/UserController.php",
            type: "POST",
            dataType:"json",
            data: { ACTION: "UPDATEVOLUNTEER", DATA:json_string},
            success: function (jsondata) {
                $scope.$apply(function () {
                    $scope.UserProfile = jsondata[0];
                    if($scope.UserProfile.UserType == "VOLUNTEER")
                    {
                        $scope.UserProfile.ShowDetails = true;
                        $scope.UserProfile.WorkShow = true;
                        $scope.UserProfile.VolunteerDetails = false;
                        $scope.UserProfile.Showphoto = true;
                    }
                });
            }
        });
        
    }
    $scope.CancelAboutVolunteer = function () {
        $scope.UserProfile.ShowDetails = true;
        $scope.UserProfile.WorkShow = true;
        $scope.UserProfile.VolunteerDetails = false;
    }
    $scope.UpdateAboutNgoCompany = function () {
        var json_string = JSON.stringify($scope.UserProfile);
        jQuery.ajax({
            url: "../../Controller/User/UserController.php",
            type: "POST",
            dataType:"json",
            data: { ACTION: "UPDATENGOCOMPANY", DATA:json_string},
            success: function (jsondata) {
                $scope.$apply(function () {
                    $scope.UserProfile = jsondata[0];
                    if($scope.UserProfile.UserType == "VOLUNTEER")
                    {
                        $scope.UserProfile.ShowDetails = true;
                        $scope.UserProfile.WorkShow = false;
                        $scope.UserProfile.CompanyNgoDetails = false;
                        $scope.UserProfile.Showphoto = true;
                    }
                });
            }
        });
    }
    $scope.CancelAboutNgoCompany = function () {
        $scope.UserProfile.ShowDetails = true;
        $scope.UserProfile.CompanyNgoDetails = false;
        $scope.UserProfile.WorkShow = false;
    }
} ]);

// AutoComplete For all user in search

 var UserList = {};
function CallToUser(UserList) {
    'use strict';
    var userArray = $.map(UserList, function (value, key) { return { value: value, data: key }; });
    // Initialize ajax autocomplete:
    $('#autocomplete-ajax-user').autocomplete({
        //serviceUrl: '/autosuggest/service/',
        lookup: userArray,
        lookupFilter: function (suggestion, originalQuery, queryLowerCase) {
            var re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi');
            return re.test(suggestion.value);
        },
        onSelect: function (suggestion) {
            ActionOnUser(suggestion.value, suggestion.data);
            //$('#selction-ajax-buyer').html('You selected: ' + suggestion.value + ', ' + suggestion.data);
        },
        onHint: function (hint) {
            //$('#autocomplete-ajax-x-buyer').val(hint);
        },
        onInvalidateSelection: function () {
            NoneUser();
            //$('#selction-ajax-buyer').html('You selected: none');F
        }
    });
}
$(document).ready(function (){
    jQuery.ajax({
    url: "../../Controller/User/UserController.php",
    type: "GET",
    data: { ACTION: "AUTOUSER",LISTTYPE:"ALL" },
    success: function (jsondata) {
        var objs = jQuery.parseJSON(jsondata);
        if (jsondata != "") {
            var obj;
            for (var i = 0; i < objs.length; i++) {
                var obj = objs[i];
                UserList[obj.LoginId] = obj.UserName;
            }
            CallToUser(UserList);
        }
    }
});
});

function ActionOnUser(value, data) {
    if (value != "" && data > 0) {
        location.href = "visitor.php?uid="+data;
    }
}
function NoneUser() {
    
} 
