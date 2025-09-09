@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">➕ Ajouter un livre</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm p-4">
                <form action="{{ route('livres.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Titre</label>
                        <input type="text" name="titre" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Auteur</label>
                        <input type="text" name="auteur" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Catégorie</label>
                        <input type="text" name="categorie" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Année de publication</label>
                        <input type="number" name="annee_publication" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Résumé</label>
                        <textarea name="resume" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Prix (€)</label>
                        <input type="number" step="0.01" name="prix" class="form-control" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">✅ Ajouter</button>
                        <a href="{{ route('livres.index') }}" class="btn btn-secondary">↩ Retour</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
