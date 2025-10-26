<?php
function validarCase(string $string_check, int $case){
    if ($case !== 0 && $case !== 1) return null;

    if ($case === 0) {
        for ($i = 0; $i < strlen($string_check); $i++){
            if (ctype_lower($string_check[$i])){
                return true;
            }
        }
        return false;
    }
    if ($case === 1) {
        for ($i = 0; $i < strlen($string_check); $i++){
            if (ctype_upper($string_check[$i])){
                return true;
            }
        }
        return false;
    }
}

function hayDigito($string_check){
    for ($i = 0; $i < strlen($string_check); $i++) {
        if (ctype_digit($string_check[$i]))
            return true;
    }
    return false;
}

function hayAlfanum($string_check){
    for ($i=0; $i < strlen($string_check) ; $i++) { 
        if (!ctype_alnum($string_check[$i]))
            return true;
    }
    return false;
}


$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password_conf = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$error = false;
$result = [];

if ($email && $password && $password_conf){
    //Validamos longitud
    if (strlen($password) < 8){
        $error = true;
        $result[]= "Longitud de contraseña invalida<br>";
    }

    // Validamos que tengan lower_case y upper_case
    if (!validarCase($password, 0)){
        $error = true;
        $result[]= "Debe contener al menos una minuscula<br>";
    }
    if (!validarCase($password, 1)){
        $error = true;
        $result[]= "Debe contener al menos una mayuscula<br>";
    }

    // Validar que hay por lo menos un numero
    if (!hayDigito($password)){
        $error = true;
        $result[]= "Debe contener al menos un numero<br>";
    }
    // Valdar que al menos hay un caracter no alfanumerico
    if (!hayAlfanum($password)){
        $error = true;
        $result[]= "Debe contener al menos un caracter no alfanumerico<br>";
    }
    // Verificamos que sean iguales
    if ($password !== $password_conf){
        $error = true;
        $result[]= "Las contraseñas no coinciden<br>";
    }

    if (!$error && $_SERVER['REQUEST_METHOD'] === 'POST') 
        echo "<br>Usuario registrado!";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>
</head>
<body>
    
    <h3>Registro</h3>

    <form action="registrar.php" method="post">

    <label for="email">Correo electronico: </label><br>
    <input type="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>" required><br><br>

    <label for="password">Contraseña: </label><br>
    <input type="text" name="password" value="<?= htmlspecialchars($password ?? '') ?>" required><br><br>

    <label for="password2">Confirmar contraseña: </label><br>
    <input type="text" name="password2" value="<?= htmlspecialchars($password_conf ?? '') ?>" required><br><br>

    <input type="submit" value="Registrarse">

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($result)):?>
        <p > <?= implode(" ", $result) ?></p>
    <?php endif; ?>

    </form>
</body>
</html>