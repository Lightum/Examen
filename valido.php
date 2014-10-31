<?php
//error_reporting (0);
require ('bd/bd.php'); //se incluye la libería que conecta con la base de datos
//include("enc_light.php"); //se incluye la libería que permite codificar cadenas de texto
//include("denc_light.php"); //se incluye la libería que permite decodificar cadenas de texto
	$band=0;
	$user=$_REQUEST['usu'];  //se recuperan los datos indicados con el método request
	$pasw=$_REQUEST['psw'];
	//$pasw=md5($pasw1);
	
	
	if(($user=='') or ($pasw=='')) //se comprueba que los campos usuario y contraseña no estén vacíos
	{
	    
		$msg="Debe llenar los campos";
		$msg=utf8_encode($msg);
		print"<meta http-equiv='refresh' content='0;url=index.php?msg=$msg'>";
		$band=1;
		exit;
	}
	 
	
	if($band==0){
			$sql01 = "SELECT * FROM usuario WHERE usuario='$user' AND estatus = '1'";
            $result01 = mysql_query($sql01)or die(print"<meta http-equiv='refresh' content='0;url=index.php?msg=Acceso Denegado'>");
			$act=mysql_num_rows($result01);
				if($act=="0")
					{
						$band=1;
						
						$msg="Usuario desactivado, verificar con el administrador";
						$msg=utf8_encode($msg);
						echo"<meta http-equiv='refresh' content='0;url=index.php?msg=$msg'>";
						exit;
					}
		}

		if($band==0)
		{
			$sql="SELECT  * FROM usuario WHERE usuario = '$user' AND password = '$pasw'";
			$resp=mysql_query($sql) or die(print"<meta http-equiv='refresh' content='0;url=index.php?msg=Acceso Denegado 2'>");
			$nivel=mysql_result($resp,0,'nivel');
			$id=mysql_result($resp,0,'id');
			
		    if($nivel=='3' || $nivel=='2' || $nivel=='1'){
		
			if($nivel=='3')
			{
					session_start(); 
					$_SESSION['user']=$id;
      
					print"<meta http-equiv='refresh' content='0;url=cookie_sis.php?id=$id&nivel=$nivel'>";

			}
			
			if($nivel=='2')
			{
					session_start(); 
					$_SESSION['user']=$id;
      
					print"<meta http-equiv='refresh' content='0;url=cookie_sis.php?id=$id&nivel=$nivel'>";

			}

            if($nivel=='1'){

			session_start(); 
			$_SESSION['user']=$id;
      
			print"<meta http-equiv='refresh' content='0;url=cookie_sis.php?id=$id&nivel=$nivel'>";

				}	

			
			} else { // si no es un nivel de usuario se envía un mensaje de error
					
					$msg="nivel de Usuario incorrecto, verificar con el administrador";
					$msg=utf8_encode($msg);
					echo"<meta http-equiv='refresh' content='0;url=index.php?msg=$msg'>";
					exit;
			}	
			
		}
		

?>