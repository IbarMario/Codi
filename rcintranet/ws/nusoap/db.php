<?php

include_once('include/adodb/adodb.inc.php'); # load code common to ADOdb
include_once('include/adodb/adodb-pager.inc.php');

$conn =  &NewADOConnection('mysql');

$conn->debug='0';
$conn->Connect("localhost", "root", "", "tarea");

mysql_query("SET NAMES 'utf8'");

?>