@extends('layouts.app')

@section('content')
    <h1>{{ isset($subject) ? 'Editar Materia' : 'Crear Materia' }}</h1>

    <form action="{{ isset($subject) ? route('subjects.update', $subject) : route('subjects.store') }}" method="POST">
        @csrf
        @if(isset($subject))
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="name">Materia:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $subject->name }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Materia</button>
    </form>
@endsection
