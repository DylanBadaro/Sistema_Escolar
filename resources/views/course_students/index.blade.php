@extends('layouts.app')

@section('content')
<h1>Gestión de Inscripciones</h1>

<!-- Botón para crear nueva inscripción -->
<a href="{{ route('course_students.create') }}" class="btn btn-success mb-3">Nueva Inscripción</a>

<!-- Formulario de búsqueda y filtrado -->
<form method="GET" action="{{ route('course_students.index') }}" class="d-flex mb-3">
    <select name="course_id" class="form-control me-2">
        <option value="">-- Filtrar por curso --</option>
        @foreach($courses as $course)
            <option value="{{ $course->id }}" {{ request('course_id') == $course->id ? 'selected' : '' }}>
                {{ $course->name }}
            </option>
        @endforeach
    </select>
    <select name="commission_id" class="form-control me-2">
        <option value="">-- Filtrar por comisión --</option>
        @foreach($commissions as $commission)
            <option value="{{ $commission->id }}" {{ request('commission_id') == $commission->id ? 'selected' : '' }}>
                {{ $commission->classroom }}
            </option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-success">Filtrar</button>
    <a href="{{ route('course_students.index') }}" class="btn btn-secondary ms-2">Limpiar</a>
</form>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Estudiante</th>
            <th>Curso</th>
            <th>Comisión</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($enrollments as $enrollment)
            <tr>
                <td>{{ $enrollment->id }}</td>
                <td>{{ $enrollment->student->name }}</td>
                <td>{{ $enrollment->course->name }}</td>
                <td>{{ $enrollment->commission->classroom }}</td>
                <td>
                    <a href="{{ route('course_students.edit', $enrollment->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('course_students.destroy', $enrollment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">No se encontraron inscripciones.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<!-- Botón para descargar lista en PDF -->
<a href="{{ route('course_students.downloadPDF', ['course_id' => request('course_id'), 'commission_id' => request('commission_id')]) }}" class="btn btn-info mb-3">Descargar Lista en PDF</a>

<!-- Paginación -->
{{ $enrollments->links() }}
@endsection