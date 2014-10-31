<?php
  $login= new Login();

  

  $titulo = 'Bienvenidos al Login';

  $contenido = 'Contenido de la variable ...';

  

  $variables = array ('titulo'=>$titulo, 'contenido'=>$contenido);

  

  view('mylogin', $variables);

?>	