<?php
  include("Conexion.php");
  $listado = "select * from pie";
  $sentencia = mysql_query($listado,$conn);
  while($rs=mysql_fetch_array($sentencia,$mibase)){
    $direccion1 = str_replace("\r\n","<br>",$rs["direccion1"]); 
    $direccion2 = str_replace("\r\n","<br>",$rs["direccion2"]); 
    $celulares = str_replace("\r\n","<br>",$rs["celulares"]); 
    $correos = str_replace("\r\n","<br>",$rs["correos"]); 
    $titulo_pie1 = str_replace("\r\n","<br>",$rs["titulo_pie1"]); 
    $contenido_pie1 = str_replace("\r\n","<br>",$rs["contenido_pie1"]); 
    $titulo_pie2 = str_replace("\r\n","<br>",$rs["titulo_pie2"]); 
    $contenido_pie2 = str_replace("\r\n","<br>",$rs["contenido_pie2"]); 
    $titulo_pie3 = str_replace("\r\n","<br>",$rs["titulo_pie3"]); 
    $contenido_pie3 = str_replace("\r\n","<br>",$rs["contenido_pie3"]); 
    $titulo_pie4 = str_replace("\r\n","<br>",$rs["titulo_pie4"]); 
    $contenido_pie4 = str_replace("\r\n","<br>",$rs["contenido_pie4"]); 
    $titulo_pie5 = str_replace("\r\n","<br>",$rs["titulo_pie5"]); 
    $contenido_pie5 = str_replace("\r\n","<br>",$rs["contenido_pie5"]); 
    $titulo_pie6 = str_replace("\r\n","<br>",$rs["titulo_pie6"]); 
    $contenido_pie6 = str_replace("\r\n","<br>",$rs["contenido_pie6"]); 
  }

?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
	<title>Noticias hseq</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="js/jquery.glide.min.js"></script>
  <script src="js/script.js"></script>
  <script type="text/javascript" src="js/jquery.flexisel.js"></script>
</head>
<body>
	<header>
		<figure class="logo">
			<img src="imagenes/logo.png">
		</figure>
		<div class="social">
			<p>Siguenos</p>
			<a href="#" target="new">
				<div class="facebook"></div>
			</a>
			<a href="#" target="new">
				<div class="google"></div>
			</a>
			<a href="#" target="new">
				<div class="linkedin"></div>
			</a>
			<a href="#" target="new">
				<div class="youtube"></div>
			</a>
		</div>
	</header>
	<section class="nav">
		<div class="centro_header">
		    <nav id="menu">
		      <a href="#" class="nav-mobile" id="nav-mobile"></a>
		      <ul>
		        <li><a href="index.php">INICIO</a></li>
		        <li><a href="consultorias.php">CONSULTORIAS</a></li>
		        <li><a href="proyecto.php">PROYECTOS</a></li>
		        <li><a href="clientes.php">CLIENTES</a></li>
		       
		        <li><a class="activo" href="noticias.php">NOTICIAS</a></li>
		        <li><a href="contacto.php">CONTACTO</a></li>
		      </ul>
		    </nav>
		</div>
	</section>
	

<!-- CONTENIDO -->
<div class="contenedor">
	<div class="contenedor_info2">
		<div id='cssmenu'>
			<div class="curso">
				<p><img src="imagenes/tic.png"> CURSOS</p>
			</div>
        <ul>
          <?php
            $listado = "select * from  categoria id_categoria";
            $sentencia = mysql_query($listado,$conn);
            while($rs=mysql_fetch_array($sentencia,$mibase)){
          ?>
          <li class='has-sub'><a href='#'><span><?php echo $rs["categoria"]; ?></span></a>
            <ul>
              <?php
                $listados = "select * from  subcategoria where categoria ='$rs[id_categoria]'";
                $sentencias = mysql_query($listados,$conn);
                while($rss=mysql_fetch_array($sentencias,$mibase)){
              ?>
              <li><a href='cursos.php?cat=<?php echo $rs["id_categoria"]; ?>&subcat=<?php echo $rss["id_subcategoria"]; ?>'><span><?php echo $rss["subcategoria"]; ?></span></a></li>
              <?php } ?>
            </ul>
          </li>
          <?php } ?>
       </ul>
    	</div>
      <div class="proximos">
        <h3><img src="imagenes/tic.png"> PROXIMOS CURSOS</h3>
        <?php 
          $listado = "select * from proximoscursos";
          $sentencia = mysql_query($listado,$conn);
          while($rs=mysql_fetch_array($sentencia,$mibase)){
        ?>
        <div class="curso_info">
          <h4><?php $texto = str_replace("\r\n","<br>",$rs["titulo_curso"]); echo $texto ?></h4>
          <div class="c_info">
            <figure>
              <img src="imagenes/cursos_inicio/<?php echo $rs["id"]; ?>.jpg">
            </figure>
            <p><?php $texto = str_replace("\r\n","<br>",$rs["contenido_curso"]); echo $texto ?></p>
          </div>
        </div>
        <?php } ?>
      </div>
	</div>

	<div class="contenedor_info">
		
    <?php 
      $listado = "select * from noticias";
      $sentencia = mysql_query($listado,$conn);
      while($rs=mysql_fetch_array($sentencia,$mibase)){
    ?>
    <div class="inicio1">
      <h3><img src="imagenes/tic.png"> <?php $texto = str_replace("\r\n","<br>",$rs["titulo_noticia"]); echo $texto ?></h3>
      <div class="inicio_info">
        <p><?php $texto = str_replace("\r\n","<br>",$rs["breve_noticia"]); echo $texto ?>
          <a href="detallenoticia.php?id=<?php echo $rs["id"]; ?>">VER DETALLE</a>
        </p>
        <figure>
          <img src="imagenes/noticias/<?php echo $rs["id"]; ?>.jpg">
         </figure>
      </div>
    </div>
	 <?php } ?>
		
<!-- CARRUSEL -->
    <ul id="flexiselDemo3">
        <?php 
            $listado = "select * from carrusel";
            $sentencia = mysql_query($listado,$conn);
            while($rs=mysql_fetch_array($sentencia,$mibase)){
        ?>
        <li><img src="imagenes/clientes/<?php echo $rs["id"]; ?>.jpg" /></li>
        <?php } ?>                                            
    </ul>   
<!-- CARRUSEL -->
    <div class="link_interes">
      <p>Link de Interés:</p>
      <?php 
        $listadolink  = "select * from  link";
        $sentencialink  = mysql_query($listadolink ,$conn);
        while($rslink =mysql_fetch_array($sentencialink ,$mibase)){
      ?>
      <a href="<?php echo $rslink["url"] ?>" target="new"><?php echo $rslink["link"] ?></a></a>
      <?php } ?>
    </div>
	</div>
</div>
<!-- CONTENIDO -->

<footer>
  <div class="contenido_footer">
    <div class="contacto">
      <p><strong>Dirección:</strong> <?php echo $direccion1 ?><br>
         <strong>Dirección:</strong> <?php echo $direccion2 ?><br>
         <strong>Celulares:</strong> <?php echo $celulares ?> <strong>Correos:</strong> <?php echo $correos ?></p>  
    </div>
    <div class="info_footer">
      <div class="info">
        <h5><?php echo $titulo_pie1 ?></h5>
        <p><?php echo $contenido_pie1 ?></p>
      </div>
      <div class="info">
        <h5><?php echo $titulo_pie2 ?></h5>
        <p><?php echo $contenido_pie2 ?></p>
      </div>
      <div class="info">
        <h5><?php echo $titulo_pie3 ?></h5>
        <p><?php echo $contenido_pie3 ?></p>
      </div>
      <div class="info">
        <h5><?php echo $titulo_pie4 ?></h5>
        <p><?php echo $contenido_pie4 ?></p>
      </div>
      <div class="info">
        <h5><?php echo $titulo_pie5 ?></h5>
        <p><?php echo $contenido_pie5 ?></p>
      </div>
      <div class="info">
        <h5><?php echo $titulo_pie5 ?></h5>
        <p><?php echo $contenido_pie5 ?></p>
      </div>
    </div>
  </div>
  <div class="emagenic">
    <a href="http://www.emagenic.cl" target="new">Sitio Web desarrollado por Emagenic</a>
  </div>
</footer>

	<script type="text/javascript">
$(function(){
  $('.slider').glide({
    autoplay: 3500,
    hoverpause: true, // set to false for nonstop rotate
    arrowRightText: '&rarr;',
    arrowLeftText: '&larr;'
  });
});
</script>

<script>
    $(function() {
        var btn_movil = $('#nav-mobile'),
            menu = $('#menu').find('ul');
        btn_movil.on('click', function (e) {
            e.preventDefault();
            var el = $(this);
            el.toggleClass('nav-active');
            menu.toggleClass('open-menu');
        })
    });
</script>

<script type="text/javascript">

$(window).load(function() {
    $("#flexiselDemo1").flexisel();
    $("#flexiselDemo2").flexisel({
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: { 
            portrait: { 
                changePoint:480,
                visibleItems: 1
            }, 
            landscape: { 
                changePoint:640,
                visibleItems: 2
            },
            tablet: { 
                changePoint:768,
                visibleItems: 3
            }
        }
    });

    $("#flexiselDemo3").flexisel({
        visibleItems: 5,
        animationSpeed: 1000,
        autoPlay: true,
        autoPlaySpeed: 3000,            
        pauseOnHover: true,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: { 
            portrait: { 
                changePoint:480,
                visibleItems: 1
            }, 
            landscape: { 
                changePoint:640,
                visibleItems: 2
            },
            tablet: { 
                changePoint:768,
                visibleItems: 3
            }
        }
    });

    $("#flexiselDemo4").flexisel({
        clone:false
    });
    
});
</script>
</body>
</html>
