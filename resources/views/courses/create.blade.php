@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ isset($course) ? 'Editar Curso' : 'Crear Curso' }}</h2>

    <form action="{{ isset($course) ? route('courses.update', $course) : route('courses.store') }}" method="POST">
        @csrf
        @if(isset($course))
            @method('PUT')
        @endif

        <!-- Campo Nombre -->
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', isset($course) ? $course->name : '') }}" required>
        </div>

        <!-- Campo Materia -->
        <div class="form-group">
            <label for="subject_id">Materia:</label>
            <select id="subject_id" name="subject_id" class="form-control" required>
                <option value="">-- Seleccionar Materia --</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" 
                        {{ old('subject_id', isset($course) ? $course->subject_id : '') == $subject->id ? 'selected' : '' }}>
                        {{ $subject->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ isset($course) ? 'Actualizar Curso' : 'Crear Curso' }}
        </button>
    </form>
</div>
@endsection
