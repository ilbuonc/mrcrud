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
header('Content-Type: application/json');
include '../dbconfig.php';
//dofblogin
$fbuser=$_POST['fname'].'_'.$_POST['fid'];
$_SESSION['fbuser']=$fbuser;
$res = $crud->dbSelect('user', 'user', $fbuser);
if($res[0]['user']){

$msg = "Your Account was already created!"; 
echo json_encode(array('result'=>$msg));

}else{

$customerR=array(
'Name'=>$_POST['fname'],
'Address'=>'todo',
'City'=>'todo',
'Tel'=>'todo',
'Email'=>'todo'
);
$customerA=array('0'=>$customerR);
$customerT='customer';
$tch=$crud->dbInsert($customerT,$customerA);
if($tch >0){

$userR=array(
'Name'=>$_POST['fname'],
'user'=>$fbuser,
'pass'=>'xD',
'grant'=>'2',
'id_ana'=>$tch
);
$userA=array('0'=>$userR);
$userT='user';
$usr=$crud->dbInsert($userT,$userA);

}
$msg = "FB Account successfully created!"; 
echo json_encode(array('result'=>$msg));

}
?>
