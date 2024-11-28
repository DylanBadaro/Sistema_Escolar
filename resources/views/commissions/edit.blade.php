@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Comisión</h2>

    <form action="{{ route('commissions.update', $commission->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="classroom">Aula:</label>
            <input type="text" class="form-control" id="classroom" name="classroom" value="{{ $commission->classroom }}" required>
        </div>
        <div class="form-group">
            <label for="schedule">Horario:</label>
            <select class="form-control" id="schedule" name="schedule" required>
                <option value="">-- Seleccionar Horario --</option>
                @foreach($schedules as $schedule)
                    <option value="{{ $schedule }}" {{ $commission->schedule == $schedule ? 'selected' : '' }}>{{ $schedule }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="course_id">Curso:</label>
            <select class="form-control" id="course_id" name="course_id" required>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $commission->course_id == $course->id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Comisión</button>
    </form>
</div>
@endsection