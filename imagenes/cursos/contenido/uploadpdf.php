<? 
$cadenatexto = $_GET["cadenatexto"]; 
$nombre_archivo = $cadenatexto .".pdf";
$tipo_archivo = $HTTP_POST_FILES['userfile']['type']; 
$tamano_archivo = $HTTP_POST_FILES['userfile']['size']; 
if (!((strpos($tipo_archivo, "pdf") || strpos($tipo_archivo, "PDF")) )) { 
    echo "La extensión de los archivos no es correcta. Se permiten archivos .png o .jpg"; 
}else{ 
    if (move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], $nombre_archivo)){ 
 		
	
		
	   echo "<div align=center>El archivo ha sido cargado correctamente.</div><div align=center>";   
		  echo "<a href=../../../admin/servicio.php>"; 
	   echo "VOLVER</a></div>";
    }else{ 
       echo "Ocurrió algún error al subir el fichero. No pudo guardarse."; 
    }  
} 
?> 