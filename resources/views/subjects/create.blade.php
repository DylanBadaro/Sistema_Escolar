@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Nueva Materia</h2>

    <form action="{{ route('subjects.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre de la Materia:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Guardar Materia</button>
    </form>
</div>
@endsection