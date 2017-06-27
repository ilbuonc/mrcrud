<!DOCTYPE html>
<?php 
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

include './init.php'; 
?>
<html lang="it">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>Mr CRUD</title>
<meta name="author" content="Giuseppe Dario Camiolo" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<!-- Material Design fonts -->
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">
<link href="css/bootstrap.css" rel="stylesheet">
<!-- Bootstrap Material Design -->
<link rel="stylesheet" type="text/css" href="css/bootstrap-material-design.min.css">
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.css">
<link href="css/styles.css" rel="stylesheet">
<!--<link href="css/font.css" rel="stylesheet">-->
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
</head>
<body>
<div id="top-nav" class="navbar navbar-inverse navbar-static-top"><!-- MENU Header -->
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	<i class="glyphicon glyphicon-menu-hamburger"></i>
      </button>
      <div class="col-lg-6 col-xs-3 navbar-brand"><img class="img-responsive" alt="Logo" src="images/mrcrud.png"/></div>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
	    <li><a id="m-main" class="ui-btn ui-btn-inline switch" href="?page=main"/><i class="glyphicon glyphicon-home"></i> Home </a></li>
            <li><a id="m-logout" class="ui-btn ui-btn-inline switch" href="?page=logout"><i class="glyphicon glyphicon-remove"></i> Logout </a></li>
      </ul>
    </div>
  </div>
</div><!-- MENU Header -->
<div id="PageMain" data-role=page><!-- PageMain -->
<div id="PageContent row" data-role=content><!-- PageContent -->
<?php
/**** Page switch ****/
if(isset($_SESSION['user']) && ($_SESSION['grant'] == 2)){/*User Login*/

switch($_GET['page']){
	case 'main':
		include './pages/profile.php';
		break;
	case 'logout':
		include './pages/logout.php';
		break;
	default:
		include './pages/profile.php';//Set default page
		break;
}

}elseif(isset($_SESSION['user']) && ($_SESSION['grant'] == 1)){/*Admin Login*/

switch($_GET['page']){
	case 'main':
		include './pages/about.php';
		break;
	case 'logout':
		include './pages/logout.php';
		break;
	default:
		include './pages/about.php';//Set default page
		break;
}

}else{include './pages/login.php';}
?>
</div><!-- PageContent -->
</div><!-- PageMain -->
<footer>
<div class="container">
 <div class="row">
  <div class="col-md-12">
   <hr>
   <h4 class="text-center"><strong>Mr CRUD</strong> is a GNU gpl v3.0 software <a href="https://github.com/ilbuonc/mrcrud" >github repository</a></h4>
<div>Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
<div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div>
   <hr>
  </div>
 </div>
</div>
<div id="status">
</div>
</footer>
<!-- JS script -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/function.js"></script>
<script type="text/javascript" src="js/profile.js"></script>
<script>
$(document).ready( function(){
	 $(".datepicker").datepicker({dateFormat:'dd/mm/yy'}); 
 rybot();
/*$.material.init();*/
/* FB init*/ 
  window.fbAsyncInit = function() {
    FB.init({
      appId      : <?php echo $_SESSION['appId']; ?>,
      xfbml      : true,
      version    : 'v2.9'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

});
function showR(ref){$(ref).show();}
</script>
<script type="text/javascript" src="js/fblogin.js"></script>
</body>
</html>
