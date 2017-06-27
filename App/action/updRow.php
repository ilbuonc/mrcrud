<?php // updRow
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
if($_SESSION['grant'] > 0){ 

include '../dbconfig.php';
$array=array();
foreach($_POST as $f=>$v)
{
	if(($f !='table') && ($f !='column') && ($f !='value') && ($f != 'checkPass')){$array[$f]=SQLite3::escapeString($v);}
}
$crud->dbUpdate($_POST['table'],$array,$_POST['column'],$_POST['value']);
//if($_SESSION['grant']=0 && $_POST['table']='user' && $_POST['grant']=2){$_SESSION['grant']=2;}
//$res = $crud->dbSelect('user', 'user', 'test');
}
?>
