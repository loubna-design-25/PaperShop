@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 fw-bold">📦 {{ $producte->nom }}</h1>

    <a href="{{ route('productes.index') }}" class="btn btn-secondary mb-4">← Tornar</a>

    @if(session('admin'))
    <a href="{{ route('productes.edit', $producte->id) }}" class="btn btn-warning mb-4">✏️ Editar</a>
    @endif

    <div class="card shadow">
        <div class="row g-0 align-items-center">

            {{-- Imatge --}}
            <div class="col-md-5 p-3 text-center">
                @if($producte->imatge)
                <img src="{{ $producte->imatge }}"
                    style="height: 250px; width: 100%; object-fit: contain; border-radius: 12px; cursor: pointer; background: #f8f8f8;"
                    onclick="document.getElementById('modal-img').style.display='flex'">

                {{-- Modal --}}
                <div id="modal-img"
                    style="display:none; position:fixed; top:0; left:0; width:100%; height:100%;
                                background:rgba(0,0,0,0.85); z-index:9999; align-items:center; justify-content:center;"
                    onclick="this.style.display='none'">
                    <img src="{{ $producte->imatge }}"
                        style="max-height:90vh; max-width:90vw; border-radius:12px;">
                    <span style="color:white; position:absolute; top:20px; right:30px; font-size:2rem; cursor:pointer;">✕</span>
                </div>
                @else
                <div class="d-flex justify-content-center align-items-center bg-light"
                    style="height: 250px; border-radius: 12px;">
                    <span class="text-muted">No hi ha imatge disponible</span>
                </div>
                @endif
            </div>

            {{-- Informació --}}
            <div class="col-md-7">
                <div class="card-body">
                    <p><strong>Descripció:</strong> {{ $producte->descripcio }}</p>
                    <p><strong>Preu:</strong> {{ $producte->preu }} €</p>
                    <p><strong>Quantitat:</strong> {{ $producte->quantitat }}</p>

                    @if(session('admin'))
                    <form action="{{ route('productes.destroy', $producte->id) }}" method="POST"
                        onsubmit="return confirm('Segur que vols eliminar?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">🗑️ Eliminar</button>
                    </form>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection