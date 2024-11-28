@extends('layouts.app')

@section('content')
<h1>Gestionar Cursos</h1>

<!-- Formulario de filtros -->
<form method="GET" action="{{ route('courses.index') }}" class="d-flex mb-3">
    <select name="subject_id" class="form-control me-2">
        <option value="">Todas las materias</option>
        @foreach($subjects as $subject)
            <option value="{{ $subject->id }}" {{ request('subject_id') == $subject->id ? 'selected' : '' }}>{{ $subject->name }}</option>
        @endforeach
    </select>
    <input 
        type="text" 
        name="search" 
        class="form-control me-2" 
        placeholder="Buscar por nombre" 
        value="{{ request('search') }}">
    <button type="submit" class="btn btn-success">Filtrar</button>
</form>

<!-- Botón para crear nuevo curso -->
<a href="{{ route('courses.create') }}" class="btn btn-success mb-3">Nuevo Curso</a>

<!-- Botón para descargar lista en PDF -->
<a href="{{ route('courses.downloadList', request()->all()) }}" class="btn btn-info mb-3">Descargar Lista</a>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Materia</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->subject->name ?? 'Sin materia' }}</td>
                <td>
                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">No se encontraron cursos.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<!-- Paginación -->
<div class="mt-3">
    {{ $courses->links() }}
</div>
@endsection