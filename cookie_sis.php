<?php
require ('bd/bd.php');
//include("denc_light.php");
?>
<?php

$nivel=$_GET['nivel'];
$id_usu=$_GET['id'];

$band=0;
	
	if($id_usu==""){
	
			$band=1;
			$msg="Error al intentar entrar al sistema";
			echo"<meta http-equiv='refresh' content='0;url=index.php?msg=$msg'>";
			exit;
	}		
	
	if($nivel=="1"){ 
	    
			$sql="SELECT * FROM usuario WHERE nivel='$nivel' AND estatus='1'";
			$result1=mysql_query($sql) or die(print"<meta http-equiv='refresh' content='0;url=index.php?msg=Acceso Denegado'>");
			$filas=mysql_num_rows($result1);
		
			if($filas>0){
			$id_usu=mysql_result($result1,0,'id');
			setcookie('id_usu',$id_usu);
			setcookie('nivel','1');
						
			
			print"<meta http-equiv='refresh' content='0;url=index.php'>";   		
			}else{
			$msg="Cuentas para Admin no Activadas";
			print"<meta http-equiv='refresh' content='0;url=index.php?msg=$msg'>"; 
			exit;
			}
	} 	
	
	if($nivel=="2"){ 
	    
			$sql="SELECT * FROM usuario WHERE nivel='$nivel' and estatus='1'";
			$result1=mysql_query($sql) or die(print"<meta http-equiv='refresh' content='0;url=index.php?msg=Acceso Denegado'>");
			$filas=mysql_num_rows($result1);
		
			if($filas>0){
			$id_usu=mysql_result($result1,0,'id');
			setcookie('id_usu',$id_usu);
			setcookie('nivel','2');
						
			
			print"<meta http-equiv='refresh' content='0;url=index.php'>";   		
			}else{
			$msg="Cuentas para Maestro no Activadas";
			print"<meta http-equiv='refresh' content='0;url=index.php?msg=$msg'>"; 
			exit;
			}
	}

	if($nivel=="3"){ 
	    
			$sql="SELECT * FROM usuario WHERE nivel='$nivel' and estatus='1'";
			$result1=mysql_query($sql) or die(print"<meta http-equiv='refresh' content='0;url=index.php?msg=Acceso Denegado'>");
			$filas=mysql_num_rows($result1);
		
			if($filas>0){
			$id_usu=mysql_result($result1,0,'id');
			setcookie('id_usu',$id_usu);
			setcookie('nivel','3');
						
			
			print"<meta http-equiv='refresh' content='0;url=index.php'>";   		
			}else{
			$msg="Cuentas para Usuario no Activadas";
			print"<meta http-equiv='refresh' content='0;url=index.php?msg=$msg'>"; 
			exit;
			}
	} 	
?>