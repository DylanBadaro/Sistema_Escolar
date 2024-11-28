@extends('layouts.app')

@section('content')
<h1>Gestionar Comisiones</h1>

<!-- Formulario de filtros -->
<form method="GET" action="{{ route('commissions.index') }}" class="d-flex mb-3">
    <select name="course_id" class="form-control me-2">
        <option value="">Todos los cursos</option>
        @foreach($courses as $course)
            <option value="{{ $course->id }}" {{ request('course_id') == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
        @endforeach
    </select>
    <select name="schedule" class="form-control me-2">
        <option value="">Todos los horarios</option>
        @foreach($schedules as $schedule)
            <option value="{{ $schedule }}" {{ request('schedule') == $schedule ? 'selected' : '' }}>{{ $schedule }}</option>
        @endforeach
    </select>
    <input 
        type="text" 
        name="name" 
        class="form-control me-2" 
        placeholder="Buscar por nombre" 
        value="{{ request('name') }}">
    <button type="submit" class="btn btn-success">Filtrar</button>
</form>

<!-- Botón para crear nueva comisión -->
<a href="{{ route('commissions.create') }}" class="btn btn-success mb-3">Nueva Comisión</a>

<!-- Botón para descargar lista en PDF -->
<a href="{{ route('commissions.downloadList', request()->all()) }}" class="btn btn-info mb-3">Descargar Lista</a>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Comisión</th>
            <th>Horario</th>
            <th>Curso</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($commissions as $commission)
            <tr>
                <td>{{ $commission->id }}</td>
                <td>{{ $commission->classroom }}</td>
                <td>{{ $commission->schedule }}</td>
                <td>{{ $commission->course->name }}</td>
                <td>
                    <a href="{{ route('commissions.edit', $commission->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('commissions.destroy', $commission->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Paginación -->
<div class="mt-3">
    {{ $commissions->links() }}
</div>
@endsection