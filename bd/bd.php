<?php

    $db_name = "u149971941_umi";
    $db_server = "mysql.nixiweb.com";
    $db_user = "u149971941_umi";
    $db_pass = "password";
    $db_connection = mysql_connect($db_server, $db_user, $db_pass)or die("Error al conectar la BD");
    mysql_select_db($db_name, $db_connection)or die("La BD no existe");
    mysql_query("SET NAMES utf8");

?>