@extends('layouts.app')

@section('content')
<h1>Gestionar Estudiantes</h1>

<!-- Formulario de búsqueda y filtrado -->
<form method="GET" action="{{ route('students.index') }}" class="d-flex mb-3">
    <input 
        type="text" 
        name="search" 
        class="form-control me-2" 
        placeholder="Buscar por nombre..." 
        value="{{ request('search') }}">
    <select name="course" class="form-control me-2">
        <option value="">-- Filtrar por curso --</option>
        @foreach($courses as $course)
            <option value="{{ $course->id }}" {{ request('course') == $course->id ? 'selected' : '' }}>
                {{ $course->name }}
            </option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-success">Filtrar</button>
    <a href="{{ route('students.index') }}" class="btn btn-secondary ms-2">Limpiar</a>
</form>

<!-- Botones en la parte superior, alineados -->
<div class="mb-3">
    <!-- Botón para crear nuevo estudiante -->
    <a href="{{ route('students.create') }}" class="btn btn-success me-2">Nuevo Estudiante</a>

    <!-- Botón para descargar lista en PDF -->
    <a href="{{ route('students.downloadPDF', ['search' => request('search'), 'course' => request('course')]) }}" class="btn btn-info">Descargar Lista en PDF</a>
</div>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Curso</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->course->name ?? 'Sin curso' }}</td>
                <td>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">No se encontraron estudiantes.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<!-- Paginación -->
<div class="mt-3">
    {{ $students->links() }}
</div>
@endsection