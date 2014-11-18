<?php
session_start();
include("../Conexion.php");
if($_GET["fun"]=="cerrar"){
	unset($_SESSION["$nusuario"]);
}
if($_POST["Entrar"]){	
	$password = md5($_POST["password_txt"]);
	$listado = "select * from 	usuario where usuario = '$_POST[nusuario_txt]' and password  = '$password'  ";
	$sentencia = mysql_query($listado,$conn);
	if($rs=mysql_fetch_array($sentencia,$mibase)){
		$_SESSION["$nusuario"] = $rs["usuario"];
	} else {
		echo "Usuario o password no corresponde";
	}
} 


	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Administrador</title>

<link href="../css/admin.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,700italic,400,700' rel='stylesheet' type='text/css'>
</head>

<body>
<p align="center">&nbsp;</p>
<div align="center">
  
  <p>
    <span class="textos3">
    <?php if ($_SESSION["$nusuario"] == "") { ?>
  INICIE SESIÓN PARA MODIFICAR EL CONTENIDO</span></p>
  <p>&nbsp;</p>
</div>
<form id="form1" name="form1" method="post" action="sesion.php">
  <div align="center">
    <table width="220" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="80" class="texto" ><span class="textos">USUARIO     </span></td>
        <td width="120"><span class="titulos">
          <label>
            <input name="nusuario_txt" type="text" class="textobox"  id="nusuario_txt" size="17" />
          </label>
        </span></td>
      </tr>
      <tr>
        <td height="12" colspan="2" ></td>
      </tr>
      <tr>
        <td class="texto" ><span class="textos">PASSWORD </span></td>
        <td><span class="titulos">
          <input name="password_txt" type="password" class="textobox"  id="password_txt" size="17" />
        </span></td>
      </tr>
      <tr>
        <td height="15" colspan="2"></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <label>
            <input name="Entrar" type="submit" id="Entrar" value="Entrar" />
            </label>
        </div></td>
      </tr>
    </table>
  </div>
</form>
<div align="center">
  <p>
    <?php } else  { 
	
	$listado = "select * from 	usuario where usuario = '$_SESSION[$nusuario]' ";
	$sentencia = mysql_query($listado,$conn);
	if($rs=mysql_fetch_array($sentencia,$mibase)){
	
	?>
  </p>
  <p class="textos"><span>USUARIO</span><span class="admin">: </span><?php echo $_SESSION["$nusuario"]; ?></p>
  <table width="241" cellspacing="1" cellpadding="0">
    <tr>
      <td width="235" height="228"><table width="240" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="240" height="30" align="center" valign="middle" class="textos2" style="color:#FFF">MENU PRINCIPAL</td>
        </tr>
        
        <tr>
          <td height="5" align="left" bgcolor="#FFFFFF"></td>
        </tr>
        <tr>
          <td height="30" align="center" valign="middle" bgcolor="#FFFFFF"  class="texto"><a href="slide.php" class="textos" >SLIDE</a></td>
        </tr>
        <tr>
          <td height="30" align="center" valign="middle" bgcolor="#FFFFFF"  class="texto"><span class="titulos"><a href="inicio.php" class="textos" >INICIO</a></span></td>
        </tr>
        <tr>
          <td height="30" align="center" valign="middle" bgcolor="#FFFFFF"  class="texto"><a href="pie.php" class="textos" >PIE</a></td>
        </tr>
        <tr>
          <td height="30" align="center" valign="middle" bgcolor="#FFFFFF"  class="admin"><span class="titulos"><a href="links.php" class="textos">LINKS DE INTERES</a></span></td>
        </tr>
        <tr>
          <td height="30" align="center" valign="middle" bgcolor="#FFFFFF"  class="post-text"><a href="proximoscursos.php" class="textos">PROXIMOS CURSOS</a></td>
        </tr>
        <tr>
          <td height="30" align="center" valign="middle" bgcolor="#FFFFFF"  class="post-text"><a href="consultorias.php" class="textos">CONSULTORIAS</a></td>
        </tr>
        <tr>
          <td height="30" align="center" valign="middle" bgcolor="#FFFFFF"  class="textos"><a href="proyectos.php" class="textos">PROYECTOS</a></td>
        </tr>
        <tr>
          <td height="30" align="center" valign="middle" bgcolor="#FFFFFF"  class="post-text"><a href="clientes.php" class="textos">CLIENTES</a></td>
        </tr>
        <tr>
          <td height="30" align="center" valign="middle" bgcolor="#FFFFFF"  class="post-text"><a href="categorias.php" class="textos">CATEGORIA CURSOS</a></td>
        </tr>
        <tr>
          <td height="30" align="center" valign="middle" bgcolor="#FFFFFF"  class="post-text"><a href="subcategorias.php" class="textos">SUBCATEGORIA CURSOS</a></td>
        </tr>
        <tr>
          <td height="30" align="center" valign="middle" bgcolor="#FFFFFF"  class="post-text"><a href="servicio.php" class="texto">CURSOS</a></td>
        </tr>
        <tr>
          <td height="30" align="center" valign="middle" bgcolor="#FFFFFF"  class="post-text"><a href="noticias.php" class="textos">NOTICIAS</a></td>
        </tr>
        <tr>
          <td height="18" align="center" valign="middle" bgcolor="#FFFFFF"  class="post-text">&nbsp;</td>
        </tr>
        <tr>
          <td height="19" align="center" bgcolor="#FFFFFF"  class="admin"><span class="titulos"><a href="cambiopassword.php" class="textos3" >CAMBIAR CONTRASEÑA</a></span></td>
        </tr>
        <tr>
          <td height="20" align="center" class="post-text" ><span class="titulos"><a href="sesion.php?fun=cerrar" class="textos4" >CERRAR SESIÓN</a></span></td>
        </tr>
        
      </table></td>
    </tr>
  </table>
</div>
<?php } else {
	
echo "Esta sesion no es de administrador";	
	
	
}
	 } ?>
</body>
</html>
