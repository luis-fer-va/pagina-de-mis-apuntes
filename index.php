<?php  
require_once("conexion.php");
require_once("funciones.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>


<div id="content">
<h1 id="titulo">Pagina de apuntes-curso de php 💧 </h1> 
<div id="muestra-de-notas">
    <h1 style="text-align: center;  position: sticky;
    top: 0;
    margin:0px;
     padding:20px;
     background:white;
     margin-bottom:10px;
     ">Vista de mis apuntes <span><?= date("d/m/Y")." - ";?><?= date("h:i: a");?></span></h1> 
<?php
$mostrar_apuntes=mostrar_notas($conexion);
if(!empty($mostrar_apuntes)):
while($mostrar_apunte = mysqli_fetch_assoc($mostrar_apuntes)):?>
  <hr>
<h1> (<?=$mostrar_apunte['titulo'];?>) </h1>
<hr>
<p ><?=$mostrar_apunte['nota'];?></p><br>

<?php endwhile; endif; ?>


</div>


<div id="form">
    <form action="recoger-datos.php" method="post" >
    <label for="">Ingrese el titulo</label>
    <!-- mostrar errores de formulario desde php -->
   
    <input type="text"  class="form-control" name="titulo" placeholder=" <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'titulo'):""; ?>">
   
    <label for="">Ingrese el contenido</label>
   
    <textarea name="contenido" class="form-control container"></textarea>
    <input type="submit" value="Agregar Apuntes" class="btn btn-success  mt-4" placeholder="">
    </form></div>
    <div id="buscar">
        <h3>Buscar</h3>
        <form action="vista_busqueda.php" method="post">
       
        <input type="search"  class="form-control w-100" name="buscar" placeholder="Buscar" required> 
    <input type="submit"  class="btn btn-primary mt-2" >
    </div></form>
 
 <div class="clearfix"></div>
<?php borrarError();?>

</div>


</body>
</html>