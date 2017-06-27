<?php // Profile 
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

//Get Data From customer
$res = $crud->dbSelect('customer', 'id', $_SESSION['id_ana']);
$customer=$res[0];
?>
<div class="container">
 <div class="row">
  <div class="col-xs-12">  
<!-- Nav tabs -->
<div>
<ul id="myTab" class="nav nav-tabs" role="tablist">
 <li role="presentation" class="active">
  <a href="#myprofile" aria-controls="myprofile" role="tab" data-toggle="tab">My Data</a>
 </li>
</ul>
</div>
<!-- Tab -->
<div class="tab-content">
<div role="tabpanel" class="tab-pane active" id="myprofile">
 <form name="myprofile" class="form form-vertical" action="javascript:updMyProfile()">
 <input type="hidden" name="table" value="customer" />
 <input class="column" type="hidden" name="column" value="id" />
 <input class="value" type="hidden" name="value" value="<?php echo "$_SESSION[id_ana]"?>" />
 <div class="control-group">
  <label>Name</label>
  <div class="controls">
   <input class="form-control Name" type="text" name="Name" value="<?php echo "$customer[Name]"?>" />
  </div>
 </div>
 <div class="control-group">
  <label>Address</label>
  <div class="controls">
   <input class="form-control Address" type="text" name="Address" value="<?php echo "$customer[Address]"?>" />
  </div>
 </div>
 <div class="control-group">
  <label>City</label>
  <div class="controls">
   <input class="form-control City" type="text" name="City" value="<?php echo "$customer[City]"?>" />
  </div>
 </div>
 <div class="control-group">
  <label>Tel</label>
  <div class="controls">
   <input class="form-control Tel" type="text" name="Tel" value="<?php echo "$customer[Tel]"?>" />
  </div>
 </div>
 <div class="control-group">
  <label>Email</label>
  <div class="controls">
   <input class="form-control Email" type="email" name="Email" value="<?php echo "$customer[Email]"?>" />
  </div>
 </div>
 <div class="control-group">
  <div class="controls">
   <input class="action btn btn-raised" type="submit" value="OK" />
  </div>
 </div>
 </form>
</div>
</div>
  </div>
 </div>
</div>
