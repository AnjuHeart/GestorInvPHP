<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id='form'>
        <select class="form-select" name='restaurante' id='seleccion' onchange='mifuncion()'>;
            <option selected disabled> Selecciona un restaurante:</option>;

<?php
    $con = mysqli_connect('localhost','root','',"gestor_php");
    if (!$con) { die('No se pudo conectar: ' . mysqli_error($con)); 
    }
    mysqli_select_db($con,'gestor_php');     
    $sql="SELECT DISTINCT restaurante FROM usuarios";
    $result = mysqli_query($con,$sql); 
    print_r($result);
    while($ren = mysqli_fetch_array($result)) {     
        echo "<option value='".$ren['restaurante']."'>".$ren['restaurante']."</option>";
    }
    echo "</select>";
    echo "</form>";
    mysqli_close($con);
?>    
</body>
</html>
