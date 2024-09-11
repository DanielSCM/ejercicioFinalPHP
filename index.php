<?php
/*
 Desarrollador: Daniel Santiago Cuellar Murillo
 Programa de Formación: DESARROLLO WEB CON PHP (3038017)
 Evidencia: Gestión de sillas de teatro
 */

require_once 'procesamiento.php';
require_once 'presentacion.php';

// Inicializar el teatro si no existe
if (!isset($_POST['teatro'])) {
    $teatro = inicializarTeatro();
} else {
    $teatro = json_decode($_POST['teatro'], true);
}

// Procesar la acción si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion'])) {
    $fila = $_POST['fila'];
    $columna = $_POST['columna'];
    $accion = $_POST['accion'];
    
    $resultado = procesarAccion($teatro, $fila, $columna, $accion);
    if ($resultado !== true) {
        $mensaje = $resultado;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Teatro</title>
    <link rel="stylesheet" href="style.css">
   
</head>
<body>
    <h1>Gestión de Teatro</h1>
    
    <?php mostrarTeatro($teatro); ?>
    
    <form method="POST">
        <input type="number" name="fila" min="1" max="5" required placeholder="Fila">
        <input type="number" name="columna" min="1" max="5" required placeholder="Columna">
        <select name="accion">
            <option value="reservar">Reservar</option>
            <option value="comprar">Comprar</option>
            <option value="liberar">Liberar</option>
        </select>
        <input type="submit" value="Ejecutar">
        
        <textarea name="teatro" style="display: none;"><?php echo json_encode($teatro); ?></textarea>
    </form>
    
    <?php
    if (isset($mensaje)) {
        echo "<p>$mensaje</p>";
    }
    ?>
</body>
</html>