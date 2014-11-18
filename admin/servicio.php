<?php
session_start();
if ($_SESSION["$nusuario"] == "") { 
	header("location: sesion.php","_self");
} else {	
include("../Conexion.php");
	if ($_GET["action"]=="eliminar"){
		$insertar = "delete from servicio WHERE id  = '$_GET[id]' " ; 
		$sentencia=mysql_query($insertar,$conn)or die("Error al eliminar un link: ".mysql_error);
	}
	
 ?>
<html>
<head>
<meta charset=UTF-8 />
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script language="JavaScript">
<!--
<!-- 
function openWindow(url, name) {
popupWin = window.open(url, name, 'scrollbars,resizable,width=650,height=500')
}

// -->


function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>


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
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
//-->
</script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<link href="../css/admin.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,700italic,400,700' rel='stylesheet' type='text/css'>

<title>admin</title></head>

<body>
<div align="center">
  <p>
<?php 
if ($_POST["Grabar"]){
		$insertar="INSERT INTO servicio (nombre_servicio,detalle_servicio,categoria,subcategoria ) 
		VALUES( '$_POST[nombre_servicio]','$_POST[detalle_servicio]','$_POST[categoria]','$_POST[subcategoria]')";
		$sentencia=mysql_query($insertar,$conn)or die("Error al grabar un servicio: ".mysql_error);
}
?>
    
</p>
<form action="servicio.php" method="post" name="form1" id="form1">
    <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="38" colspan="2"><div align="center" class="textos3"><strong>AGREGAR CURSO</strong></div></td>
      </tr>
      <tr>
        <td width="44%" height="32" align="right"><span class="textos">Titulo</span><strong class="texto"><strong> &nbsp; </strong></td>
        <td width="56%"><label for="nombre_servicio"></label>
        <input name="nombre_servicio" type="text" id="nombre_servicio" size="50"></td>
      </tr>
      <tr>
        <td align="right" valign="top" class="textos">Categoria<strong> &nbsp; </strong></td>
        <td><span class="Letras1">
          <select name="categoria" id="categoria">
            <?php 
				$listadoql = "select * from  categoria  ";
				$sentenciaqsdfdsfdsdf = mysql_query($listadoql,$conn);
				while($rsq=mysql_fetch_array($sentenciaqsdfdsfdsdf,$mibase)){
				?>
            <option value="<?php echo $rsq["id_categoria"]; ?>"><?php echo $rsq["categoria"]; ?></option>
            <?php } ?>
          </select>
        </span></td>
      </tr>
      <tr>
        <td align="right" valign="top" class="textos">Subcategoria<strong> &nbsp; </strong></td>
        <td><span class="Letras1">
          <select name="subcategoria" id="subcategoria">
            
            <?php 
				$listadoql = "select * from  subcategoria  ";
				$sentenciaqsdfdsfdsdf = mysql_query($listadoql,$conn);
				while($rsq=mysql_fetch_array($sentenciaqsdfdsfdsdf,$mibase)){
				?>
            <option value="<?php echo $rsq["id_subcategoria"]; ?>"><?php echo $rsq["subcategoria"]; ?></option>
            <?php } ?>
          </select>
        </span></td>
      </tr>
      <tr>
        <td align="right" valign="top" class="textos3"><span class="textos"><span class="textos">Descripción Completa</span><strong> &nbsp; </strong></td>
        <td><span class="textobox">
          <textarea name="detalle_servicio" cols="45" rows="5" class="Letras1" id="detalle_servicio"></textarea>
        </span></td>
      </tr>
      <tr>
        <td colspan="2" valign="top" class="Letras1"><div align="right" class="Letras1"></div></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
            <label>
            <input class="textos" type="submit" name="Grabar" id="Grabar" value="Grabar" />
            </label>
        </div></td>
      </tr>
    </table>
</form>
<p>&nbsp;</p>
<p><a href="sesion.php" class="textos">Volver</a></p>
<p>
  <?php 
$listado = "select * from  servicio";
$sentencia = mysql_query($listado,$conn);
while($rs=mysql_fetch_array($sentencia,$mibase)){
?>
</p>
<table width="70%" border="2" cellpadding="0" cellspacing="0" class="textotitulo2">
            <tr>
              <td height="265" class="margen"><table width="94%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="88%" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="31" align="center" valign="middle" class="Letras1"><a href="../imagenes/cursos/Upload_foto.php?id=<?php echo $rs["id"]; ?>" class="textos">Cambiar imagen</a></td>
                      <td width="170" class="Letras1"><div align="left" class="Letras1"> 
                      

                      <span class="textobox"><a href="servicio.php?id=<?php echo $rs["id"] ?>&action=eliminar" onClick=" return confirm('Esta Seguro que desea eliminar?');"><img src="../admin/b_drop.png" width="16" height="16" border="0" /></a> &nbsp;</span><span class="textos">Eliminar</span></div></td>
                      <td width="646" class="textobox"><a href="javascript:openWindow('editarservicio.php?id=<?php echo $rs["id"]; ?>')"javascript:openWindow('editarservicio.php?id=<?php echo $rs["id"]; ?>')""><img src="../admin/Lapiz.png" width="16" height="16" border="0"></a>  &nbsp;<span class="textoinfo"><a href="javascript:openWindow('editarservicio.php?id=<?php echo $rs["id"]; ?>')" class="textos">Editar</a></a></span></td>
                    </tr>
                    <tr>
                      <td width="180" rowspan="6" align="left" class="Letras1"><div align="left"><img src="../imagenes/cursos/<?php echo $rs["id"]; ?>.jpg" width="180">
<div>                      </div></td>
                      <td height="29" align="center" valign="top" class="Letras1"><div align="right" class="textoinfo"><span class="textos">Titulo: </span> &nbsp; </div></td>
                      <td valign="top">
					  <span class="textos"><?php $texto = str_replace("\r\n","<br>",$rs["nombre_servicio"]); echo $texto ?>
                      </span>
                      </td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                      <td height="29" align="right" valign="top" class="textos">Categoria: &nbsp;</td>
                      <td valign="top" class="Letras1"><span class="textos">
                        <?php
						$listadoql = "select * from  categoria where id_categoria ='$rs[categoria]' ";
				$sentenciaqsdfdsfdsdf = mysql_query($listadoql,$conn);
				while($rsq=mysql_fetch_array($sentenciaqsdfdsfdsdf,$mibase)){
					echo $rsq["categoria"];	
						
				} ?>
                      </span></td>
                    </tr>
                    <tr>
                      <td height="30" align="right" valign="top" class="textos">Subcategoria: &nbsp;</td>
                      <td valign="top" class="Letras1"><span class="textos">
                        <?php
						$listadoql = "select * from  subcategoria where id_subcategoria ='$rs[subcategoria]' ";
				$sentenciaqsdfdsfdsdf = mysql_query($listadoql,$conn);
				while($rsq=mysql_fetch_array($sentenciaqsdfdsfdsdf,$mibase)){
					echo $rsq["subcategoria"];	
						
				} ?>
                      </span></td>
                    </tr>
                    <tr>
                      <td height="27" align="right" valign="top" class="Letras1"><span class="textos">Descripción Completa: </span>&nbsp;</td>
                      <td valign="top" class="Letras1"><span class="textos">
                        <?php $texto = str_replace("\r\n","<br>",$rs["detalle_servicio"]); echo $texto ?>
                      </span></td>
                    </tr>
                    <tr>
                      <td height="96" align="center" valign="middle" class="Letras1">&nbsp;</td>
                      <td valign="top" class="Letras1">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="23" colspan="3" align="center" valign="top">
                      
                      
                      <p ><a href="../imagenes/cursos/contenido/Upload_pdf.php?id=<?php echo $rs["id"]; ?>" class="textos3" >SUBIR PDF</a></p>
                      
                      </td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="19" valign="top">&nbsp;</td>
                </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="2" bgcolor="#333333"></td>
                  </tr>
                </table></td>
            </tr>
  </table>
  <?php } ?>
</div>
<div align="left"></div>
<div align="center"></div>
<p align="center"><a href="sesion.php" class="textos">Volver</a></p>
</body>
</html>
<?php } ?>