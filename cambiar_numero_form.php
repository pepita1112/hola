<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario para cambiar número</title>
</head>
<body>
    <h1>Formulario para cambiar número</h1>
    <?php
    // Obtener el último número desde el archivo numero.txt
    $ultimoNumero = file_get_contents("numero.txt");
    ?>
    <form id="formCambiarNumero" action="cambiar_numero.php" method="POST">
        <label for="nuevo_numero">Número:</label>
        <input type="number" id="nuevo_numero" name="numero" value="<?php echo $ultimoNumero; ?>">
        
        <label for="vaciar_numero">Vaciar número:</label>
        <select id="vaciar_numero" name="vaciar_numero">
            <option value="0">No</option>
            <option value="1">Sí, vaciar número</option>
        </select>
        
        <button type="submit">Cambiar</button>
    </form>
</body>
</html>
