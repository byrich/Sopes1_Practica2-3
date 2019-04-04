<?php
$cluster   = Cassandra::cluster()
               ->withContactPoints('192.168.0.8:8083')
               ->build();
$session   = $cluster->connect("DB1");
$statement = new Cassandra\SimpleStatement("SELECT * FROM student");
$result    = $session->execute($statement);
echo "Result contains " . $result->count() . " rows";
