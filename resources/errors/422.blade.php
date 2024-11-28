@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h2>Error 422</h2>
    <p>No se puede asignar este horario al curso seleccionado. Por favor, intente con otro horario.</p>
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Volver</a>
</div>
@endsection