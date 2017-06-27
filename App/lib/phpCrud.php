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

class crud
{

private $db;
/*Set variables*/
public function __set($name, $value)
{

switch($name)
{

case 'username':
$this->username = $value;
break;
case 'password':
$this->password = $value;
break;
case 'dsn':
$this->dsn = $value;
break;
default:
throw new Exception("$name is invalid");

}

}   
/*check variables have default value*/
public function __isset($name)

{

switch($name)
{

case 'username':
$this->username = null;
break;
case 'password':
$this->password = null;
break;

}

}
/*
Connect to the database and set the error mode to Exception
Throws PDOException on failure
*/
public function conn()
{

if (!$this->db instanceof PDO)
{
    if(isset($this->username) && isset($this->password)){
     $this->db = new PDO($this->dsn, $this->username, $this->password);
    }else{
     /*Usually SQLite Connection*/ 
     $this->db = new PDO($this->dsn);
    }
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

}
/*
select values from table - For testing only
access public
param string $table The name of the table
param string $fieldname
param string $id
return array on success or throw PDOException on failure
*/
public function dbSelect($table, $fieldname=null, $id=null)
{

$this->conn();
$sql = "SELECT * FROM `$table` WHERE `$fieldname`=:id";
$stmt = $this->db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_ASSOC);

}
/*
execute a raw select - Very usefull to retrive data from stored procedure
access public
param string $sql
return array
*/
public function rawSelect($sql)
{

$this->conn();
$stmt = $this->db->prepare($sql);
$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_ASSOC);

}
/*
run a raw query - Really dangerous TODO remove 
param string The query to run
*/
public function rawQuery($sql)
{

$this->conn();
$this->db->query($sql);

}
/*
Insert a value into a table
acces public
param string $table
param array $values
return int The last Insert Id on success or throw PDOexeption on failure
*/
public function dbInsert($table, $values)
{

$this->conn();
/*** snarg the field names from the first array member ***/
$fieldnames = array_keys($values[0]);
/*** now build the query ***/
$size = sizeof($fieldnames);
$i = 1;
$sql = "INSERT INTO $table";
/*** set the field names ***/
$fields = '( ' . implode(' ,', $fieldnames) . ' )';
/*** set the placeholders ***/
$bound = '(:' . implode(', :', $fieldnames) . ' )';
/*** put the query together ***/
$sql .= $fields.' VALUES '.$bound;
/*** prepare and execute ***/
$stmt = $this->db->prepare($sql);
foreach($values as $vals)
{
    $stmt->execute($vals);
}
return $this->db->lastInsertId();

}
/**
Update a value in a table
access public
param string $table
param array $values
param string $pk The primary key
param string $id The id
throws PDOException on failure
*/
public function dbUpdate($table, $values, $pk, $id)
{

$this->conn();
$sql = "UPDATE `$table` SET ";
$array=array();
var_dump($values);
foreach($values as $f=>$v)
{

array_push($array,"`$f`='{$v}'");

}
$sql .= implode(' ,', $array); 
$sql .= " WHERE `$pk` = :id";
$stmt = $this->db->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_STR);
$stmt->execute();

}
/**
Delete a record from a table
access public
param string $table
param string $fieldname
param string $id
throws PDOexception on failure
*/
public function dbDelete($table, $fieldname, $id)
{

$this->conn();
$sql = "DELETE FROM `$table` WHERE `$fieldname` = :id";
$stmt = $this->db->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_STR);
$stmt->execute();

}

} /*** end of class ***/
?>
