<?php
session_start();
if ($_SESSION["$nusuario"] == "") { 
	header("location: sesion.php","_self");
} else {
include("../Conexion.php");

	if ($_GET["action"]=="eliminar"){
		$insertar = "delete from categoria  WHERE id_categoria = '".$_GET["id"]."' " ; 
		$sentencia=mysql_query($insertar,$conn)or die("Error al eliminar un link: ".mysql_error);
	}
	if ($_POST["Grabar_btn"]){
		$insertar="INSERT INTO categoria (categoria) VALUES( '$_POST[Descripcion_txt]')";
		$sentencia=mysql_query($insertar,$conn)or die("Error al grabar un nuevo link: ".mysql_error);
	}
	if ($_POST["Editar"]){
		$insertar = "UPDATE categoria SET categoria ='$_POST[Descripcion_txt2]' WHERE id_categoria = '$_GET[id_categoria]' " ; 
		$sentencia=mysql_query($insertar,$conn)or die("Error al grabar un mensaje: ".mysql_error);
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
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
<link href="../css/admin.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,700italic,400,700' rel='stylesheet' type='text/css'>
</head>

<body onLoad="MM_preloadImages('inicio_on.jpg','productos_on.jpg','file:///Z|/emagenic/Clientes Emagenic/Guerrico maquinaria/www/admin/Botones/on/mercado_on.jpg','file:///Z|/emagenic/Clientes Emagenic/Guerrico maquinaria/www/admin/Botones/on/certificaciones_on.jpg','file:///Z|/emagenic/Clientes Emagenic/Guerrico maquinaria/www/admin/Botones/on/demostraciones_on.jpg','file:///Z|/emagenic/Clientes Emagenic/Guerrico maquinaria/www/admin/Botones/on/distribuidores_on.jpg','file:///Z|/emagenic/Clientes Emagenic/Guerrico maquinaria/www/admin/Botones/on/quienes_somos_on.jpg','file:///Z|/emagenic/Clientes Emagenic/Guerrico maquinaria/www/admin/Botones/on/mision_vision_on.jpg','file:///Z|/emagenic/Clientes Emagenic/Guerrico maquinaria/www/admin/Botones/on/noticias_on.jpg','file:///Z|/emagenic/Clientes Emagenic/Guerrico maquinaria/www/admin/Botones/on/link_interes_on.jpg','file:///Z|/emagenic/Clientes Emagenic/Guerrico maquinaria/www/admin/Botones/on/contactenos_on.jpg','file:///Z|/emagenic/Clientes Emagenic/Guerrico maquinaria/www/admin/Botones/on/galeria_fotos_on.jpg')">
<div align="center">
  <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center"></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> </tr>
      </table></td>
    </tr>
    <tr>
      <td></td>
</tr>
    <tr>
      <td align="center"><p align="center">&nbsp;</p>
        <div align="center">
          <p>&nbsp;</p>
          <p>
            <?php if($_GET["action"]=="editar"){ 
	$listado = "select * from  categoria where id_categoria =  '$_GET[id]'";
	$sentencia = mysql_query($listado,$conn);
	if($rs=mysql_fetch_array($sentencia,$mibase)){
		$categoria = $rs["categoria"];
	
	}
?>
          </p>
          <form action="categorias.php?id_categoria=<?php echo $_GET["id"]; ?>" method="post" name="form1" id="form2">
            <table width="34%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="59%" class="textos">&nbsp;</td>
                <td width="41%" class="textos">&nbsp;</td>
              </tr>
              <tr>
                <td class="textos">Descripcion</td>
                <td class="textos3"><input name="Descripcion_txt2" type="text" id="Descripcion_txt2" value="<?php echo $categoria ?>" size="60" maxlength="150" /></td>
              </tr>
              <tr>
                <td colspan="2" class="Letras1">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2" class="Letras1"><div align="center">
                  <label>
                    <input name="Editar" type="submit" id="Editar" value="Editar" />
                  </label>
                </div></td>
              </tr>
            </table>
          </form>
          <?php } else { ?>
          <form action="categorias.php" method="post" name="form1" id="form1">
            <table width="34%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="59%" class="Letras1">&nbsp;</td>
                <td width="41%" class="Letras1">&nbsp;</td>
              </tr>
              <tr>
                <td class="textos">Descripcion</td>
                <td class="textos3"><input name="Descripcion_txt" type="text" id="Descripcion_txt" size="60" maxlength="150" /></td>
              </tr>
              <tr>
                <td colspan="2" class="textos">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2" class="textos"><div align="center">
                  <label>
                    <input class="textos" name="Grabar_btn" type="submit" id="Grabar_btn" value="Grabar" />
                  </label>
                </div></td>
              </tr>
            </table>
          </form>
          </p>
          <?php } ?>
          <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
            <tr bgcolor="#FF0000">
              <td width="65" bgcolor="#666666"><div align="center" class="texto">Eliminar</div></td>
              <td width="65" bgcolor="#666666" class="texto"><div align="center">Editar</div></td>
              <td width="50" bgcolor="#666666" class="texto"><div align="center">ID</div></td>
              <td width="410" bgcolor="#666666" class="texto">Categoria</td>
            </tr>
            <p>
              <?php 
$listado = "select * from  categoria  ";
$sentencia = mysql_query($listado,$conn);
while($rs=mysql_fetch_array($sentencia,$mibase)){
?>
            </p>
            <tr>
              <td valign="top" class="Letras1"><div align="center" class="Letras1">
			  <a href="categorias.php?id=<?php echo $rs["id_categoria"]; ?>&action=eliminar" onClick=" return confirm('¿Está seguro que desea eliminar esta categoria?');">
			  <img src="b_drop.png" width="16" height="16" border="0" /></a></div></td>
              <td valign="top" class="textos"><div align="center" class="textos"><a href="categorias.php?action=editar&id=<?php echo $rs["id_categoria"]; ?>"><img src="Lapiz.png" width="16" height="16" border="0"></a></div></td>
              <td valign="top" class="textos"><div align="center" class="textos"><?php echo $rs["id_categoria"]; ?></div></td>
              <td valign="top" class="textos"><?php echo $rs["categoria"]; ?></td>
            </tr>
            <?php } ?>
          </table>
        </div>
        <div align="left"></div>
        <div align="center"></div>
        <p align="center">&nbsp;</p>
        <p align="center"><a href="sesion.php" class="textos">Volver</a></p>
<div align="center"></div></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> </tr>
      </table></td>
    </tr>
  </table>
</div>
<script type="text/javascript">
var MenuBar5 = new Spry.Widget.MenuBar("MenuBar5", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar4 = new Spry.Widget.MenuBar("MenuBar4", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar3 = new Spry.Widget.MenuBar("MenuBar3", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
<?php } ?>