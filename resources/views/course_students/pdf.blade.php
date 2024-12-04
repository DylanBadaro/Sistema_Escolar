<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Inscripciones</title>
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
    <h1>Lista de Inscripciones</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Estudiante</th>
                <th>Curso</th>
                <th>Comisión</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $record)
                <tr>
                    <td>{{ $record->id }}</td>
                    <td>{{ $record->student->name ?? 'Sin nombre' }}</td>
                    <td>{{ $record->course->name ?? 'Sin curso' }}</td>
                    <td>{{ $record->commission->name ?? 'Sin comisión' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
