@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">📦 Llista de productes</h1>

    @if(session('admin'))
    <a href="{{ route('productes.create') }}" class="btn btn-success mb-4">
        ➕ Afegir producte
    </a>
    @endif

    @if($productes->isEmpty())
    <div class="alert alert-warning">
        No hi ha productes disponibles.
    </div>
    @else
    <div class="row row-cols-2 row-cols-md-4 g-3">
        @foreach ($productes as $producte)
        <div class="col">
            <div class="card h-100 shadow-sm {{ $producte->quantitat == 0 ? 'opacity-50' : '' }}">
                @if($producte->imatge)
                <div class="position-relative">
                    <img src="{{ $producte->imatge }}" class="card-img-top"
                        style="height: 150px; object-fit: cover;">
                    @if($producte->quantitat == 0)
                    <span class="badge bg-danger position-absolute top-0 end-0 m-2">
                        Sense stock
                    </span>
                    @endif
                </div>
                @endif
                <div class="card-body p-2">
                    <h6 class="card-title fw-bold mb-1">{{ $producte->nom }}</h6>
                    <p class="card-text text-muted small mb-1" style="font-size:0.8rem">
                        {{ Str::limit($producte->descripcio, 40) }}
                    </p>
                    <p class="fw-bold mb-2 small">{{ $producte->preu }} €</p>

                    @if($producte->quantitat == 0)
                    <button class="btn btn-secondary btn-sm w-100" disabled>
                        Sense stock
                    </button>
                    @else
                    <a href="{{ route('productes.show', $producte->id) }}"
                        class="btn btn-primary btn-sm w-100">
                        Veure detalls
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif

</div>
@endsection