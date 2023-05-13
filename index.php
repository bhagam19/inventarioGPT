<?php
// Inicio de la sesión
session_name("inventarioGPT");
session_start();
// Inclusión de los archivos necesarios
require_once dirname(__FILE__).'/03controlador/controladorInventario.php';
try {
    // Creación de una nueva instancia de la clase ControladorInventario
    $ControladorInventario = new ControladorInventario();
    // Verificación de la instalación
    $instalacionVerificada = $ControladorInventario->verificarInstalacion();    
    if ($instalacionVerificada===false) {
        // Si la instalación no está verificada, se procede a instalar
        $ControladorInventario->instalar();
    } else {
        // Si la instalación está verificada, se muestra la página de inicio
        $ControladorInventario->index();
    }
} catch (Exception $e) {
    // Manejo de errores
    echo 'Error: ' . $e->getMessage();
}
?>