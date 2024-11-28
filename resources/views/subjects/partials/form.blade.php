<form action="{{ $action }}" method="POST">
    @csrf
    @if (isset($method) && $method !== 'POST')
        @method($method)
    @endif

    <div class="form-group mb-3">
        <label for="name" class="form-label">Nombre de la Materia:</label>
        <input 
            type="text" 
            class="form-control @error('name') is-invalid @enderror" 
            id="name" 
            name="name" 
            value="{{ old('name', $subject->name ?? '') }}" 
            placeholder="Escribe el nombre de la materia" 
            required
            aria-label="Nombre de la Materia"
        >
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
</form>
