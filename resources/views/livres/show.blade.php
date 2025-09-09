@extends('layouts.app')

@section('content')
    <h1 class="mb-4">{{ $livre->titre }}</h1>

    <div class="card p-4">
        <h5>Auteur : {{ $livre->auteur }}</h5>
        <p><strong>Catégorie :</strong> {{ $livre->categorie }}</p>
        <p><strong>Année de publication :</strong> {{ $livre->annee_publication }}</p>
        <p><strong>Prix :</strong> {{ $livre->prix }} €</p>
        <p><strong>Résumé :</strong></p>
        <p>{{ $livre->resume }}</p>
    </div>

    <div class="mt-3">
        <a href="{{ route('livres.index') }}" class="btn btn-secondary">↩ Retour</a>
    </div>
@endsection
