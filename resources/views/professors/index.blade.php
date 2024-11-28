@extends('layouts.app')

@section('content')
<h1>Gestionar Profesores</h1>

<!-- Formulario de búsqueda -->
<form method="GET" action="{{ route('professors.index') }}" class="d-flex mb-3">
    <input 
        type="text" 
        name="name" 
        class="form-control me-2" 
        placeholder="Buscar por nombre" 
        value="{{ request('name') }}">
    <button type="submit" class="btn btn-success">Buscar</button>
</form>

<!-- Botones en la parte superior, alineados -->
<div class="mb-3">
    <!-- Botón para crear nuevo profesor -->
    <a href="{{ route('professors.create') }}" class="btn btn-success me-2">Nuevo Profesor</a>

    <!-- Botón para descargar lista en PDF -->
    <a href="{{ route('professors.downloadList', request()->all()) }}" class="btn btn-info">Descargar Lista en PDF</a>
</div>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Comisiones</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($professors as $professor)
            <tr>
                <td>{{ $professor->id }}</td>
                <td>{{ $professor->name }}</td>
                <td>{{ $professor->commissions->pluck('classroom')->join(', ') }}</td>
                <td>
                    <a href="{{ route('professors.edit', $professor->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('professors.destroy', $professor->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">No se encontraron profesores.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<!-- Paginación -->
{{ $professors->links() }}
@endsection