@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Nueva Inscripción</h1>

    <form action="{{ route('course_students.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="student_id">Estudiante:</label>
            <select name="student_id" id="student_id" class="form-control" required>
                <option value="">-- Seleccionar Estudiante --</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="course_id">Curso:</label>
            <select name="course_id" id="course_id" class="form-control" required>
                <option value="">-- Seleccionar Curso --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="commission_id">Comisión:</label>
            <select name="commission_id" id="commission_id" class="form-control" required>
                <option value="">-- Seleccionar Comisión --</option>
                @foreach($commissions as $commission)
                    <option value="{{ $commission->id }}">
                        {{ $commission->classroom ?? 'Comisión sin nombre' }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Inscripción</button>
        <a href="{{ route('course_students.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection