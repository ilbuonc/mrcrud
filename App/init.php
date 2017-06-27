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

session_start();
//FB params
$_SESSION['appId'] = '<your FB App ID>';
// Create a new CSRF token.
if (! isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = base64_encode(openssl_random_pseudo_bytes(32));
}
//Lower Grant
if (! isset($_SESSION['grant'])){$_SESSION['grant'] = '0';}
include './dbconfig.php';
//dofblogin
if(isset($_SESSION['fbuser'])){
 $_POST['username']=$_SESSION['fbuser'];
 $_POST['passwd']='xD';
}
if(isset($_POST['username']) && isset($_POST['passwd'])){

$res = $crud->dbSelect('user', 'user', $_POST['username']);
//var_dump($res);
//TODO: MD5 check
if($res[0]['pass'] === $_POST['passwd']){

foreach($res[0] as $ref=>$val){
	$_SESSION[$ref]=$val;
}

}

}
//var_dump($_SESSION);
//var_dump($_POST);
//var_dump($_GET);
?>
