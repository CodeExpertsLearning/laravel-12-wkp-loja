<div>
    <div>

        <form action="{{ route('manager.products.update', ['product' => $product->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="">Produto</label>
                <input type="text" name="name" value="{{ $product->name }}">
            </div>

            <div>
                <label for="">Descrição</label>
                <input type="text" name="description" value="{{ $product->description }}">
            </div>

            <div>
                <label for="">Conteúdo</label>
                <textarea name="body">{{ $product->body }}</textarea>
            </div>

            <div>
                <label for="">Preço</label>
                <input type="text" name="price" value="{{ $product->price }}">
            </div>

            <div>
                <label for="">Estoque</label>
                <input type="text" name="in_stock" value="{{ $product->in_stock }}">
            </div>

            <div>
                <label for="">Status</label>
                <select name="status" id="">
                    <option value="0" @selected($product->status == 0)>Inativo</option>
                    <option value="1" @selected($product->status == 1)>Ativo</option>
                </select>
            </div>
            <button>Atualizar</button>
        </form>

    </div>

</div>
