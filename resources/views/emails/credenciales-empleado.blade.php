<!DOCTYPE html>
<html>
<head>
    <title>Credenciales de acceso</title>
</head>
<body>
    <p>Hola {{ $nombre }},</p>

    <p>Tu cuenta ha sido creada con éxito. Aquí tienes tus credenciales:</p>

    <ul>
        <li><strong>Email:</strong> {{ $email }}</li>
        <li><strong>Contraseña:</strong> {{ $password }}</li>
    </ul>

    <p>Puedes iniciar sesión desde la página de acceso.</p>

    <p>¡Bienvenido al sistema!</p>
</body>
</html>
