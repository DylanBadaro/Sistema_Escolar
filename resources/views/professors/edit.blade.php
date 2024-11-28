@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Profesor</h2>

    <form action="{{ route('professors.update', $professor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Campo Nombre -->
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $professor->name }}" required>
        </div>

        <!-- Campo Comisiones -->
        <div class="form-group">
            <label for="commissions">Comisiones:</label>
            <select id="commissions" name="commissions[]" class="form-control" multiple>
                @foreach($commissions as $commission)
                    <option value="{{ $commission->id }}" 
                        {{ $professor->commissions->contains($commission->id) ? 'selected' : '' }}>
                        {{ $commission->classroom }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Profesor</button>
    </form>
</div>
@endsection