@extends('layouts.app')

@section('content')
<div class="container py-5">

    {{-- Hero principal --}}
    <div class="text-center mb-5">
        <h1 class="fw-bold display-4">🛒 Benvingut/da a la Botiga Online</h1>
        <p class="text-muted fs-5">Descobreix els millors productes al millor preu</p>

        <img
            src="https://images.unsplash.com/photo-1542831371-d531d36971e6"
            class="img-fluid rounded shadow mb-4"
            style="max-height: 350px; object-fit: cover;">

        <a href="{{ route('productes.index') }}" class="btn btn-primary btn-lg px-5">
            📦 Veure productes
        </a>
    </div>

    {{-- Secció informativa --}}
    <div class="row text-center mt-5">
        <div class="col-md-4">
            <h4>🚚 Enviament ràpid</h4>
            <p class="text-muted">Rebràs els teus productes en temps rècord.</p>
        </div>
        <div class="col-md-4">
            <h4>💳 Pagament segur</h4>
            <p class="text-muted">Compres protegides i 100% fiables.</p>
        </div>
        <div class="col-md-4">
            <h4>⭐ Qualitat garantida</h4>
            <p class="text-muted">Només oferim productes de confiança.</p>
        </div>
    </div>

</div>
@endsection