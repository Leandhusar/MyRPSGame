<?php
//---------------------------------------------------------------------
//Se validan las entradas GET del nombre y POST de la selección logout
$nombre_usuario = "";
if(!isset($_GET['name'])){
    die("Name parameter missing");
}
else{
    $nombre_usuario = $_GET['name'];
}

if(isset($_POST['logout'])){
    header("Location: index.php");
}
//---------------------------------------------------------------------

/*Se definen los valores de piedra, papel y tijeras
bajo la siguiente convencion:
- Piedra = 0
- Papel = 1
- Tijeras = 2
*/

$names = array('Piedra', 'Papel', 'Tijeras');

//Se inicializan los valores para el jugador y la computadora
if(isset($_POST['human'])){
    $human = $_POST['human'] + 0;
}
else{
    $human = -1;
}
$computer = rand(0, 2);

//Funcion que evalua quien gana el juego cada ronda
function check($computer, $human){
    if($human == $computer){return 'Empate';}
    else if($human == 0){
        if($computer == 1){return 'Derrota';}
        else{return 'Victoria';}
    }
    else if($human == 1){
        if($computer == 2){return 'Victoria';}
        else{return 'Derrota';}
    }
    else if($human == 2){
        if($computer == 0){return 'Derrota';}
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
        <p>Your Play=</p>
        <form method="post">
            <select name="human">
            <option value="-1">Your Play=</option>
            <option value="0">Piedra</option>
            <option value="1">Papel</option>
            <option value="2">Tijeras</option>
            <option value="3">Your Play=</option>
            </select>

            <input type="submit" name="logout" value="Salir">
            <input type="submit" value="Play">
        </form>

        <?php
        if($human == -1){
            echo "Seleccione una estrategia</br>";
        }
        else if($human == 3){
            for($c=0; $c<3; $c++){
                for($h=0;$h<3;$h++) {
                    $r = check($c, $h);
                    echo "Your Play= $names[$h]   CPU = $names[$c]   Resultado = $r</br>";
                }
            }
        }
        else{
            echo "Your Play= $names[$human] Computer PLay= $names[$computer]   Resultado = $resultado</br>";
        }
        ?>
    </body>
</html>

