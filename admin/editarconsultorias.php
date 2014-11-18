<?php
session_start();
if ($_SESSION["$nusuario"] == "") { 
	header("location: sesion.php","_self");
} else {
include("../Conexion.php");
if ($_POST["Modificar"]){
	$insertar = "UPDATE consultorias SET titulo ='".$_POST["titulo"]."',subtitulo ='".$_POST["subtitulo"]."',fecha ='".$_POST["fecha"]."',contenido_breve ='".$_POST["contenido_breve"]."',contenido_completo ='".$_POST["contenido_completo"]."'   WHERE id  = '" .$_GET["id"]."' " ; 
	$sentencia=mysql_query($insertar,$conn)or die("Error al grabar : ".mysql_error);


?>
<script language="javascript">
	window.opener.document.location="consultorias.php"
	window.close();
	</script>	
<?php } ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Editar</title>
<link href="../css/admin.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php 
$listado = "select * from consultorias where id ='$_GET[id]'";
$sentencia = mysql_query($listado,$conn);
while($rs=mysql_fetch_array($sentencia,$mibase)){
?>
<form action="editarconsultorias.php?id=<?php echo $_GET["id"]; ?>" method="post" name="form1" id="form1">
  <table width="50%" border="0" align="left" cellpadding="0" cellspacing="0">
    <tr>
      <td width="81%" valign="top"><p>
        <label>
          <input type="submit" name="Modificar" id="Modificar" value="Modificar" />
          </label>
        </p>
        <table width="76%" border="1" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="32" align="center" valign="top" class="textos">Titulo </td>
            <td valign="top" class="Letras1"><input name="titulo" type="text" id="titulo_curso4" value="<?php echo $rs["titulo"]; ?>" /></td>
          </tr>
          <tr>
            <td height="32" align="center" valign="top" class="textos">SubTitulo </td>
            <td valign="top" class="Letras1"><input name="subtitulo" type="text" id="titulo_curso3" value="<?php echo $rs["subtitulo"]; ?>" /></td>
          </tr>
          <tr>
            <td width="35%" height="32" align="center" valign="top" class="textos">Fecha </td>
            <td width="65%" valign="top" class="Letras1"><input name="fecha" type="text" id="fecha" value="<?php echo $rs["fecha"]; ?>" /></td>
          </tr>
          <tr>
            <td height="96" align="center" valign="top" class="textos">Contenido Breve</td>
            <td valign="top" class="Letras1"><span class="textobox">
              <textarea name="contenido_breve" cols="40" rows="5" class="Letras1" id="contenido_curso"><?php echo $rs["contenido_breve"]; ?></textarea>
            </span></td>
          </tr>
          <tr>
            <td align="center" valign="top" class="textos">Contenido Completo</td>
            <td valign="top" class="Letras1"><span class="textobox">
              <textarea name="contenido_completo" cols="40" rows="5" class="Letras1" id="contenido4"><?php echo $rs["contenido_completo"]; ?></textarea>
            </span></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td height="68" valign="top"><div align="center"></div></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<?php } ?>
</body>
</html>
<?php } ?>