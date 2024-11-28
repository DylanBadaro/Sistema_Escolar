@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Nuevo Profesor</h2>

    <form action="{{ route('professors.store') }}" method="POST">
        @csrf

        <!-- Campo Nombre -->
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <!-- Lista de Comisiones -->
        <div class="form-group">
            <label>Comisiones Disponibles:</label>
            <div class="form-check">
                @foreach($commissions as $commission)
                    <div>
                        <input type="checkbox" class="form-check-input" id="commission_{{ $commission->id }}" 
                               name="commissions[]" value="{{ $commission->id }}">
                        <label class="form-check-label" for="commission_{{ $commission->id }}">
                            Aula: {{ $commission->classroom }}, Horario: {{ $commission->schedule }}, Curso: {{ $commission->course->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Profesor</button>
    </form>
</div>

@endsection