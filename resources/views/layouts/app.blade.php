<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>📚 Bibliothèque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }
        .navbar {
            background: #1e3a8a; /* bleu profond perso */
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        footer {
            margin-top: 40px;
            padding: 20px;
            text-align: center;
            background: #1e3a8a;
            color: white;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('livres.index') }}">📚 Bibliothèque</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="color:white;">☰</span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('livres.create') }}">➕ Ajouter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('livres.nouveautes') }}">✨ Nouveautés</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('livres.search') }}">🔍 Recherche</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('messages.create') }}">✉️ Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('messages.index') }}">📬 Messages</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
