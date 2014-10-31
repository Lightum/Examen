<?php

class Generarnuevo{
	
public function nCuest(){

$c_preguntas=("TRUNCATE TABLE `evaluacion`");
$dat_preguntas=mysql_query($c_preguntas)or die("Error al Consultar Preguntas".mysql_error());

Echo "Cuestionario Generado, proceda a responderlo";

}
}	
?>