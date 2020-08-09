<?php
function validarCampos(){
    //Correct pw=php123.
    $valid_pass = 'php123';
    $hash_pass = md5($valid_pass);
    $msg_pass_error = "";
    if(isset($_POST['pass'])){
        $hash_test = md5($_POST['pass']);
        if($hash_pass !== $hash_test){
            $msg_pass_error = "Incorrect password";
        }
        else{
            header("Location: game.php?name=" . urldecode($_POST['who']));
        }
    }
    echo "<font color='red'>" . $msg_pass_error . "</font>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Leandro Hurtado Salazar e7d22b2d</title>
    </head>

    <body>
        <h1>Inicio de sesion</h1>
        <p>Ingrese sus datos apropiadamente</p>
        <p>
        <?php validarCampos(); ?>
        </p>
        <form method="post">
            Nombre: <input type="text" name="who" required>
            Clave:  <input type="password" name="pass" required>
            <input type="submit" value="Log In">
        </form>
    </body>
</html>