<html>

<head>
    <title>Produtos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div>
        <h2>Produtos</h2>

        @foreach ($products as $product)
            {{ $product->id }} - {{ $product->name }}, {{ $product->created_at->format('d/m/Y') }} |
            <a href="{{ route('manager.products.edit', ['product' => $product->id]) }}">Editar</a> /
            <form action="{{ route('manager.products.destroy', ['product' => $product->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button>Apagar</button>
            </form>
            <br>
        @endforeach

        <hr>

        {{ $products->links() }}
    </div>
</body>

</html>
