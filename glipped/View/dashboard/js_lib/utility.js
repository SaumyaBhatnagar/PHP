var UserVarify = angular.module('UserVarify', []);
UserVarify.controller('UserVarify_Controller', ['$scope', '$http', function UserVarify_Controller($scope, $http) {

    $scope.CreateProfile = function () {
        if ($scope.Profile.volunteer) {
            $scope.Profile.usertype = "VOLUNTEER";
        }
        else if ($scope.Profile.ngo) {
            $scope.Profile.usertype = "NGO";
        }
        else if ($scope.Profile.company) {
            $scope.Profile.usertype = "COMPANY";
        }
        if($scope.Profile.country != "" && $scope.Profile.zipcode != ""&& $scope.Profile.usertype != "")
        {
            
            var json_string = JSON.stringify($scope.Profile);
            jQuery.ajax({
                url: "../../Controller/Utility/UtilityController.php",
                type: "POST",
                data: { ACTION: "USERVARIFY", DATA: json_string ,LOGINID:$("#userid").val()},
                success: function (jsondata) {
                    var objs = jQuery.parseJSON(jsondata);
                    $scope.$apply(function () {
                        $scope.Profile = null;
                        if(objs == "VOLUNTEER")
                        {
                            location.href = "volunteer.php?LOGINID="+$("#userid").val();
                        }
                        else if(objs == "NGO")
                        {
                            location.href = "ngo_company.php?LOGINID="+$("#userid").val();
                        }
                        else if(objs == "COMPANY")
                        {
                            location.href = "ngo_company.php?LOGINID="+$("#userid").val();
                        }
                        
                    });
                }
            });
        }
    }
    
} ]);


﻿function showCity(State_Id, cityid) {
    //State_Id = State_Id.replace(/(\r\n|\n|\r)/gm, "");
    //cityid = cityid.replace(/(\r\n|\n|\r)/gm, "");
var TYPE = "SELECT";
    if (true) {
        jQuery.ajax({
            url: "../../Controller/Utility/UtilityController.php",
            type: "POST",
            data: { ACTION: "GETCITY" , COUNTRYID:$('#country').val() },
            //cache: false,
            success: function (jsondata) {
                $('#city').empty();
                $("#city").append("<option value=\'0'>Select City</option>");
                var objs = jQuery.parseJSON(jsondata);
                if (jsondata != "") {
                    var obj;
                    for(var i = 0; i < objs.length; i++){
                    //for (index in objs) {
                    var obj = objs[i];
                    //var index = 0;
                    $("#city").append("<option value=\'" + obj.CityId + "'\ title=\'" + obj.CityName + "\'>" + obj.CityName + "</option>");
                    }
            }
            $('#city').val(cityid);
            }
        });
    }
}