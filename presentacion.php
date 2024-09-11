<?php
/*
  Funciones para presentar los datos del teatro
 */

function mostrarTeatro($teatro) {
    echo "<table border='1'>";
    foreach ($teatro as $fila) {
        echo "<tr>";
        foreach ($fila as $silla) {
            echo "<td>$silla</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}