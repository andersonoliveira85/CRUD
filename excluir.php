<?php
$pagina = $elemento = $acao = null;
if ( isset( $_GET["p"]) && isset( $_GET["acao"]) && isset( $_GET["id"]) ) {
    $pagina = $_GET["p"];
    $elemento = $_GET["id"];
    $acao = $_GET["acao"];
} else {
    header("location: index.php");
}
// Importar autoload
require_once __DIR__ . "/App/autoload.php";

// Importar página a ser listada
include "Inc/apagar_{$pagina}.php"
?>