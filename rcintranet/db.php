<?php

include_once('include/adodb/adodb.inc.php'); # load code common to ADOdb
include_once('include/adodb/adodb-pager.inc.php');

$conn =  &NewADOConnection('mysql');

$conn->debug='0';
$conn->Connect("192.168.20.38", "rc_intra", "sistemas", "rccentral");

mysql_query("SET NAMES 'utf8'");

?>