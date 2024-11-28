@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Estudiante</h2>

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Estudiante</button>
    </form>
</div>
@endsection