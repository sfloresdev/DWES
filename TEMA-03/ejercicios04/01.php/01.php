<?php

    $t_users = [
        "pepe" => "pepe",
        "sergio" => "1234",
        "admin" => "admin"
    ];

    $user = $_POST["usuario"];
    $password = $_POST["password"];

    if (array_key_exists($user, $t_users) && $t_users[$user] == $password )
    {
        echo "Bienvenido al sistema $user";
    } else 
    {
        echo "Usuario o contraseña incorrecto";
    }
?>