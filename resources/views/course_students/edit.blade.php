@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Inscripción</h1>

    <form action="{{ route('course_students.update', $courseStudent->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="student_id">Estudiante:</label>
            <select name="student_id" id="student_id" class="form-control" required>
                <option value="">-- Seleccionar Estudiante --</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ $courseStudent->student_id == $student->id ? 'selected' : '' }}>
                        {{ $student->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="course_id">Curso:</label>
            <select name="course_id" id="course_id" class="form-control" required>
                <option value="">-- Seleccionar Curso --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $courseStudent->course_id == $course->id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="commission_id">Comisión:</label>
            <select name="commission_id" id="commission_id" class="form-control" required>
                <option value="">-- Seleccionar Comisión --</option>
                @foreach($commissions as $commission)
                    <option value="{{ $commission->id }}" {{ $courseStudent->commission_id == $commission->id ? 'selected' : '' }}>
                        {{ $commission->classroom }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Inscripción</button>
        <a href="{{ route('course_students.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
