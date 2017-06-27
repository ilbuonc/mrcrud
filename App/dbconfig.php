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

#Static Param, if you like
#Configure path
$root='<my root dir>';
$path=$root.'App';
$DBpath=$root.'DB';
#Configure url
$base='<my base url>';
#Configure db
include $path.'/lib/phpCrud.php';
/*** a new crud object ***/
$crud = new crud();
/*** SQLite ***/
$crud->dsn = "sqlite:$DBpath/data.sqlite";
/*** MySQL or MariaDB ***/
#$dbname='<your db name>';
#$dbhost='<your db host>';
#$crud->dsn = "mysql:dbname=$dbname;host=$dbhost";
/*** username and password ***/
#$crud->username = '<your db user>';
#$crud->password = '<your db user password>';
?>
