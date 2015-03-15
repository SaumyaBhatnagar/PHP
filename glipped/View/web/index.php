<html lang="en" class="nivo-lightbox-notouch">
  <?php include ("head.php");  ?>
  <body ng-app="UserLogin">
 <form name="form1" id="form1" ng-controller="UserLogin_Controller">
   
  <!-- =========================
PRE LOADER       
============================== -->
  <div class="preloader" style="display: none;">
    <div class="status" style="display: none;">
      &nbsp;
    </div>
  </div>
   <?php include ("header.php");  ?>
  <?php include ("Services.php");  ?>
  <!-- REGISTRATION FORM FOR POPUP BOX -->
  
  <!-- login section start-->
  <div class="modal fade bs-example-modal-sm" id="stamp-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="vertical-registration-form">
          <h4 class="dark-text form-heading">
            Login
          </h4>
<form class="registration-form" id="contact-form">
            
    <input type="text" id="txtloginemail" ng-model="Login.Email"  onblur="VarifyEmail(this.id);" name="email" class="form-control input-box placeholder"
       placeholder="User Name">
    <input type="password" id="txtloginpassword" ng-model="Login.Password" name="name" class="form-control input-box placeholder" 
       placeholder="Password">
           
<div class="fogt_pass"><a href="#" data-toggle="modal" data-target="#stamp-modal1">Forgotten your password?</a></div>
<button id="loginbtn" class="btn btn-primary standard-button" ng-click="LoginFun();">Login</button>
<span class="spc_or">or</span>
<button class="btn btn-primary standard-button">Login with Facebook</button>
            
</form>
          <p class="email-success dark-text">
            <span class="icon-check-alt2 colored-text">
            </span>
            Email sent seuccessfully
          </p>
          <p class="email-error dark-text">
            <span class="icon-close-alt2">
            </span>
            Error! Please check all fields filled correctly
          </p>
          <!-- MAILCHIMP ALERTS 
<p class="mailchimp-success dark-text">
<span class="icon-check-alt2 colored-text">
</span>
We sent the confirmation to your email
</p>
<p class="mailchimp-error dark-text">
<span class="icon-close-alt2">
</span>
Error! Please check all fields filled correctly
</p>
-->
        </div>
      </div>
    </div>
  </div>

<!-- login section end-->

<!--Forgot Password start-->
<div class="modal fade bs-example-modal-sm" id="stamp-modal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="vertical-registration-form">
          <h4 class="dark-text form-heading">
            Forgot Password
          </h4>
          <form class="registration-form" id="contact-form">
            
              <input type="email" id="txtforgotemail" ng-model="ForgotPassword.Email" onkeypress="VarifyEmail(this.id);" name="email" class="form-control input-box placeholder"
                     placeholder="User email">
              <button class="btn btn-primary standard-button" ng-click="ForgotPasswordFun();">
             Submit
            </button>
            
          </form>
          <p class="email-success dark-text">
            <span class="icon-check-alt2 colored-text">
            </span>
            Email sent seuccessfully
          </p>
          <p class="email-error dark-text">
            <span class="icon-close-alt2">
            </span>
            Error! Please check all fields filled correctly
          </p>
          <!-- MAILCHIMP ALERTS 
<p class="mailchimp-success dark-text">
<span class="icon-check-alt2 colored-text">
</span>
We sent the confirmation to your email
</p>
<p class="mailchimp-error dark-text">
<span class="icon-close-alt2">
</span>
Error! Please check all fields filled correctly
</p>
-->
        </div>
      </div>
    </div>
  </div>
  <!--Forgot Password start-->
  
  
  <!-- =========================
SECTION: CONTACT INFO  
============================== -->
  <div class="contact-info white-bg">
    <div class="container">
      
      <!-- CONTACT INFO -->
      <div class="row contact-links">
        
        <div class="col-sm-4">
          <div class="icon-container">
            <span class="icon-basic-mail colored-text">
            </span>
          </div>
          <a href="mailto:hey@designlab.co" class="strong">
            hey@designlab.co
          </a>
        </div>
        
        <div class="col-sm-4">
          <div class="icon-container">
            <span class="icon-basic-geolocalize-01 colored-text">
            </span>
          </div>
          <a href="" class="strong">
            Glen Road, E13 8 London, UK
          </a>
        </div>
        
        <div class="col-sm-4">
          <div class="icon-container">
            <span class="icon-basic-tablet colored-text">
            </span>
          </div>
          <a href="tel:44-12-3456-7890" class="strong">
            +44-12-3456-7890
          </a>
        </div>
      </div>
      
    </div>
  </div>
  <!-- =========================
GOOGEL MAP 
============================== -->
  <div id="container-fluid">
    <div id="cd-google-map">
      <div id="google-container" style="position: relative; overflow: hidden; transform: translateZ(0px); background-color: rgb(229, 227, 223);">
        <div class="gm-style" style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0;">
          <div style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0; cursor: url(https://maps.gstatic.com/mapfiles/openhand_8_8.cur) 8 8, default;">
            <div style="position: absolute; left: 0px; top: 0px; z-index: 1; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);">
              <div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;">
                <div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
                  <div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1;">
                    <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 480px; top: 3px;">
                    </div>
                    <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 480px; top: 259px;">
                    </div>
                    <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 224px; top: 3px;">
                    </div>
                    <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 224px; top: 259px;">
                    </div>
                    <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 736px; top: 3px;">
                    </div>
                    <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 736px; top: 259px;">
                    </div>
                    <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 480px; top: 515px;">
                    </div>
                    <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 480px; top: -253px;">
                    </div>
                    <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 224px; top: -253px;">
                    </div>
                    <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 224px; top: 515px;">
                    </div>
                    <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 736px; top: -253px;">
                    </div>
                    <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 736px; top: 515px;">
                    </div>
                    <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 992px; top: 259px;">
                    </div>
                    <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -32px; top: 3px;">
                    </div>
                    <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 992px; top: 3px;">
                    </div>
                    <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -32px; top: 259px;">
                    </div>
                    <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 992px; top: -253px;">
                    </div>
                    <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -32px; top: -253px;">
                    </div>
                    <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -32px; top: 515px;">
                    </div>
                    <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 992px; top: 515px;">
                    </div>
                    <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -288px; top: 259px;">
                    </div>
                    <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 1248px; top: 259px;">
                    </div>
                    <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 1248px; top: 3px;">
                    </div>
                    <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -288px; top: 3px;">
                    </div>
                    <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 1248px; top: -253px;">
                    </div>
                    <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -288px; top: -253px;">
                    </div>
                    <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -288px; top: 515px;">
                    </div>
                    <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 1248px; top: 515px;">
                    </div>
                  </div>
                </div>
              </div>
              <div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;">
              </div>
              <div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;">
              </div>
              <div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;">
                <div style="position: absolute; left: 0px; top: 0px; z-index: -1;">
                  <div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1;">
                    <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 480px; top: 3px;">
                      <canvas draggable="false" height="256" width="256" style="-webkit-user-select: none; position: absolute; left: 0px; top: 0px; height: 256px; width: 256px;">
                      </canvas>
                    </div>
                    <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 480px; top: 259px;">
                    </div>
                    <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 224px; top: 3px;">
                    </div>
                    <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 224px; top: 259px;">
                    </div>
                    <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 736px; top: 3px;">
                    </div>
                    <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 736px; top: 259px;">
                    </div>
                    <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 480px; top: 515px;">
                    </div>
                    <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 480px; top: -253px;">
                    </div>
                    <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 224px; top: -253px;">
                    </div>
                    <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 224px; top: 515px;">
                    </div>
                    <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 736px; top: -253px;">
                    </div>
                    <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 736px; top: 515px;">
                    </div>
                    <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 992px; top: 259px;">
                    </div>
                    <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -32px; top: 3px;">
                    </div>
                    <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 992px; top: 3px;">
                    </div>
                    <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -32px; top: 259px;">
                    </div>
                    <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 992px; top: -253px;">
                    </div>
                    <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -32px; top: -253px;">
                    </div>
                    <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -32px; top: 515px;">
                    </div>
                    <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 992px; top: 515px;">
                    </div>
                    <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -288px; top: 259px;">
                    </div>
                    <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 1248px; top: 259px;">
                    </div>
                    <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 1248px; top: 3px;">
                    </div>
                    <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -288px; top: 3px;">
                    </div>
                    <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 1248px; top: -253px;">
                    </div>
                    <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -288px; top: -253px;">
                    </div>
                    <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -288px; top: 515px;">
                    </div>
                    <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 1248px; top: 515px;">
                    </div>
                  </div>
                </div>
              </div>
              <div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
                <div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1;">
                  <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 480px; top: 3px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                    <img src="./font/vt" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);">
                  </div>
                  <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 480px; top: 259px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                    <img src="./font/vt(1)" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);">
                  </div>
                  <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 224px; top: 3px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                    <img src="./font/vt(2)" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);">
                  </div>
                  <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 224px; top: 259px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                    <img src="./font/vt(3)" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);">
                  </div>
                  <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 736px; top: 3px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                    <img src="./font/vt(4)" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);">
                  </div>
                  <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 736px; top: 259px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                    <img src="./font/vt(5)" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);">
                  </div>
                  <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 480px; top: 515px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                    <img src="./font/vt(6)" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);">
                  </div>
                  <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 480px; top: -253px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                    <img src="./font/vt(7)" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);">
                  </div>
                  <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 224px; top: -253px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                    <img src="./font/vt(8)" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);">
                  </div>
                  <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 224px; top: 515px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                    <img src="./font/vt(9)" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);">
                  </div>
                  <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 736px; top: -253px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                    <img src="./font/vt(10)" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);">
                  </div>
                  <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 736px; top: 515px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                    <img src="./font/vt(11)" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);">
                  </div>
                  <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 992px; top: 259px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                    <img src="./font/vt(12)" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);">
                  </div>
                  <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -32px; top: 3px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                    <img src="./font/vt(13)" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);">
                  </div>
                  <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 992px; top: 3px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                    <img src="./font/vt(14)" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);">
                  </div>
                  <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -32px; top: 259px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                    <img src="./font/vt(15)" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);">
                  </div>
                  <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 992px; top: -253px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                    <img src="./font/vt(16)" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);">
                  </div>
                  <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -32px; top: -253px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                    <img src="./font/vt(17)" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);">
                  </div>
                  <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -32px; top: 515px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                    <img src="./font/vt(18)" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);">
                  </div>
                  <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 992px; top: 515px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                    <img src="./font/vt(19)" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);">
                  </div>
                  <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -288px; top: 259px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                    <img src="./font/vt(20)" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);">
                  </div>
                  <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 1248px; top: 259px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                    <img src="./font/vt(21)" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);">
                  </div>
                  <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 1248px; top: 3px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                    <img src="./font/vt(22)" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);">
                  </div>
                  <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -288px; top: 3px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                    <img src="./font/vt(23)" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);">
                  </div>
                  <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 1248px; top: -253px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                    <img src="./font/vt(24)" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);">
                  </div>
                  <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -288px; top: -253px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                    <img src="./font/vt(25)" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);">
                  </div>
                  <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -288px; top: 515px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                    <img src="./font/vt(26)" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);">
                  </div>
                  <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 1248px; top: 515px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                    <img src="./font/vt(27)" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);">
                  </div>
                </div>
              </div>
            </div>
            <div style="position: absolute; left: 0px; top: 0px; z-index: 2; width: 100%; height: 100%;">
            </div>
            <div style="position: absolute; left: 0px; top: 0px; z-index: 3; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);">
              <div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;">
              </div>
              <div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;">
              </div>
              <div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;">
              </div>
              <div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;">
              </div>
            </div>
          </div>
          <div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;">
            <a target="_blank" href="http://maps.google.com/maps?ll=51.522532,0.031639&z=16&t=m&hl=en-GB&gl=US&mapclient=apiv3" title="Click to see this area on Google Maps" style="position: static; overflow: visible; float: none; display: inline;">
              <div style="width: 62px; height: 26px; cursor: pointer;">
                <img src="<?php echo SITEPATH.WEBDIR; ?>/images/google_white2.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 62px; height: 26px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;">
              </div>
            </a>
          </div>
          <div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 167px; bottom: 0px; width: 121px;">
            <div draggable="false" class="gm-style-cc" style="-webkit-user-select: none;">
              <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                <div style="width: 1px;">
                </div>
                <div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);">
                </div>
              </div>
              <div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right;">
                <a style="color: rgb(68, 68, 68); text-decoration: none; cursor: pointer; display: none;">
                  Map Data
                </a>
                <span style="">
                  Map data ©2015 Google
                </span>
              </div>
            </div>
          </div>
          <div style="padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); -webkit-box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 256px; height: 148px; position: absolute; left: 525px; top: 160px; background-color: white;">
            <div style="padding: 0px 0px 10px; font-size: 16px;">
              Map Data
            </div>
            <div style="font-size: 13px;">
              Map data ©2015 Google
            </div>
            <div style="width: 13px; height: 13px; overflow: hidden; position: absolute; opacity: 0.7; right: 12px; top: 12px; z-index: 10000; cursor: pointer;">
              <img src="<?php echo SITEPATH.WEBDIR; ?>/images/mapcnt3.png" draggable="false" style="position: absolute; left: -2px; top: -336px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;">
            </div>
          </div>
          <div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;">
            <div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">
              Map data ©2015 Google
            </div>
          </div>
          <div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; position: absolute; -webkit-user-select: none; right: 95px; bottom: 0px;">
            <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
              <div style="width: 1px;">
              </div>
              <div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);">
              </div>
            </div>
            <div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right;">
              <a href="http://www.google.com/intl/en-GB_US/help/terms_maps.html" target="_blank" style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">
                Terms of Use
              </a>
            </div>
          </div>
          <div draggable="false" class="gm-style-cc" style="-webkit-user-select: none; position: absolute; right: 0px; bottom: 0px;">
            <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
              <div style="width: 1px;">
              </div>
              <div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);">
              </div>
            </div>
            <div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right;">
              <a target="_new" title="Report errors in the road map or imagery to Google" href="https://www.google.com/maps/@51.522532,0.031639,16z/data=!10m1!1e1!12b1?source=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;">
                Report a map error
              </a>
            </div>
          </div>
          <div class="gmnoprint" draggable="false" controlwidth="78" controlheight="356" style="margin: 5px; -webkit-user-select: none; position: absolute; left: 0px; top: 0px;">
            <div class="gmnoprint" controlwidth="78" controlheight="80" style="cursor: url(https://maps.gstatic.com/mapfiles/openhand_8_8.cur) 8 8, default; width: 78px; height: 78px; position: absolute; left: 0px; top: 0px;">
              <div class="gmnoprint" controlwidth="78" controlheight="80" style="width: 78px; height: 78px; position: absolute; left: 0px; top: 0px;">
                <div style="visibility: hidden;">
                  <svg version="1.1" overflow="hidden" width="78px" height="78px" viewBox="0 0 78 78" style="position: absolute; left: 0px; top: 0px;">
                    <circle cx="39" cy="39" r="35" stroke-width="3" fill-opacity="0.2" fill="#f2f4f6" stroke="#f2f4f6">
                    </circle>
                    <g transform="rotate(0 39 39)">
                      <rect x="33" y="0" rx="4" ry="4" width="12" height="11" stroke="#a6a6a6" stroke-width="1" fill="#f2f4f6">
                      </rect>
                      <polyline points="36.5,8.5 36.5,2.5 41.5,8.5 41.5,2.5" stroke-linejoin="bevel" stroke-width="1.5" fill="#f2f4f6" stroke="#000">
                      </polyline>
                    </g>
                  </svg>
                </div>
              </div>
              <div class="gmnoprint" controlwidth="59" controlheight="59" style="position: absolute; left: 10px; top: 11px;">
                <div style="width: 59px; height: 59px; overflow: hidden; position: relative;">
                  <img src="<?php echo SITEPATH.WEBDIR; ?>/images/mapcnt3.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;">
                  <div title="Pan left" style="position: absolute; left: 0px; top: 20px; width: 19.6666666666667px; height: 19.6666666666667px; cursor: pointer;">
                  </div>
                  <div title="Pan right" style="position: absolute; left: 39px; top: 20px; width: 19.6666666666667px; height: 19.6666666666667px; cursor: pointer;">
                  </div>
                  <div title="Pan up" style="position: absolute; left: 20px; top: 0px; width: 19.6666666666667px; height: 19.6666666666667px; cursor: pointer;">
                  </div>
                  <div title="Pan down" style="position: absolute; left: 20px; top: 39px; width: 19.6666666666667px; height: 19.6666666666667px; cursor: pointer;">
                  </div>
                </div>
              </div>
            </div>
            <div controlwidth="32" controlheight="40" style="cursor: url(https://maps.gstatic.com/mapfiles/openhand_8_8.cur) 8 8, default; position: absolute; left: 23px; top: 85px;">
              <div style="width: 32px; height: 40px; overflow: hidden; position: absolute; left: 0px; top: 0px;">
                <img src="<?php echo SITEPATH.WEBDIR; ?>/images/cb_scout2.png" draggable="false" style="position: absolute; left: -9px; top: -102px; width: 1028px; height: 214px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;">
              </div>
              <div style="width: 32px; height: 40px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;">
                <img src="<?php echo SITEPATH.WEBDIR; ?>/images/cb_scout2.png" draggable="false" style="position: absolute; left: -107px; top: -102px; width: 1028px; height: 214px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;">
              </div>
              <div style="width: 32px; height: 40px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;">
                <img src="<?php echo SITEPATH.WEBDIR; ?>/images/cb_scout2.png" draggable="false" style="position: absolute; left: -58px; top: -102px; width: 1028px; height: 214px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;">
              </div>
              <div style="width: 32px; height: 40px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;">
                <img src="<?php echo SITEPATH.WEBDIR; ?>/images/cb_scout2.png" draggable="false" style="position: absolute; left: -205px; top: -102px; width: 1028px; height: 214px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;">
              </div>
            </div>
            <div class="gmnoprint" controlwidth="0" controlheight="0" style="opacity: 0.6; display: none; position: absolute;">
              <div title="Rotate map 90 degrees" style="width: 22px; height: 22px; overflow: hidden; position: absolute; cursor: pointer;">
                <img src="<?php echo SITEPATH.WEBDIR; ?>/images/mapcnt3.png" draggable="false" style="position: absolute; left: -38px; top: -360px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;">
              </div>
            </div>
            <div class="gmnoprint" controlwidth="25" controlheight="226" style="position: absolute; left: 27px; top: 130px;">
              <div title="Zoom in" style="width: 23px; height: 24px; overflow: hidden; position: relative; cursor: pointer; z-index: 1;">
                <img src="<?php echo SITEPATH.WEBDIR; ?>/images/mapcnt3.png" draggable="false" style="position: absolute; left: -17px; top: -400px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;">
              </div>
              <div title="Click - to zoom" style="width: 25px; height: 178px; overflow: hidden; position: relative; cursor: pointer; top: -4px;">
                <img src="<?php echo SITEPATH.WEBDIR; ?>/images/mapcnt3.png" draggable="false" style="position: absolute; left: -17px; top: -87px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;">
              </div>
              <div title="Drag to zoom" style="width: 21px; height: 14px; overflow: hidden; position: absolute; -webkit-transition: top 0.25s ease; transition: top 0.25s ease; z-index: 2; cursor: url(https://maps.gstatic.com/mapfiles/openhand_8_8.cur) 8 8, default; left: 2px; top: 60px;">
                <img src="<?php echo SITEPATH.WEBDIR; ?>/images/mapcnt3.png" draggable="false" style="position: absolute; left: 0px; top: -384px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;">
              </div>
              <div title="Zoom out" style="width: 23px; height: 23px; overflow: hidden; position: relative; cursor: pointer; top: -4px; z-index: 3;">
                <img src="<?php echo SITEPATH.WEBDIR; ?>/images/mapcnt3.png" draggable="false" style="position: absolute; left: -17px; top: -361px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;">
              </div>
            </div>
          </div>
        </div>
      </div>
      <address class="color-bg">
        Glen Road, E13 8 London, UK
      </address>
    </div>
  </div>
  
  <!-- FOOTER -->
  <footer class="footer grey-bg">
    ©2014 Stamp LLC. All Rights Reserved
    
    <!-- OPTIONAL FOOTER LINKS -->
    <ul class="footer-links small-text">
      <li>
        <a href="" class="dark-text">
          About
        </a>
      </li>
      <li>
        <a href="" class="dark-text">
          Terms
        </a>
      </li>
      <li>
        <a href="" class="dark-text">
          Privacy
        </a>
      </li>
    </ul>
    
    <!-- SOCIAL ICONS -->
    <ul class="social-icons">
      <li>
        <a href="">
          <span class="icon-social-facebook transparent-text-dark">
          </span>
        </a>
      </li>
      <li>
        <a href="">
          <span class="icon-social-twitter transparent-text-dark">
          </span>
        </a>
      </li>
      <li>
        <a href="">
          <span class="icon-social-pinterest transparent-text-dark">
          </span>
        </a>
      </li>
      <li>
        <a href="">
          <span class="icon-social-googleplus transparent-text-dark">
          </span>
        </a>
      </li>
      <li>
        <a href="">
          <span class="icon-social-dribbble transparent-text-dark">
          </span>
        </a>
      </li>
    </ul>
    
  </footer>
  
  
  <!-- =========================
SCRIPTS   
============================== -->
  
  <script>
    /* PRE LOADER */
    jQuery(window).load(function () {
      "use strict";
      jQuery(".status").fadeOut();
      jQuery(".preloader").delay(1000).fadeOut("slow");
    }
                       )
  </script>
  <script src="<?php echo SITEPATH.WEBDIR; ?>/js/smoothscroll.js">
  </script>
  <script src="<?php echo SITEPATH.WEBDIR; ?>/js/bootstrap.min.js">
  </script>
  <script src="<?php echo SITEPATH.WEBDIR; ?>/js/jquery.nav.js">
  </script>
  <script src="<?php echo SITEPATH.WEBDIR; ?>/js/wow.min.js">
  </script>
  <script src="<?php echo SITEPATH.WEBDIR; ?>/js/nivo-lightbox.min.js">
  </script>
  <script src="<?php echo SITEPATH.WEBDIR; ?>/js/owl.carousel.min.js">
  </script>
  <script src="<?php echo SITEPATH.WEBDIR; ?>/js/jquery.stellar.min.js">
  </script>
  <script src="<?php echo SITEPATH.WEBDIR; ?>/js/retina.min.js">
  </script>
  <script src="<?php echo SITEPATH.WEBDIR; ?>/js/jquery.ajaxchimp.min.js">
  </script>
  
  <!-- GOGLE MAP -->
  <script src="<?php echo SITEPATH.WEBDIR; ?>/js/js.js">
  </script>
  <script src="<?php echo SITEPATH.WEBDIR; ?>/js/main.js">
  </script>
  
  <!-- CUSTOM JS  -->
  <script src="<?php echo SITEPATH.WEBDIR; ?>/js/custom.js">
  </script>
  
  
  <!-- =========================================================
STYLE SWITCHER | ONLY FOR DEMO NOT INCLUDED IN MAIN FILES
============================================================== -->
  <script type="text/javascript" src="<?php echo SITEPATH.WEBDIR; ?>/demo/demo.js">
  </script>
  <div class="stamp-style-switch" id="switch-style" style="flot:left;">
    <a id="toggle-switcher" class="switch-button" title="Change Styles">
      <span class="icon-adjust-vert wow tada animated animated" data-wow-iteration="infinite" data-wow-duration="2s" style="visibility: visible; -webkit-animation: tada 2s infinite;">
      </span>
    </a>
    <div class="switched-options">
      <div class="config-title">
        Homepage style:
      </div>
      <ul class="homepage-style">
        <li class="active">
          <a href="#">
            Style 1
          </a>
        </li>
        <li>
          <a href="#">
            Style 2
          </a>
        </li>
        <li>
          <a href="#">
            Style 3
          </a>
        </li>
        <li>
          <a href="#">
            Style 4
          </a>
        </li>
        <li>
          <a href="#">
            Style 5
          </a>
        </li>
        <li>
          <a href="#">
            Style 6
          </a>
        </li>
      </ul>
      
      <div class="config-title">
        Background style:
      </div>
      <ul>
        <li>
          <a href="#">
            Image BG
          </a>
        </li>
        <li class="active">
          <a href="#">
            Geometric Polygon BG 
            <span class="icon-check">
            </span>
          </a>
        </li>
        <li>
          <a href="#">
            Video BG
          </a>
        </li>
        <li>
          <a href="#">
            Gradient BG
          </a>
        </li>
      </ul>
      
      <div class="config-title">
        Colors :
      </div>
      <ul class="styles">
        <li>
          <div class="blue color" id="blue">
          </div>
        </li>
        
        <li>
          <div class="purple color" id="purple">
          </div>
        </li>
        
        <li>
          <div class="green2 color" id="green2">
          </div>
        </li>
        
        <li>
          <div class="orange color" id="orange">
          </div>
        </li>
        
        
        <li>
          <div class="green color" id="green">
          </div>
        </li>
        
        
        <li>
          <div class="red color" id="red">
          </div>
        </li>
        
      </ul>
    </div>
  </div>
  
  
   </form>
  </body>
  
</html>