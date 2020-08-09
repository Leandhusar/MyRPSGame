<?php
//---------------------------------------------------------------------
//Se validan las entradas GET del nombre y POST de la selección logout
$nombre_usuario = "";
if(!isset($_GET['name'])){
    die("Usuario no logeado");
}
else{
    $nombre_usuario = $_GET['name'];
}

if(isset($_POST['logout'])){
    header("Location: http://localhost/index.php");
}
//---------------------------------------------------------------------

/*Se definen los valores de piedra, papel y tijeras
bajo la siguiente convencion:
- Piedra = 1
- Papel = 2
- Tijeras = 3
*/

$names = array('', 'Piedra', 'Papel', 'Tijeras');

//Se inicializan los valores para el jugador y la computadora
if(isset($_POST['human'])){
    $human = $_POST['human'] + 0;
}
else{
    $human = 0;
}
$computer = rand(1, 3);

//Funcion que evalua quien gana el juego cada ronda
function check($computer, $human){
    if($human == $computer){return 'Empate';}
    else if($human == 1){
        if($computer == 2){return 'Derrota';}
        else{return 'Victoria';}
    }
    else if($human == 2){
        if($computer == 1){return 'Victoria';}
        else{return 'Derrota';}
    }
    else if($human == 3){
        if($computer == 1){return 'Derrota';}
        else{return 'Victoria';}
    }
}
$resultado = check($computer, $human);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Leandro Hurtado Salazar e7d22b2d</title>
    </head>

    <body>
        <h1>Bienvenido a Piedra Papel Tijeras</h1>
        <p>Bienvenido: <?php print $nombre_usuario; ?></p>
        <form method="post">
            <select name="human">
            <option value="0">Seleccione su estrategia</option>
            <option value="1">Piedra</option>
            <option value="2">Papel</option>
            <option value="3">Tijeras</option>
            <option value="4">Prueba</option>
            </select>

            <input type="submit" name="logout" value="Salir">
            <input type="submit" value="Jugar!">
        </form>

        <?php
        if($human == 0){
            echo "Seleccione una estrategia</br>";
        }
        else if($human == 4){
            for($c=1; $c<4; $c++){
                for($h=1;$h<4;$h++) {
                    $r = check($c, $h);
                    echo "Humano = $names[$h]   CPU = $names[$c]   Resultado = $r</br>";
                }
            }
        }
        else{
            echo "Tu estrategia = $names[$human]   Estrategia CPU = $names[$computer]   Resultado = $resultado</br>";
        }
        ?>
    </body>
</html>

