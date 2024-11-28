<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Profesores</title>
</head>
<body>
    <h2>Lista de Profesores</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Comisiones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($professors as $professor)
                <tr>
                    <td>{{ $professor->id }}</td>
                    <td>{{ $professor->name }}</td>
                    <td>{{ $professor->commissions->pluck('classroom')->join(', ') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
