<div>
    <h2>Categorias</h2>

    @foreach ($categories as $category)
        {{ $category->id }} - {{ $category->name }}, {{ $category->created_at->format('d/m/Y') }} |
        <a href="{{ route('manager.categories.edit', ['category' => $category->id]) }}">Editar</a> /
        <form action="{{ route('manager.categories.destroy', ['category' => $category->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Apagar</button>
        </form>
        <br>
    @endforeach

    <hr>

    {{ $categories->links() }}
</div>
