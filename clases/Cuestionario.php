<?php
error_reporting (0);
class Cuestionario {

public function gCuestionario(){

$id=$_SESSION["user"];

$sql_comp="SELECT * FROM evaluacion WHERE id_usuario=$id";
$consulta=mysql_query($sql_comp) or die ('error consulta datos');
$cuantos_generados=    mysql_num_rows($consulta);

if($cuantos_generados==0){


$n_preguntas=10;


$c_preguntas=("SELECT * FROM preguntas");
$dat_preguntas=mysql_query($c_preguntas)or die("Error al Consultar Preguntas".mysql_error());
$cuantos=    mysql_num_rows($dat_preguntas);
$numeros = range(1, $cuantos);
shuffle($numeros);$contador=0;
foreach ($numeros as $selector) {
$contador=$contador+1;
if($contador<=$n_preguntas){
$selector;echo "<br>";
$sql1="SELECT * FROM preguntas WHERE id_p=$selector";
$consulta1=   mysql_query($sql1)or die("error de consulta");
$id_nw  =mysql_result($consulta1,0,'id_p');
$pregunta  =mysql_result($consulta1,0,'pregunta');
$opc1  =mysql_result($consulta1,0,'opc1');
$opc2  =mysql_result($consulta1,0,'opc2');
$opc3  =mysql_result($consulta1,0,'opc3');
$opc4  =mysql_result($consulta1,0,'opc4');
$resp_c  =mysql_result($consulta1,0,'resp_c');

$sql="INSERT INTO evaluacion (id_p, id_usuario, no_preg, calif, completado) VALUES ($id_nw, '$id', '$contador', '0', '0')";
$consulta=mysql_query($sql) or die("Error en insercion de datos nuevos archivo de creación aleatoria".mysql_error());

}
}

}
}


public function consultQuest(){
$id=$_SESSION["user"];
$sql_comp="SELECT * FROM usuario WHERE id=$id";
$comp=mysql_query($sql_comp)or die("Error al buscar usuario".mysql_error());
$correctas= mysql_result($comp,0,'correctas');
$totales= mysql_result($comp,0,'totales');


$posicion = mysql_query("SELECT MAX(no_preg) AS preg FROM evaluacion WHERE calif>=1 AND id_usuario=$id");
if ($row_posicion = mysql_fetch_row($posicion)) {
$marcador_psocion = trim($row_posicion[0]);
}

$marcador_psocion_f=$marcador_psocion+1;

$sql="SELECT * FROM evaluacion WHERE id_usuario=$id";
$consulta=mysql_query($sql) or die ('No hay ningún cuestionario activo');
$cuantos_total=    mysql_num_rows($consulta);

if($cuantos_total>=$marcador_psocion_f  AND $totales==0 AND $cuantos_total>0){
echo"Usted se encuentra en la pregunta $marcador_psocion_f de $cuantos_total";
}

if($cuantos_total<$marcador_psocion_f  AND $totales==0 AND $cuantos_total>0){

$sql="SELECT * FROM evaluacion WHERE id_usuario=$id AND calif=1";
$consulta=mysql_query($sql) or die ('No hay ningún cuestionario activo');
$cnw=    mysql_num_rows($consulta);


$sql="SELECT * FROM usuario WHERE id=$id";
$consulta=mysql_query($sql) or die ('Usuario no Encontrado');
$calif_anterior= mysql_result($comp,0,'correctas');

echo"Se ha completado el cuestionario<br>";
echo"Calificación actual $calif_anterior<br>";
echo"Calificación nueva $cnw<br>";



if($cnw>$calif_anterior){

echo "Su calificación nueva es mayor que la anterior, se colocará la nueva calificación";

$sql= "UPDATE usuario SET correctas=$cnw WHERE id=$id"; 
$result0=mysql_query($sql)or die("Error al actualizar calificación");
}else{
echo "Su calificación nueva es menor o igual que la anterior, se dejará la califación anterior";
}
	
}
}



public function muestrapregunta(){
$id=$_SESSION["user"];
$sql="SELECT * FROM evaluacion WHERE id_usuario=$id";
$consulta=mysql_query($sql) or die ('error consulta datos');
$cuantos_generados=    mysql_num_rows($consulta);

if($cuantos_generados>=1){
$rsx = mysql_query("SELECT MAX(no_preg) AS preg FROM evaluacion WHERE calif>=1 AND id_usuario=$id");
if ($row = mysql_fetch_row($rsx)) {
$marcador = trim($row[0]);
}
}

$marcador_env=$marcador +1;

$sql_o_ev="SELECT * FROM evaluacion WHERE id_usuario=$id AND no_preg=$marcador_env";
$c_o_ev=mysql_query($sql_o_ev) or die ('Error al obtener evaluacion');
$id_p_obtenido    =mysql_result($c_o_ev,0,'id_p');

$sql="SELECT * FROM preguntas WHERE id_p=$id_p_obtenido AND NOT id_p IN(SELECT a.id_p FROM evaluacion AS a, preguntas AS b WHERE a.id_p = b.id_p AND id_usuario=$id AND calif>=1)";
$consulta=mysql_query($sql);
$quedan=    mysql_num_rows($consulta);

$pregunta  =mysql_result($consulta,0,'pregunta');
$opc1      =mysql_result($consulta,0,'opc1');
$opc2      =mysql_result($consulta,0,'opc2');
$opc3      =mysql_result($consulta,0,'opc3');
$opc4      =mysql_result($consulta,0,'opc4');

if($quedan!=0){
echo"
<form action='select_ajax' method='POST'>
<textarea  rows='7' cols='70' name='pregunta' required='required' pattern='[a-z A-Z á é í ó ú ñ Á É Í Ó Ú Ñ 0-9 . , ? ¿]{1,2048}' readonly/>$pregunta
</textarea>
<div id='mostrar2'>
<h3>Seleccione la respuesta correcta:</h3>

	<select name='select_ajax' class='respuesta_combo' id='select_ajax'>
	<option value='#'>Seleccione una opción</option>
    <option value='$opc1?$marcador_env?$id'>$opc1</option>
	<option value='$opc2?$marcador_env?$id'>$opc2</option>
	<option value='$opc3?$marcador_env?$id'>$opc3</option>
	<option value='$opc4?$marcador_env?$id'>$opc4</option>
	</select>
</div>

<input name='enviar' type='submit'  value='Enviar'  />";
}else{
echo"<a href='generarnuevo'>Realizar otro cuestionario</a>";
}
}

}
?>
