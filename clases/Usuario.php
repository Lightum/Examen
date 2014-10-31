<?php

class Usuario {

	private $name;
	
	public function getUsuario(){
	echo "<br> Mostrar Usuario: ".$this->name;
	}
	
	public function setUsuario(){
	$this->name = "Ra&uacute;1";
	return $this->name;

	}
	
	public function readUsuarioG(){
            $sql01 = "SELECT * FROM usuario WHERE estatus = 1 ORDER BY ApellidoPaterno ASC";
            $result01 = mysql_query($sql01)or die("Error $sql01");
            echo "<div class=table-responsive>";
             echo "<table class=\"table table-striped\">";
                echo "<tr><td colspan=5 align=center><strong>Lista de Usuarios</strong></td></tr>";
                echo "<tr><th>id</th><th>nombre</th><th>Apellido P</th><th>Apellido M</th><th>nivel</th><tr>";
            while($field = mysql_fetch_array($result01)){
                $this->id = $field['id'];
                $this->nombre = utf8_decode($field['nombre']);
                $this->ApellidoPaterno = utf8_decode($field['ApellidoPaterno']);
                $this->ApellidoMaterno = utf8_decode($field['ApellidoMaterno']);
                $this->nivel = $field['nivel'];
                switch($this->nivel){
                    case 1:
                            $nivel = "Administrador";
                        break;
                    case 2:
                            $nivel = "Maestro";
                        break;
                    case 3:
                            $nivel = "Alumno";
                        break;
                }
                echo "<tr><td>$this->id</td><td>$this->nombre</td><td>$this->ApellidoPaterno</td><td>$this->ApellidoMaterno</td><td>$this->nivel</td></tr>";
            }
            echo "</table>";
            echo "</div>";
        }

}

?>