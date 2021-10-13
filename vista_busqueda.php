
<?php
//obtener datos de busqueda
if(isset($_POST)){
    require_once "conexion.php";
    require_once("funciones.php");

session_start();
$titulo_busqueda = isset($_POST["buscar"])? mysqli_real_escape_string($conexion,$_POST["buscar"]):false;

if(!empty($titulo_busqueda)>=1){
    $titulo_validado=true;
    
}else{
    $titulo_validado=false;
    $_SESSION['errores']['busqueda']="Escriba algo para buscar";

}
} 
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
    <title>Document</title>
</head>
<body>


<div id="content">

<h1 id="titulo">Pagina de apuntes-curso de php</h1> 


<div id="muestra-de-notas" class="container">
    <h1>Has buscado <?=$_POST['buscar']?></h1>
<?php
$mostrar_busqueda= getSearch($conexion,$_POST['buscar']);
if(!empty($mostrar_busqueda)&& mysqli_num_rows($mostrar_busqueda)>=1):
while($mostrar_busquedas = mysqli_fetch_assoc($mostrar_busqueda)):?>
  <hr>
  <h1><?=$mostrar_busquedas['titulo'];?></h1>
<p><?=$mostrar_busquedas['nota'];?></p>


<?php endwhile; 
else:?>
<p> <strong style="background-color: red; color:white;border-radius:10pt;padding:5px 5px;"> No se han encontrado resultados!! </strong> </p><?php endif; ?>


</div>

<div id="form">
    <form action="recoger-datos.php" method="post" >
    <label for="">Ingrese el titulo</label>
    <!-- mostrar errores de formulario desde php -->
    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'titulo'):""; ?>
    <input type="text"  class="form-control" name="titulo">
   
    <label for="">Ingrese el contenido</label>
    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'contenido'):""; ?>
    <textarea name="contenido" class="form-control container"></textarea>
    <input type="submit" value="Agregar Apuntes" class="btn btn-success  mt-4">
    </form></div>
    <div id="buscar">
        <h3>Buscar</h3>
        <form action="vista_busqueda.php" method="post">
        <input type="search"  class="form-control w-100" name="buscar" placeholder="">
    <input type="submit"  class="btn btn-primary mt-2" >
    <a href="index.php" class="btn btn-warning mt-2 text-white">Regresar</a>
    </div></form>
 
 <div class="clearfix"></div>
<?php borrarError();?>


</div>

</body>
</html>