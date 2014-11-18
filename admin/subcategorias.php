<?php
session_start();
if ($_SESSION["$nusuario"] == "") { 
	header("location: sesion.php","_self");
} else {
include("../Conexion.php");

	if ($_GET["action"]=="eliminar"){
		$insertar = "delete from subcategoria  WHERE id_subcategoria = '".$_GET["id"]."' " ; 
		$sentencia=mysql_query($insertar,$conn)or die("Error al eliminar un link: ".mysql_error);
	}
	if ($_POST["Grabar_btn"]){

		$insertar="INSERT INTO subcategoria (subcategoria,categoria) VALUES( '$_POST[Descripcion_txt]','$_POST[categoria]')";
		$sentencia=mysql_query($insertar,$conn)or die("Error al grabar un nuevo link: ".mysql_error);
		if (!$sentencia){
			die ("No se pudo almacenar el registro");
		}
	}
	if($_POST["Modificar"]){
		$editar = "update subcategoria SET subcategoria ='$_POST[Descripcion_edi]',categoria ='$_POST[categoriaedi]' where id_subcategoria = '$_GET[id]' " ; 
		$sentencia=mysql_query($editar,$conn)or die("Error al grabar un mensaje: ".mysql_error);
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

<body onLoad="MM_preloadImages('../../../../páginas SEO/pcplay/vender/vender/Botones/on/inicio_on.jpg','../../../../páginas SEO/pcplay/vender/vender/Botones/on/productos_on.jpg','../../../../páginas SEO/pcplay/vender/vender/Botones/on/mercado_on.jpg','../../../../páginas SEO/pcplay/vender/vender/Botones/on/certificaciones_on.jpg','../../../../páginas SEO/pcplay/vender/vender/Botones/on/demostraciones_on.jpg','../../../../páginas SEO/pcplay/vender/vender/Botones/on/distribuidores_on.jpg','../../../../páginas SEO/pcplay/vender/vender/Botones/on/quienes_somos_on.jpg','../../../../páginas SEO/pcplay/vender/vender/Botones/on/mision_vision_on.jpg','../../../../páginas SEO/pcplay/vender/vender/Botones/on/noticias_on.jpg','../../../../páginas SEO/pcplay/vender/vender/Botones/on/link_interes_on.jpg','../../../../páginas SEO/pcplay/vender/vender/Botones/on/contactenos_on.jpg','../../../../páginas SEO/pcplay/vender/vender/Botones/on/galeria_fotos_on.jpg')">
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
        <p align="center">&nbsp;</p>
        <div align="center">
         <?php if($_GET["action"]=="Editar"){ 
		 
		 	$listado = "select * from  subcategoria where id_subcategoria ='$_GET[id]'";
			$sentencia = mysql_query($listado,$conn);
			if($rts=mysql_fetch_array($sentencia,$mibase)){
		 ?>
          <form action="subcategorias.php?id=<?php echo $rts["id_subcategoria"] ?>" method="post" name="form1" id="form1">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td class="Letras1">&nbsp;</td>
                <td class="Letras1">&nbsp;</td>
              </tr>
              <tr>
                <td align="right" class="textos"> Categoria</td>
                <td class="Letras1"><label>
                  <select name="categoriaedi" id="categoriaedi">
                     <?php 
			  	$listadot = "select * from  categoria where id_categoria ='$rts[categoria]' ";
				$sentenciat = mysql_query($listadot,$conn);
				while($rs=mysql_fetch_array($sentenciat,$mibase)){
			  ?>
                    <option value="<?php echo $rs["id_categoria"]; ?>" selected><?php echo $rs["categoria"]; ?></option>
                    <?php } ?>
                    
                     <?php 
			  	$listadot = "select * from  categoria  ";
				$sentenciat = mysql_query($listadot,$conn);
				while($rs=mysql_fetch_array($sentenciat,$mibase)){
			  ?>
                    <option value="<?php echo $rs["id_categoria"]; ?>"><?php echo $rs["categoria"]; ?></option>
                    <?php } ?>
                    
                  </select>
					<?php 
			  	$listadot = "select * from  categoria ";
				$sentenciat = mysql_query($listadot,$conn);
				while($rs=mysql_fetch_array($sentenciat,$mibase)){
			  ?>
                    <option value="<?php echo $rs["id_categoria"]; ?>"><?php echo $rs["categoria"]; ?></option>
                    <?php } ?>
                  </select>
                  </label></td>
              </tr>
              <tr>
                <td width="59%" align="right" class="textos"><p>
                  <label for="checkbox_row_2">Sub categoria</label>
                  </p></td>
                <td width="41%" class="textos"><input name="Descripcion_edi" type="text" id="Descripcion_edi" value="<?php echo $rts["subcategoria"] ?>" size="60" maxlength="150" /></td>
              </tr>
              <tr>
                <td colspan="2" class="textos">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2" class="textos"><div align="center">
                  <label>
                    <input name="Modificar" type="submit" id="Modificar" value="Modificar" />
                    </label>
                  </div></td>
              </tr>
            </table>
          </form>
          <?php }} else { ?>
           <form action="subcategorias.php" method="post" name="form1" id="form1">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td class="Letras1">&nbsp;</td>
                <td class="Letras1">&nbsp;</td>
              </tr>
              <tr>
                <td align="right" class="textos"> Categoria</td>
                <td class="Letras1"><label>
                  <select name="categoria" id="categoria">
                    <?php 
			  	$listado = "select * from  categoria";
				$sentencia = mysql_query($listado,$conn);
				while($rs=mysql_fetch_array($sentencia,$mibase)){
			  ?>
                    <option value="<?php echo $rs["id_categoria"]; ?>"><?php echo $rs["categoria"]; ?> </option>
                    <?php } ?>
                  </select>
                  </label></td>
              </tr>
              <tr>
                <td width="59%" align="right" class="textos3"><p>
                  <label for="checkbox_row_2" class="textos">Sub categoria</label>
                  </p></td>
                <td width="41%" class="textos"><input name="Descripcion_txt" type="text" id="Descripcion_txt" size="60" maxlength="150" /></td>
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
          <?php } ?>
          </p>
          <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
            <tr bgcolor="#FF0000">
              <td bgcolor="#666666"><div align="center" class="texto">Eliminar</div></td>
              <td bgcolor="#666666"><div align="center" class="texto">Editar</div></td>
              <td bgcolor="#666666" class="texto">Categoria</td>
              <td bgcolor="#666666" class="texto">Sub categoria</td>
            </tr>
            <p>
              <?php 
$listado = "select * from  subcategoria order by categoria";
$sentencia = mysql_query($listado,$conn);
while($rs=mysql_fetch_array($sentencia,$mibase)){
?>
            </p>
            <tr>
              <td width="8%" class="textos"><div align="center"><a href="subcategorias.php?id=<?php echo $rs["id_subcategoria"]; ?>&action=eliminar" onClick=" return confirm('¿Está seguro que desea eliminar esta sub categoria?');"><img src="eliminar.png" alt="" width="16" height="16" border="0" /></a></div></td>
              <td width="8%" class="textos"><div align="center"><?php echo "<a href=subcategorias.php?id=".$rs["id_subcategoria"]."&action=Editar>"; ?><img src="editar.png" alt="" width="16" height="16" border="0" /></a></div></td>
              <td width="41%" class="textos"><span class="Letras1 Estilo2">
                <?php 
		$listados = "select * from  categoria where id_categoria = '$rs[categoria]'";
		$sentencias = mysql_query($listados,$conn);
		while($rss=mysql_fetch_array($sentencias,$mibase)){
			echo $rss["categoria"]; 
		}
		?>
              </span></td>
              <td width="51%" class="textos"><span class="textos"><?php echo $rs["subcategoria"]; ?></span></td>
            </tr>
            <?php } ?>
          </table>
        </div>
        <div align="left"></div>
        <div align="center">
          <div align="center"></div>
          <p align="center">&nbsp;</p>
          <p align="center"><a href="sesion.php" class="textos">Volver</a></p>
        </div>
        <div align="center"></div></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> </tr>
      </table></td>
    </tr>
  </table>
</div>
</body>
</html>
<?php } ?>