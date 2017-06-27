<?php // showRaw 
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

header('Content-Type: application/json');
include 'dbconfig.php';
$data1=$_POST['data1'];
$sql = "CALL $_POST[sqlS]('$data1')";
//var_dump($sql);
$res=$crud->rawSelect($sql);
echo json_encode(array('result'=>$res));

}
?>
