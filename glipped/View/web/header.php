
  <!-- =========================
SECTION: HOME / HEADER  
============================== -->
  <header class="header" data-stellar-background-ratio="0.5" id="home" style="background-position: 50% 0%;">
    
    <!-- COLOR OVER IMAGE -->
    <div class="overlay-layer">
      
      <!-- STICKY NAVIGATION -->
      <div class="navbar navbar-inverse bs-docs-nav navbar-fixed-top sticky-navigation appear-on-scroll" role="navigation" style="top: -70px; opacity: 0;">
        <div class="container">
          <div class="navbar-header">
            
            <!-- LOGO ON STICKY NAV BAR -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#stamp-navigation">
              <span class="sr-only">
                Toggle navigation
              </span>
              <span class="icon-grid-2x2">
              </span>
            </button>
            
            <!-- LOGO -->
            <a class="navbar-brand" href="index.html#">
              <img src="<?php echo SITEPATH.WEBDIR; ?>/images/logo-nav.png" alt="">
            </a>
            
          </div>
          
          <!-- TOP BAR -->
          <div class="navbar-collapse collapse" id="stamp-navigation">
            
            <!-- NAVIGATION LINK -->
            <ul class="nav navbar-nav navbar-left main-navigation small-text">
              <li>
                <a href="#section2">
                  Why Us?
                </a>
              </li>
              <li>
                <a href="#section5">
                  Benefits
                </a>
              </li>
              <li>
                <a href="#section6">
                  Pricing
                </a>
              </li>
              <li>
                <a href="#section7">
                  Explore
                </a>
              </li>
              <li>
                <a href="#section10">
                  Testimonials
                </a>
              </li>
                      </ul>
                      
                      <!-- LOGIN REGISTER -->
                      <ul class="nav navbar-nav navbar-right login-register small-text">
                        <li class="register-button js-register inpage-scroll">
                          <a href="" class="navbar-register-button" data-toggle="modal" data-target="#stamp-modal">
                            Login
                          </a>
                        </li>
                      </ul>
                  </div>
				     
              </div>
              <!-- /END CONTAINER -->
          </div>
          <!-- /END STICKY NAVIGATION -->
          
          <!-- CONTAINER -->
          <div class="container">
		  
		  <div class="cont_left"></div>
		  
            <div class="cont_rgt">
            
              <div class="col-md-12">
                
               
                
                  
                  <!-- WELCOM MESSAGE -->
<div class="ct_an_ac">  
 <h1 class="intro white-text">Create an account</h1>
</div>
	
<div class="inpt_lft"> 
<input type="text" id="txtfname" name="First name"  ng-model="Signup.fname" class="form-control input-box placeholder wow fadeInRight" placeholder="First name" /></div>
<div class="inpt_rgt">
<input type="text" id="txtlname" name="Last name"  ng-model="Signup.lname"  class="form-control input-box placeholder wow fadeInRight" placeholder="Last name" /></div>
<input type="email" id="emailsignup" name="email"  ng-model="Signup.Email"  class="form-control input-box placeholder wow fadeInRight" placeholder="Email" />
<input type="password" id="txtpassword" name="password"   ng-model="Signup.Password"  class="form-control input-box placeholder wow fadeInRight" placeholder="Password" />
<input type="password" id="txtcnfrmpwd" name="Password"  ng-model="Signup.cPassword"  class="form-control input-box placeholder wow fadeInRight" placeholder="Confirm Password" />

<div class="ct_an_ac">
    <input type="button" value="Signup"  ng-click="SignupFun();" class="btn btn-primary standard-button wow fadeInRight" style="visibility: hidden; -webkit-animation: none 2s;"/>

</div>
				  
                  <!-- /END BUTTON -->
                  
                
               
              </div>
            </div>
			</div>
          </div>
      
  </header>
  
  <div id="popup_test" class="popupContact" style="border: 18px solid gray;border-radius:18px;width: 400px;min-height:170px;">
	<div style="border:8px solid #40A4E0;min-height:170px;padding: 0px;">
	
			
		<h4 class="dark-text form-heading">Thanks ! you are successfully sign-up.</h4>
                
                <p>
                    <span class="icon-check-alt2 colored-text">
                        Verification link successfully sent on your email address. 
                    </span>

                </p>
                <div align="center" style="margin-top: 30px;">
			<a onclick="disablePopup();">Close</a>
		</div>			
	</div>
</div><div id="backgroundPopup"></div>
  
  