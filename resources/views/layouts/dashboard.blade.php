@extends('layouts.app')

@section('content')
    <div class="row text-center">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Estudiantes</h5>
                    <p class="card-text">Gestiona a los estudiantes registrados.</p>
                    <a href="{{ route('students.index') }}" class="btn btn-primary">Ir a Estudiantes</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Materias</h5>
                    <p class="card-text">Consulta y administra las materias disponibles.</p>
                    <a href="{{ route('subjects.index') }}" class="btn btn-primary">Ir a Materias</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Cursos</h5>
                    <p class="card-text">Administra los cursos y sus detalles.</p>
                    <a href="{{ route('courses.index') }}" class="btn btn-primary">Ir a Cursos</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Comisiones</h5>
                    <p class="card-text">Gestiona las comisiones disponibles.</p>
                    <a href="{{ route('commissions.index') }}" class="btn btn-primary">Ir a Comisiones</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Profesores</h5>
                    <p class="card-text">Consulta y administra los profesores asignados.</p>
                    <a href="{{ route('professors.index') }}" class="btn btn-primary">Ir a Profesores</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Inscripciones</h5>
                    <p class="card-text">Administra las inscripciones de estudiantes.</p>
                    <a href="{{ route('course_students.index') }}" class="btn btn-primary">Ir a Inscripciones</a>
                </div>
            </div>
        </div>
    </div>
@endsection