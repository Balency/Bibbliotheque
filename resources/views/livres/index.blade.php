@extends('layouts.app')

@section('content')
    <h1 class="mb-4">📚 Liste des livres</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('livres.create') }}" class="btn btn-primary mb-3">➕ Ajouter un livre</a>

    @if($livres->isEmpty())
        <div class="alert alert-info">Aucun livre disponible.</div>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Catégorie</th>
                    <th>Année</th>
                    <th>Prix (€)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($livres as $livre)
                    <tr>
                        <td>{{ $livre->titre }}</td>
                        <td>{{ $livre->auteur }}</td>
                        <td>{{ $livre->categorie }}</td>
                        <td>{{ $livre->annee_publication }}</td>
                        <td>{{ $livre->prix }}</td>
                        <td>
                            <a href="{{ route('livres.show', $livre) }}" class="btn btn-info btn-sm">👁️ Voir</a>
                            <a href="{{ route('livres.edit', $livre) }}" class="btn btn-warning btn-sm">✏️ Éditer</a>
                            <form action="{{ route('livres.destroy', $livre) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Supprimer ce livre ?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">🗑️ Supprimer</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection