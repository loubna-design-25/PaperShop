<div class="w-full">
    <div class="flex flex-wrap">
        <h1 class="mb-5">{{ $title }}</h1>
    </div>
</div>

<form method="POST" action="{{ $route }}" class="needs-validation">
    @csrf
    @isset($update)
    @method("PUT")
    @endisset

    {{-- Nom --}}
    <div class="mb-3">
        <label for="nom" class="form-label">{{ __("Nom del producte") }}</label>
        <input name="nom" type="text" class="form-control"
            value="{{ old('nom') ?? ($producte->nom ?? '') }}">
        @error("nom")
        <div class="fs-6 text-danger">{{ $message }}</div>
        @enderror
    </div>

    {{-- Descripció --}}
    <div class="mb-3">
        <label for="descripcio" class="form-label">{{ __("Descripció") }}</label>
        <textarea name="descripcio" class="form-control" rows="3">
        {{ old('descripcio') ?? ($producte->descripcio ?? '') }}
        </textarea>
        @error("descripcio")
        <div class="fs-6 text-danger">{{ $message }}</div>
        @enderror
    </div>

    {{-- Preu --}}
    <div class="mb-3">
        <label for="preu" class="form-label">{{ __("Preu (€)") }}</label>
        <input name="preu" type="number" step="0.01" class="form-control"
            value="{{ old('preu') ?? ($producte->preu ?? '') }}">
        @error("preu")
        <div class="fs-6 text-danger">{{ $message }}</div>
        @enderror
    </div>

    {{-- Quantitat --}}
    <div class="mb-3">
        <label for="quantitat" class="form-label">{{ __("Quantitat en stock") }}</label>
        <input name="quantitat" type="number" class="form-control"
            value="{{ old('quantitat') ?? ($producte->quantitat ?? '') }}">
        @error("quantitat")
        <div class="fs-6 text-danger">{{ $message }}</div>
        @enderror
    </div>

    {{-- Imatge --}}
    <div class="mb-3">
        <label for="imatge" class="form-label">{{ __("URL de la imatge") }}</label>
        <input name="imatge" type="url" class="form-control"
            value="{{ old('imatge') ?? ($producte->imatge ?? '') }}">
        @error("imatge")
        <div class="fs-6 text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <button class="btn btn-primary" type="submit">
            {{ $textButton }}
        </button>
    </div>
</form>