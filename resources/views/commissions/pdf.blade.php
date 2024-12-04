<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Comisiones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Lista de Comisiones</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Comisión</th>
                <th>Horario</th>
                <th>Curso</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commissions as $commission)
                <tr>
                    <td>{{ $commission->id }}</td>
                    <td>{{ $commission->classroom }}</td>
                    <td>{{ $commission->schedule }}</td>
                    <td>{{ $commission->course->name ?? 'Sin curso' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
