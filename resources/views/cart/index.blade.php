<!DOCTYPE html>
<html>
<head>
    <title>Panier</title>
</head>
<body>
<h1>Panier</h1>

@if(session('success'))
    <div style="color: green">{{ session('success') }}</div>
@endif

<h2>Produits dans le panier</h2>
@foreach($cartItems as $item)
    <div>
        {{ $item->product_name }} - ${{ $item->price }} x {{ $item->quantity }}
        <form method="POST" action="{{ route('cart.remove', $item->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Supprimer</button>
        </form>
    </div>
@endforeach

<h2>Ajouter un produit</h2>
<form method="POST" action="{{ route('cart.add') }}">
    @csrf
    <input name="product_name" placeholder="Nom du produit">
    <input name="price" placeholder="Prix">
    <input name="quantity" placeholder="Quantité" value="1">
    <button type="submit">Ajouter</button>
</form>

<h2>Valider la commande</h2>
<form method="POST" action="{{ route('cart.checkout') }}">
    @csrf
    <input name="name" placeholder="Nom" value="{{ old('name') }}">
    @error('name')<div style="color:red">{{ $message }}</div>@enderror

    <input name="email" placeholder="Email" value="{{ old('email') }}">
    @error('email')<div style="color:red">{{ $message }}</div>@enderror

    <input name="address" placeholder="Adresse" value="{{ old('address') }}">
    @error('address')<div style="color:red">{{ $message }}</div>@enderror

    <button type="submit">Valider</button>
</form>
</body>
</html>
