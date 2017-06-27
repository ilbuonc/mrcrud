<?php //Login page
/* ********************************************************************** 
MRCRUD - My Rude Create Read Update Delete
Copyright (C) 2017  Giuseppe Dario Camiolo

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
********************************************************************** */

?>
<div class="container">
 <div class="row">
  <div class="col-xs-12">
<!-- Accordion -->
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<!-- fblogin -->
 <div class="panel panel-default">
   <div class="panel-heading" role="tab" id="FBheadingLogIn">
      <h4 class="panel-title">
        <a  class="btn btn-raised" role="button" data-toggle="collapse" data-parent="#accordion" href="#FBcollapseLogIn" aria-expanded="true" aria-controls="collapseLogIn">
         User Log In 
        </a>
      </h4>
   </div>
   <div id="FBcollapseLogIn" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="FBheadingLogIn">
<h5 class="alert alert-info">Please allow Facebook Login<hr>
<div class="control-group screen" id="fblogin">
 <div class="fb-login-button" scope="public_profile,email" onlogin="checkLoginState();" ata-max-rows="1" data-size="large" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>
</div>
</h5>
    </div>
   </div>
 </div>
<!-- login -->
 <div class="panel panel-default">
   <div class="panel-heading" role="tab" id="headingLogIn">
      <h4 class="panel-title">
        <a  class="btn btn-raised" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseLogIn" aria-expanded="true" aria-controls="collapseLogIn">
         Admin Log In 
        </a>
      </h4>
   </div>
   <div id="collapseLogIn" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingLogIn">
    <div class="panel-body">
<div class="control-group screen" id="login">
 <form method="POST" action="#" enctype="application/x-www-form-urlencoded">
 <p><input class="form-control" type="email" name="username" id="username" size="25" placeholder="EMAIL" required/></p>
 <p><input class="form-control" type="password" name="passwd" id="passwd" size="25" placeholder="PASSWORD" required/></p>
 <p>
 <input class="btn btn-raised" type="submit" name="submit" id="submit" value="Login"/>
 </p>
 </form>
</div>
    </div>
   </div>
 </div>
</div>
  </div>
 </div>
</div>
