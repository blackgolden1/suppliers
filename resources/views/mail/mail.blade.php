<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitación a Postularse</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #2a4ac1;
            color: #ffffff;
            text-align: center;
            padding: 10px 0;
            border-radius: 8px 8px 0 0;
        }
        .content {
            margin-top: 20px;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #2a4ac1;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #2a4ac1;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
<div class="email-container">
    <div class="header">
        <h1>Invitación a Postularse</h1>
    </div>

    <div class="content">
        <p>Estimado proveedor,</p>
        <p>Nos complace invitarlo(a) a participar en la convocatoria <strong>{{$name}}</strong>. Esta es una excelente oportunidad para postularse y demostrar sus habilidades.</p>
        <p>La convocatoria tiene como fecha de inicio el <strong>{{$date_start}}</strong> y finaliza el <strong>{{$date_finish}}</strong>.</p>
        <p>Para conocer más detalles y postularse, haga clic en el siguiente botón:</p>

        <p style="text-align: center;">
            <a href="http://127.0.0.1:8000/convocatorias" class="btn">Postularse Ahora</a>
        </p>
    </div>

    <div class="footer">
        <p>Gracias por su interés en participar.</p>
        <p>&copy; {{ date('Y') }} Su Empresa. Todos los derechos reservados.</p>
    </div>
</div>
</body>
</html>
