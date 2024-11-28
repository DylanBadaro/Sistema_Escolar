@extends('layouts.app')

@section('content')
<h1>Gestionar Materias</h1>

<a href="{{ route('subjects.create') }}" class="btn btn-success mb-3">Nueva Materia</a>

<!-- Formulario de búsqueda -->
<form action="{{ route('subjects.search') }}" method="GET" class="d-flex mb-3">
    <input 
        type="text" 
        name="query" 
        class="form-control me-2" 
        placeholder="Buscar Materia..." 
        value="{{ request('query') }}"
    >
    <button type="submit" class="btn btn-success">Buscar</button>
</form>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($subjects as $subject)
            <tr>
                <td>{{ $subject->id }}</td>
                <td>{{ $subject->name }}</td>
                <td>
                    <a href="{{ route('subjects.edit', $subject) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('subjects.destroy', $subject) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">No se encontraron materias.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<!-- Botón para descargar PDF -->
<a href="{{ route('subjects.downloadPdf') }}" class="btn btn-info mb-3">Descargar Lista en PDF</a>

{{ $subjects->links() }}
@endsection
