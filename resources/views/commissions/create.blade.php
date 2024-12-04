@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Nueva Comisión</h2>

    <form action="{{ route('commissions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="classroom">Comisión:</label>
            <input type="text" class="form-control" id="classroom" name="classroom" value="{{ old('classroom') }}" required>
        </div>
        <div class="form-group">
            <label for="schedule">Horario:</label>
            <select class="form-control" id="schedule" name="schedule" required>
                <option value="">-- Seleccionar Horario --</option>
                @foreach($schedules as $schedule)
                    <option value="{{ $schedule }}" {{ old('schedule') == $schedule ? 'selected' : '' }}>{{ $schedule }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="course_id">Curso:</label>
            <select class="form-control" id="course_id" name="course_id" required>
                <option value="">-- Seleccionar Curso --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Comisión</button>
    </form>
</div>
@endsection
