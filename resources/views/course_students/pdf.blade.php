<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Inscripciones</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
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
                    <td>{{ $record->student->name }}</td>
                    <td>{{ $record->course->name }}</td>
                    <td>{{ $record->commission->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>