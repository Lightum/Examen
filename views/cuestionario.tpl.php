<?php

$cuestionario02 = new Cuestionario();

?>

<html>

<head></head>

<body>



<h1><?php $titulo ?></h1>

<p><?php $contenido ?></p>

<p><?php $nombre ?></p>



<p>
<?php
	$cuestionario02->gCuestionario();
	$cuestionario02->consultQuest();
	$cuestionario02->muestrapregunta();
?>

</p>
