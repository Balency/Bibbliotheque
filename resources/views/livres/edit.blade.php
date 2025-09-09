@extends('layouts.app')

@section('content')
    <h1 class="mb-4">✏️ Modifier le livre : {{ $livre->titre }}</h1>

    <form action="{{ route('livres.update', $livre) }}" method="POST" class="card p-4 shadow">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Titre</label>
            <input type="text" name="titre" class="form-control" value="{{ $livre->titre }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Auteur</label>
            <input type="text" name="auteur" class="form-control" value="{{ $livre->auteur }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Catégorie</label>
            <input type="text" name="categorie" class="form-control" value="{{ $livre->categorie }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Année de publication</label>
            <input type="number" name="annee_publication" class="form-control" value="{{ $livre->annee_publication }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Résumé</label>
            <textarea name="resume" class="form-control" rows="3" required>{{ $livre->resume }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Prix (€)</label>
            <input type="number" step="0.01" name="prix" class="form-control" value="{{ $livre->prix }}" required>
        </div>

        <button type="submit" class="btn btn-warning">💾 Enregistrer</button>
        <a href="{{ route('livres.index') }}" class="btn btn-secondary">↩ Retour</a>
    </form>
@endsection
