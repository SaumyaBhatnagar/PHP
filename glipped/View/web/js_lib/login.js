var URL = SITEPATH + CONTROLLER + "/User/UserController.php";
var method = "POST";
var UserLogin = angular.module('UserLogin', []);
// create angular controller

UserLogin.controller('UserLogin_Controller', ['$scope', '$http', function UserLogin_Controller($scope, $http) {
//$scope.Signup;
    $scope.SignupFun = function () {
        if($("#txtfname").val() != "" && $("#txtlname").val() != "" && $("#emailsignup").val() != "" && $("#txtpassword").val() != "")
        {
            var json_string = JSON.stringify($scope.Signup);
            jQuery.ajax({
                url: URL,
                type: method,
                data: { ACTION: "SIGNUP", DATA: json_string },
                success: function (jsondata) {
                    $scope.$apply(function () {
                        $scope.Signup = null;
                        OpenPopUp('popup_test');
                    });
                }
            });
        }
        else{
            alert("Email and Password are required.");
        }
    }
    
    $scope.LoginFun = function () {
        if($scope.Login.Email != "" && $scope.Login.Password != "")
        {
            var json_string = JSON.stringify($scope.Login);
            jQuery.ajax({
                url: URL,
                type: method,
	        dataType:"json",
                data: { ACTION: "LOGIN", DATA: json_string },
                success: function (jsondata) {
                    $scope.$apply(function () {
                        if(jsondata[0].UserType == "VOLUNTEER")
                        {
                            location.href = SITEPATH;
                        }
                        else if(jsondata[0].UserType == "NGO")
                        {
                            location.href = SITEPATH;
                        }
                        else if(jsondata[0].UserType == "COMPANY")
                        {
                            location.href = SITEPATH;
                        }
                    });
                },
                error: function(jsondata){
                    alert(jsondata);
                }
            });
        }
    }
    
    $scope.ForgotPasswordFun = function () {
        if($scope.ForgotPassword.Email != "")
        {
            var json_string = JSON.stringify($scope.ForgotPassword);
            jQuery.ajax({
                url: URL,
                type: method,
                data: { ACTION: "FORGOTPASSWORD", DATA: json_string },
                success: function (jsondata) {
                    $scope.$apply(function () {
                        $scope.ForgotPassword = null;
                    });
                }
            });
        }
    }
    
    $scope.ChangePasswordFun = function () {
        if($scope.ChangePassword.Email != "" && $scope.ChangePassword.NewPassword != "" && $scope.ChangePassword.OldPassword != "")
        {
            var json_string = JSON.stringify($scope.ChangePassword);
            jQuery.ajax({
                url: URL,
                type: method,
                data: { ACTION: "CHANGEPASSWORD", DATA: json_string },
                success: function (jsondata) {
                    $scope.$apply(function () {
                        $scope.ChangePassword = null;
                    });
                }
            });
        }
    }
    
    
} ]);

function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function VarifyEmail(id)
{
  var email = $("#"+id).val();
  if (validateEmail(email)) {
    $("#"+id).css("border", "1px solid green");
  } else {
    $("#"+id).css("border", "1px solid red");
  }
  return false;

}

function LoginCall()
{
    
}
function ForgotPasswordCall()
{
    
}