@extends('layouts.app')

@section('content')
<div class="container py-5" style="max-width: 400px;">
    <h2 class="mb-4 fw-bold">🔐 Accés Admin</h2>

    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <form method="POST" action="/login">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold">Usuari</label>
                    <input type="text" name="usuari" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Contrasenya</label>
                    <input type="password" name="contrasenya" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>
        </div>
    </div>
</div>
@endsection