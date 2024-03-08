<!DOCTYPE html>
<html>

<head>
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="tu_estilo.css">
    <link rel="icon" href="img/logo.png" type="image/png">
</head>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

h2 {
    text-align: center;
    background-color: #03AE85;
    color: #fff;
    padding: 10px;
}
</style>

<body>
    <h2>Crear Usuario</h2>
    <form action="procesar_creacion_usuario.php" method="POST">
        <label for="usuario">Nombre de Usuario:</label>
        <input type="text" name="usuario" required>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required>

        <label for="rol">Rol:</label>
        <select name="rol">
            <option value="administrador">Administrador</option>
            <option value="operador">Operador</option>
        </select>

        <input type="submit" value="Crear Usuario">
    </form>
</body>

</html>