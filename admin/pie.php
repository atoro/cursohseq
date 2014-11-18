<?php
session_start();
if ($_SESSION["$nusuario"] == "") { 
	header("location: sesion.php","_self");
} else {
include("../Conexion.php");
if ($_POST["Grabar"]){
	$editar="update  pie set direccion1  = '$_POST[direccion1]',direccion2  = '$_POST[direccion2]',celulares  = '$_POST[celulares]',correos  = '$_POST[correos]',titulo_pie1  = '$_POST[titulo_pie1]',contenido_pie1  = '$_POST[contenido_pie1]',titulo_pie2  = '$_POST[titulo_pie2]',contenido_pie2  = '$_POST[contenido_pie2]',titulo_pie3  = '$_POST[titulo_pie3]',contenido_pie3  = '$_POST[contenido_pie3]',titulo_pie4  = '$_POST[titulo_pie4]',contenido_pie4  = '$_POST[contenido_pie4]',titulo_pie5  = '$_POST[titulo_pie5]',contenido_pie5  = '$_POST[contenido_pie5]',titulo_pie6  = '$_POST[titulo_pie6]',contenido_pie6  = '$_POST[contenido_pie6]'
	";
	$sentencia = mysql_query($editar,$conn)or die("Error al grabar: ".mysql_error);
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>

<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url();
}
-->
</style>
<link href="Span/Letras.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body,td,th {
	color: #000000;
}
-->
</style>
<link href="../css/admin.css" rel="stylesheet" type="text/css">
<title>Admin</title>

</head>

<body>
  <?php
	$listado = "select * from pie";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
		$direccion1 = $rs["direccion1"];
		$direccion2 = $rs["direccion2"];
		$celulares = $rs["celulares"];
		$correos = $rs["correos"];
		$titulo_pie1 = $rs["titulo_pie1"];
		$contenido_pie1 = $rs["contenido_pie1"];
		$titulo_pie2 = $rs["titulo_pie2"];
		$contenido_pie2 = $rs["contenido_pie2"];
		$titulo_pie3 = $rs["titulo_pie3"];
		$contenido_pie3 = $rs["contenido_pie3"];
		$titulo_pie4 = $rs["titulo_pie4"];
		$contenido_pie4 = $rs["contenido_pie4"];
		$titulo_pie5 = $rs["titulo_pie5"];
		$contenido_pie5 = $rs["contenido_pie5"];
		$titulo_pie6 = $rs["titulo_pie6"];
		$contenido_pie6 = $rs["contenido_pie6"];
	}
	?>
  <form action="pie.php" method="post" name="form1" id="form1">
    
    <table width="45%" border="0" align="center" cellpadding="0" cellspacing="0">
      
      <tr>
        <td colspan="3"><div align="center" class="titulos"><strong>Pie</strong></div></td>
      </tr>
      <tr>
        <td height="17" colspan="3"></td>
      </tr>
      <tr>
        <td width="29%" height="30" align="right" valign="top" class="texto"><p>Direccion 1 : &nbsp;</p></td>
        <td width="65%" valign="top"><input name="direccion1" type="text" class="textopreguntas" id="direccion1" value="<?php echo $direccion1; ?> " size="50"></td>
        <td width="6%">&nbsp;</td>
      </tr>
      <tr>
        <td height="33" align="right" valign="top" class="texto"><p>Direccion 2 : &nbsp;</p></td>
        <td valign="top"><input name="direccion2" type="text" class="textopreguntas" id="direccion2" value="<?php echo $direccion2; ?> " size="50"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" align="right" valign="top" class="texto"><p>Celulares : &nbsp;</p></td>
        <td valign="top"><input name="celulares" type="text" class="textopreguntas" id="celulares" value="<?php echo $celulares; ?> " size="50"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" align="right" valign="top" class="texto"><p>Correos : &nbsp;</p></td>
        <td valign="top"><input name="correos" type="text" class="textopreguntas" id="correos" value="<?php echo $correos; ?> " size="50"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" align="right" valign="top" class="texto"><p>Titulo pie 1 : &nbsp;</p></td>
        <td valign="top"><input name="titulo_pie1" type="text" class="textopreguntas" id="titulo_inicio3" value="<?php echo $titulo_pie1; ?> " size="50"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="94" align="right" valign="top" class="texto">Contenido 1 : &nbsp;</td>
        <td valign="top"><textarea name="contenido_pie1" id="contenido_pie1" cols="50" rows="5"><?php echo $contenido_pie1; ?> </textarea></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="32" align="right" valign="top" class="texto">Titulo pie 2 : &nbsp;</td>
        <td valign="top"><input name="titulo_pie2" type="text" class="textopreguntas" id="titulo_pie2" value="<?php echo $titulo_pie2; ?> " size="50"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="94" align="right" valign="top" class="texto">Contenido 2 : &nbsp;</td> 
        <td valign="top"><textarea name="contenido_pie2" id="contenido_pie2" cols="50" rows="5"><?php echo $contenido_pie2; ?> </textarea></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="35" align="right" valign="top" class="texto">Titulo pie 3 : &nbsp;</td>
        <td valign="top"><input name="titulo_pie3" type="text" class="textopreguntas" id="titulo_pie3" value="<?php echo $titulo_pie3; ?> " size="50"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="94" align="right" valign="top" class="texto">Contenido 3 : &nbsp;</td>
        <td valign="top"><textarea name="contenido_pie3" id="contenido_pie3" cols="50" rows="5"><?php echo $contenido_pie3; ?> </textarea></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="33" align="right" valign="top" class="texto">Titulo pie 4 : &nbsp;</td>
        <td valign="top"><input name="titulo_pie4" type="text" class="textopreguntas" id="titulo_inicio4" value="<?php echo $titulo_pie4; ?> " size="50"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="94" align="right" valign="top" class="texto">Contenido 4 : &nbsp;</td>
        <td valign="top"><textarea name="contenido_pie4" id="contenido_pie4" cols="50" rows="5"><?php echo $contenido_pie4; ?> </textarea></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="32" align="right" valign="top" class="texto">Titulo pie 5 : &nbsp;</td>
        <td valign="top"><input name="titulo_pie5" type="text" class="textopreguntas" id="titulo_inicio5" value="<?php echo $titulo_pie5; ?> " size="50"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="94" align="right" valign="top" class="texto"><p>Contenido 5 : &nbsp;</p></td>
        <td valign="top"><textarea name="contenido_pie5" id="contenido_pie5" cols="50" rows="5"><?php echo $contenido_pie5; ?> </textarea></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="32" align="right" valign="top" class="texto">Titulo pie 6 : &nbsp;</td>
        <td valign="top"><input name="titulo_pie6" type="text" class="textopreguntas" id="titulo_inicio6" value="<?php echo $titulo_pie6; ?> " size="50"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="94" align="right" valign="top" class="texto"><p>Contenido 6 : &nbsp;</p></td>
        <td valign="top"><textarea name="contenido_pie6" id="politicavalores_contenido6" cols="50" rows="5"><?php echo $contenido_pie6; ?> </textarea></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" align="right" valign="top" class="texto"><p>&nbsp;</p></td>
      </tr>
      <tr>
        <td height="49" colspan="3"><div align="center">
          <label>
          <input name="Grabar" type="submit" class="textobox3" id="Grabar" value="Grabar" />
          </label>
        </div></td>
      </tr>
    </table>
    <p align="center"><a href="sesion.php" class="texto">Volver</a></p>
    <p align="center">&nbsp;</p>
    <p align="center">&nbsp;</p>
</form>
</body>
</html>
<?php } ?>