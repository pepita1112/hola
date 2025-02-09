<?php
// Obtener el nuevo número del formulario
$nuevoNumero = $_POST["numero"];
$vaciarNumero = $_POST["vaciar_numero"];

// Verificar si se seleccionó vaciar el número
if ($vaciarNumero == 1) {
    // Establecer el contenido de numero.txt como vacío
    file_put_contents("numero.txt", "");
} elseif ($nuevoNumero !== null) {
    // Si no se seleccionó vaciar y se proporcionó un nuevo número, escribirlo en numero.txt
    file_put_contents("numero.txt", $nuevoNumero);
}

// Redireccionar a la página anterior o a donde desees después de cambiar el número
header("Location: cambiar_numero_form.php");
exit();
?>
