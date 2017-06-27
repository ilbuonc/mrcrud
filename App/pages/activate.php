<?php //Activate page
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
<!-- Activate-->
<div class="container">
 <div class="row">
  <div class="col-xs-12">
   <hr>
   <h1>Please, change your password!</h1>
 <form name="activateAccount" class="form form-vertical" action="javascript:activateAccount()">
 <input type="hidden" name="table" value="user" />
 <input class="column" type="hidden" name="column" value="id" />
 <p><input class="form-control" type="password" name="pass" id="Apasswd" placeholder="PASSWORD" required/></p>
 <p><input class="form-control" type="password" name="checkPass" id="checkPass" placeholder="confirm your PASSWORD" required/></p>
 <input class="value" type="hidden" name="value" value="<?php echo "$_SESSION[id]"?>" />
 <input type="hidden" name="grant" value="2" />
 <div class="control-group">
  <div class="controls">
   <input class="action btn btn-default" type="submit" value="Activate" />
  </div>
 </div>
 </form>
   <hr>
  </div>
 </div>
</div>
<!-- Activate -->
