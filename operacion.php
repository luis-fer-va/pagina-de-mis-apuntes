<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <h1>Probabilidad implicita</h1>

<form action="operacion.php" method="post">
<label for="">Equipo local cuota</label>
<?php
$primera_cuota=$_POST['primera_cuota'];
 $segundo_equipo=$_POST['segundo_equipo'];
 $empate = $_POST['empate'];?>
    <input type="number" name="primera_cuota" class="form-control" step="any" value="<?=$primera_cuota?>">
    <label for="">Equipo visitante cuota</label>
    <input type="number" name="segundo_equipo" class="form-control" step="any" value="<?=$segundo_equipo?>">
    <label for="">Empate</label>
    <input type="number" name="empate" class="form-control" step="any" value="<?=$empate?>">
    <input type="submit" value="Consultar">

    <?php 
if(isset($_POST)){
$empate=$_POST['empate'];
 $primera_cuota=$_POST['primera_cuota'];
 $segundo_equipo=$_POST['segundo_equipo'];
 $proba_implicita1= 1/$primera_cuota*100;
 $proba_implicita2=1/$segundo_equipo*100;
 $proba_implicita3=1/$empate*100;
 $resultado=$proba_implicita1+$proba_implicita2;

 echo "<h4>Equipo 1: ".round($proba_implicita1)."%</h4>";
 echo "<h4>Equipo 2: ".round($proba_implicita2)."%</h4>";
 echo "<h4>Empate: ".round($proba_implicita3)."%</h4>";
 echo "Resultado: ".round($resultado)."%";
 if($resultado > 99){
    echo " No habria ganancia";
 }else{
    echo " habria ganancia";
 }
    
}?>
    <?php $apuesta= $_POST['apuesta'];?>
    <h4>cuanto desea apostar?</h4>
    <input type="number" name="apuesta" class="form-control" value="<?= $apuesta?>">
    <input type="submit" value="apuesta">
        <?php

if($resultado < 99){

        $apuesta= $_POST['apuesta'];
        $apuesta_empate=($apuesta*$primera_cuota)/$empate;
        $apuesta_visitante=($apuesta*$primera_cuota)/$segundo_equipo;
        $apostar= $apuesta+$apuesta_empate+$apuesta_visitante;

     

        if(empty($_POST['empate'])){
            $_POST['empate']=null;
            $apuesta_local_visitante=($apuesta*$segundo_equipo)/$primera_cuota;
            echo "<p> Puedes apostar $".round($apuesta_local_visitante). " a cada equipo, en ambas apuestas ganas el " .  round(100-$resultado) ."% seguro  </p>";
        }else{

            echo "<p> Puede apostar $".round($apostar). " a cada equipo, en ambas apuestas ganas el " .  round(100-$resultado) ."% seguro  </p>";
        }
       
    }else{
        echo " <br> <br> <strong>upps hay mucho riesgo en la apuesta!!</strong>";
    }
        ?>
    </form>
</body>
</html>








