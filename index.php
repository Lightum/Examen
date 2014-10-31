<?php
require ('helpers.php');
require ('template/header.php');
require ('template/footer.php');
//require ('template/menu.php');
require ('clases/Usuario.php');
require ('clases/Login.php');
require ('clases/Cuestionario.php');
require ('clases/Generarnuevo.php');
require ('bd/bd.php');

if(empty($_GET['url']))
	$_GET['url']='home';
	
	controller($_GET['url']);
	
?>	