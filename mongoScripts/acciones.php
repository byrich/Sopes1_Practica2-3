<?php
$url = "nginxServer:8080/accion.php?bd=". $_GET["bd"] ."&accion=". $_GET["accion"] ."&mensaje=". $_GET["mensaje"];
header('Location: '.$url);
