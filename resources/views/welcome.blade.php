<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PaperShop - Material Escolar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-bg {
            background-image: url('/img/backgroundimg.jpg');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
        }

        .btn-hero {
            background: white;
            color: #764ba2;
            font-weight: 700;
            padding: 14px 40px;
            border-radius: 50px;
            font-size: 1.1rem;
            border: none;
        }

        .btn-hero:hover {
            transform: scale(1.05);
            transition: 0.2s;
        }

        .feature-card {
            border: none;
            border-radius: 16px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark"
        style="background: rgba(0,0,0,0.2); position: absolute; width: 100%; z-index:10;">
        <div class="container">
            <a class="navbar-brand text-white" href="#">🎒 PaperShop</a>
            <div>
                <a href="{{ route('productes.index') }}" class="btn btn-outline-light me-2">Catàleg</a>
                @if(session('admin'))
                <a href="{{ route('logout') }}" class="btn btn-danger btn-lg fw-bold">Tancar sessió</a>
                @else
                <a href="{{ route('login') }}" class="btn btn-light btn-lg fw-bold">🔐 Registrar com a Admin</a>
                @endif
            </div>
        </div>
    </nav>

    {{-- Hero --}}
    <section class="text-white hero-bg">
        <div class="container text-center">
            <p class="fs-5 mb-2 opacity-75">Benvingut a la nostra botiga</p>
            <h1 class="display-1 fw-bold mb-3">🎒 PaperShop</h1>
            <p class="lead fs-4 mb-5 opacity-90">Tot el material escolar que necessites,<br>al millor preu i a un clic.</p>
            <a href="{{ route('productes.index') }}" class="btn btn-hero">
                🛍️ Veure catàleg
            </a>
        </div>
    </section>

    {{-- Features --}}
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-md-4">
                    <div class="feature-card bg-white">
                        <div class="feature-icon">✏️</div>
                        <h5 class="fw-bold">Gran varietat</h5>
                        <p class="text-muted">Bolígrafs, llibretes, carpetes i molt més</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card bg-white">
                        <div class="feature-icon">💶</div>
                        <h5 class="fw-bold">Millors preus</h5>
                        <p class="text-muted">Ofertes exclusives per a estudiants</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card bg-white">
                        <div class="feature-icon">🚀</div>
                        <h5 class="fw-bold">Ràpid i fàcil</h5>
                        <p class="text-muted">Gestiona el teu inventari en segons</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="text-center py-4 text-muted">
        <p class="mb-0">© 2025 PaperShop · Fet amb ❤️ i Laravel</p>
    </footer>

</body>

</html>