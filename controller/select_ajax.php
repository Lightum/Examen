<?php

$select_ajax=$_REQUEST['select_ajax'];	

$cadena=explode("?",$select_ajax);


$sql="SELECT * FROM evaluacion WHERE id_usuario=$cadena[2] AND no_preg=$cadena[1]";
$consulta=mysql_query($sql) or die ("error al obtener preguntas de evaluacion".mysql_error());
$id_p    =mysql_result($consulta,0,'id_p');

$sql2="SELECT resp_c FROM preguntas WHERE id_p=$id_p";
$consulta2=mysql_query($sql2) or die ('error al obtener respuestas)');
$respc    =mysql_result($consulta2,0);

if($respc==$cadena[0]){
echo"<div class='exito2'>Respuesta correcta</div>";

$sql_i_ev="UPDATE evaluacion SET calif=1 WHERE id_usuario=$cadena[2] AND no_preg=$cadena[1] AND id_p=$id_p";
$c_i_ev=mysql_query($sql_i_ev) or die ('error al obtener preguntas)');

}else{

echo"<div class='error2'>Respuesta incorrecta</div><br>";
echo"<div class='info2'>Usted respondío: <br> <b>$cadena[0]</b></div>";
echo"<div class='exito2'>La respuesta correcta es: <br> <b>$respc</b></div>";

$sql_i_ev="UPDATE evaluacion SET calif=2 WHERE id_usuario=$cadena[2] AND no_preg=$cadena[1] AND id_p=$id_p";
$c_i_ev=mysql_query($sql_i_ev) or die ('error al obtener preguntas)');
}

if($respc==false){
echo "<div class='error2'>Respuesta no válida, seleccione alguna de las opciones que se muestran abajo</div>";
}

?>
<a href="cuestionario">Continuar</a> 	