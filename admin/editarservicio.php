<?php
session_start();
include("../Conexion.php");
if ($_SESSION["$nusuario"] == "") { 
	header("location: index.php?contador=0","_self");
} else { 
if ($_POST["Grabar"]){
	$editar = "update servicio SET  
	nombre_servicio ='$_POST[nombre_servicio]',
	id_categoria = '$_POST[categoria]',
	id_subcategoria ='$_POST[subcategoria]',
	detalle_servicio ='$_POST[detalle_servicio]', 
	where id_servicio = '".$_GET["cod"]."' " ; 
	$sentencia=mysql_query($editar,$conn)or die("Error al grabar un mensaje: ".mysql_error);
?>
	<script language="javascript">
	window.opener.document.location="servicio.php"
	window.close();
	</script>
<?php
	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Editar producto codigo <?php echo $_GET["cod"]; ?></title>
<link href="../css/admin.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,700italic,400,700' rel='stylesheet' type='text/css'>

</head>

<body>
<p class="textos3" align="center">EDITAR </p>
<form id="form1" name="form1" method="post" action="editarservicio.php?cod=<?php echo $_GET["cod"]; ?>">
  <?php 
	$listadostt = "select * from servicio where id_servicio = '$_GET[cod]'";
	$sentenciastt = mysql_query($listadostt,$conn);
	while($rs=mysql_fetch_array($sentenciastt,$mibase)){
?>
  <table width="100%" border="0" cellpadding="0" cellspacing="1">
    <tr>
      <td align="right" class="Letras1">&nbsp;</td>
      <td width="30%" class="Sabana">&nbsp;</td>
    </tr>
    <tr>
      <td width="16%" align="right" valign="top" class="textos">Nombre</td>
      <td valign="top"><label>
        <input name="nombre_servicio" type="text" class="textos" id="nombre_servicio" value="<?php echo $rs["nombre_servicio"]; ?>" size="50" />
      </label></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="textos">Categoria</td>
      <td valign="top" class="textos">
      <select name="categoria" class="Contenidonegro" id="primerCombo" onChange="SeleccionandoCombo(this, 'segundoCombo');">
         <?php 
    	$listados = "select * from categoria where id_categoria = '$rs[id_categoria]'";
		$sentencias = mysql_query($listados,$conn);
		if($rss=mysql_fetch_array($sentencias,$mibase)){
  		?>
        
          <option value="<?php echo $rss["id_categoria"]; ?>" selected="selected"><?php echo $rss["categoria"]; ?></option>
        <?php }  ?>
       
        <?php 
    	$listados = "select * from categoria ";
		$sentencias = mysql_query($listados,$conn);
		while($rss=mysql_fetch_array($sentencias,$mibase)){
  		?>
        <option value="<?php echo $rss["id_categoria"]; ?>"><?php echo $rss["categoria"]; ?></option>
        <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="textos">Sub categoria</td>
      <td valign="top" class="textos">
      <select name="subcategoria" class="Contenidonegro" id="segundoCombo">
      <?php 
    	$listados = "select * from subcategoria where id_subcategoria = '$rs[id_subcategoria]'";
		$sentencias = mysql_query($listados,$conn);
		if($rss=mysql_fetch_array($sentencias,$mibase)){
  		?>
        
          <option value="<?php echo $rss["id_subcategoria"]; ?>" selected="selected"><?php echo $rss["subcategoria"]; ?></option>
        <?php }  ?>
      
      </select>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
function LimpiarCombo(combo){
	while(combo.length > 0){
		combo.remove(combo.length-1);
	}
}
function LlenarCombo(json, combo){
	combo.options[0] = new Option('Selecciona un item', '');
	for(var i=0;i<json.length;i++){
		combo.options[combo.length] = new Option(json[i].data, json[i].id);
	}
}
function SeleccionandoCombo(combo1, combo2){
	combo2 = document.getElementById(combo2); //con jquery: $("#"+combo2)[0];
	LimpiarCombo(combo2);
	if(combo1.options[combo1.selectedIndex].value != ""){
		combo1.disabled = true;
		combo2.disabled = true;
		$.ajax({
			type: 'get',
			dataType: 'json',
			url: 'ajax.php',
			data: {valor: combo1.options[combo1.selectedIndex].value},
			success: function(json){
				LlenarCombo(json, combo2);
				combo1.disabled = false;
				combo2.disabled = false;
			}
		});
	}
}
</script></td>
    </tr>
    <tr>
      <td height="169" align="right" valign="top" class="textos">Descripcion</td>
      <td valign="top" class="textos"><textarea name="detalle_servicio" cols="50" rows="8" class="textos" id="detalle_servicio"><?php echo $rs["detalle_servicio"]; ?></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center" class="Letras1"><label>
        <input name="Grabar" type="submit" class="textos" id="Grabar" value="Grabar" />
      </label></td>
    </tr>
  </table>
  <?php } ?>
</form>
</body>
</html>
<?php } ?>