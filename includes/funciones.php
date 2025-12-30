<?php

require_once 'app.php';

function incluirTemplate(string $nombre, bool $inicio = false) {
    include __DIR__ . "/templates/{$nombre}.php";
}

function estaAutenticado(): bool {
    // Evita errores si la sesión ya está iniciada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return $_SESSION['login'] ?? false;
}



//<?php

//require 'app.php';

//function incluirTemplate( string  $nombre, bool $inicio = false ) {
    //include TEMPLATES_URL . "/{$nombre}.php"; 
//}

//function estaAutenticado() : bool {
  //  session_start();

    //$auth = $_SESSION['login'];
    //if($auth) {
    //    return true;
    //}
    //return false;
//}