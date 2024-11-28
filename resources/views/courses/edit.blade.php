@extends('layouts.app')

@section('content')
    <h1>{{ isset($course) ? 'Editar Curso' : 'Crear Curso' }}</h1>

    <form action="{{ isset($course) ? route('courses.update', $course) : route('courses.store') }}" method="POST">
        @csrf
        @if(isset($course))
            @method('PUT')
        @endif

        <!-- Campo para el nombre del curso -->
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" id="name" name="name" value="{{ isset($course) ? $course->name : old('name') }}" class="form-control" required>
        </div>

        <!-- Campo para seleccionar la materia -->
        <div class="form-group">
            <label for="subject_id">Materia</label>
            <select id="subject_id" name="subject_id" class="form-control" required>
                <option value="">-- Seleccionar Materia --</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" 
                        {{ isset($course) && $course->subject_id == $subject->id ? 'selected' : old('subject_id') }}>
                        {{ $subject->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ isset($course) ? 'Actualizar Curso' : 'Crear Curso' }}
        </button>
    </form>
@endsection
