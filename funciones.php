<?php


function mostrarError($errores,$campo){
  $alerta="";
  if(isset($errores[$campo]) && !empty($campo)){
        $alerta=  $errores[$campo];
  }return $alerta;
}

function borrarError(){
   $_SESSION['errores']=null;
}

function mostrar_notas($conexion){
  
  $consulta= "SELECT * FROM notas ORDER BY id  DESC;";
  $querycall=mysqli_query($conexion,$consulta);
  $resultado=array();
  if($querycall && mysqli_num_rows($querycall)>=1){
    $resultado=$querycall;
  
  }return $resultado;
  
}


function getSearch($conexion,$buscar=null){
  $consulta_buscar="SELECT * FROM notas WHERE titulo LIKE '%$buscar%' ORDER BY id DESC";
  $buscar=mysqli_query($conexion,$consulta_buscar);
  $resultado=true;
  if($buscar && mysqli_num_rows($buscar)>=1){
     $resultado=$buscar;;
  }
  return $buscar;
}
?>