<?php
use MongoDB\Driver\Manager;
use MongoDB\Driver\BulkWrite;
use MongoDB\Driver\Query;

if ($_GET["db"]==2)//si es mongo
{
	$con = new Manager('mongodb://mongodb:27017');
	$miDB = "hola.adios";
	if ($_GET["accion"]==1)//insertar
	{
		$bw = new BulkWrite();
		$document = array(
			'texto'=>$_GET["mensaje"];
		);
		$bw->insert($document);
		$con->executeBulkWrite($miDB,$bw);
	}
	else if ($_GET["accion"]==2)//eliminar
	{
		$bw2 = new BulkWrite();
		$bw2->delete([],['limit' => 0]);
		$con->executeBulkWrite($miDB,$bw2);
	}
	else//modificar
	{
		$res = $con->executeQuery($miDB,new Query([],[]));
		foreach($res as $r)
		{
			echo $r->texto . "\n";
		}
	}
}
else{
	
}
