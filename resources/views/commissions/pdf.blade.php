<!DOCTYPE html>
<html>
<head>
    <title>Comisiones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Lista de Comisiones</h2>
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
                    <td>{{ $commission->course->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>