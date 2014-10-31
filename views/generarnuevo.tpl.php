<?php
error_reporting (0);
$generarnuevo02 = new Generarnuevo();

?>
<html>
<head>
</head>
<body>
<h1><?php $titulo ?></h1>

<p><?php $contenido ?></p>

<p><?php $nombre ?></p>

<p>
<?php     
$generarnuevo02->nCuest();
?>
</p>