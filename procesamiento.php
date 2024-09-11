<?php
/**
 Funciones para procesar los datos del teatro
 */

function inicializarTeatro() {
    return array_fill(0, 5, array_fill(0, 5, 'L'));
}

function procesarAccion(&$teatro, $fila, $columna, $accion) {
    $fila--; // Ajustar índice
    $columna--;
    
    $estadoActual = $teatro[$fila][$columna];
    
    switch ($accion) {
        case 'reservar':
            if ($estadoActual === 'L') {
                $teatro[$fila][$columna] = 'R';
                return true;
            }
            break;
        case 'comprar':
            if ($estadoActual === 'L' || $estadoActual === 'R') {
                $teatro[$fila][$columna] = 'V';
                return true;
            }
            break;
        case 'liberar':
            if ($estadoActual === 'R') {
                $teatro[$fila][$columna] = 'L';
                return true;
            }
            break;
    }
    
    return "Operación no válida. No se puede $accion un asiento en estado $estadoActual.";
}