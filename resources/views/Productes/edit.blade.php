@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 fw-bold">✏️ Editar producte</h1>

    <a href="{{ route('productes.index') }}" class="btn btn-secondary mb-4">← Tornar</a>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Hi ha errors al formulari:</strong>
        <ul class="mt-2 mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('productes.update', $producte->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-bold">Nom</label>
                    <input type="text" name="nom" class="form-control"
                        value="{{ old('nom', $producte->nom) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Descripció</label>
                    <textarea name="descripcio" class="form-control" rows="3"
                        required>{{ old('descripcio', $producte->descripcio) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Preu (€)</label>
                    <input type="number" name="preu" class="form-control" step="0.01" min="0"
                        value="{{ old('preu', $producte->preu) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Quantitat</label>
                    <input type="number" name="quantitat" class="form-control" min="0"
                        value="{{ old('quantitat', $producte->quantitat) }}" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">URL imatge (opcional)</label>
                    <input type="text" name="imatge" class="form-control"
                        value="{{ old('imatge', $producte->imatge) }}">
                </div>

                <button type="submit" class="btn btn-primary">💾 Actualitzar</button>
            </form>
        </div>
    </div>
</div>
@endsection