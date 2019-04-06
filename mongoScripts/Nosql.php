<?php
use MongoDB\Driver\Manager;
use MongoDB\Driver\BulkWrite;
use MongoDB\Driver\Query;

if ($_GET["db"]==2)//si es mongo
{

}
$con = new Manager('mongodb://mongodb:27017');
$miDB = "hola.adios";
$bw = new BulkWrite();
$document = array(
	'texto'=>'un texto'
);
$bw->insert($document);
$con->executeBulkWrite($miDB,$bw);
$bw1 = new BulkWrite();
$document = array(
	'texto'=>'un texto2'
);
$bw1->insert($document);
$con->executeBulkWrite($miDB,$bw1);
//$con->executeBulkWrite($miDB,$bw);
//$con->executeBulkWrite($miDB,$bw);
//$con->executeBulkWrite($miDB,$bw);


$res = $con->executeQuery($miDB,new Query([],[]));
foreach($res as $r)
{
	echo $r->texto . "\n";
}
echo "----------";
$bw2 = new BulkWrite();
$bw2->delete([],['limit' => 0]);
$con->executeBulkWrite($miDB,$bw2);
$res = $con->executeQuery($miDB,new Query([],[]));
foreach($res as $r)
{
	echo $r->texto;
}
