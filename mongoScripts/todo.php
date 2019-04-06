<?php
use MongoDB\Driver\Manager;
use MongoDB\Driver\BulkWrite;
use MongoDB\Driver\Query;
//conexion
$con = new Manager('mongodb://mongodb:27017');
//espacio de escritura
$miDB = "hola.Hola";
$dw = new BulkWrite();
$con->insert(['entry'=>time()]);
$con->executeBulkWrite($miDB,$dw);

if (($res = $con->executeQuery($miDB,new Query([],[])))){
	var_dump($res->toArray());
}