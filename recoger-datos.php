<?php
//recoger datos por post-formulario(titulo,contenido)
if(isset($_POST)){
    if(!isset($_SESSION)){
        session_start();
    }
    require_once("conexion.php");
$titulo= isset($_POST['titulo'])?mysqli_real_escape_string($conexion,$_POST['titulo']):false;
$contenido=isset($_POST['contenido'])?mysqli_real_escape_string($conexion,$_POST['contenido']):false;
//validar datos de inputs
$errores=array();

if(!empty($titulo) ){
$validar_titulo=true;
}else{
    $validar_titulo=false;
    $errores['titulo']="El titulo esta vacio";
}
if(!empty($contenido)){
    $validar_contenido=true;
}else{
    $validar_contenido=false;
    $errores['contenido']="Digite contenido";
}
 $guardar_datos=false;
 if(count($errores)==0){
$guardar_datos=true;
//introducir datos a mysql
$insertar_datos="INSERT INTO notas VALUES (null,'$titulo','$contenido')";
$guardar=mysqli_query($conexion,$insertar_datos);
if($guardar){
$_SESSION['completado']="<p class='correcto'>Datos ingresados correctamente</p>";
}else{
    $_SESSION['errores']['general']="<p class='error'>Hubo un error al guardar datos!!</p>";
}
 
}else{
    $_SESSION['errores']=$errores;
}
}
header("location:index.php");

?>

