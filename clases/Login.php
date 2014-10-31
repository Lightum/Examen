<?php

class Login {

	private $name;
	
	
public function inicioLogin(){

if($nivel<>"1" AND $nivel<>"2" AND $nivel<>"3"){

if(isset($_GET['msg'])) {
$mostrar=utf8_decode($_GET['msg']);
echo "<div class='alerta'>$mostrar</div>";
}echo"<section class='formulario'>
<form action='./valido.php' method='POST'>
<label for='usuarios' class='login'>Usuario:</label>
<input type='text' name='usu' class='cajas usuario' autocomplete='off' required='required'>
<br />
<label for='password' class='login'>Contraseña:</label>              
<input type='password' name='psw' class='cajas pass' autocomplete='off' required='required' >
<br>
<br>
<input type='submit' value='Accesar' id='enviar'>
</form>
</section>";
}
}
}

?>