<?php
		$conn=mysql_connect("localhost","cursoshs_user","T,0amrI9d)fq"); // ESTABLECER CONEXION
		if(!$conn){
			die("error al conectarse al motor");
		}
		$mibase = mysql_select_db("cursoshs_bd",$conn); //SELECCION BD
		if(!$mibase){
			die("error al selecionar la base de datos");
		}
		
?>