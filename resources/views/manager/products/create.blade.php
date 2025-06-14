<div>

    <form action="{{ route('manager.products.store') }}" method="POST">
        @csrf

        <div>
            <label for="">Produto</label>
            <input type="text" name="name">
        </div>

        <div>
            <label for="">Descrição</label>
            <input type="text" name="description">
        </div>

        <div>
            <label for="">Conteúdo</label>
            <input type="text" name="body">
        </div>

        <div>
            <label for="">Preço</label>
            <input type="text" name="price">
        </div>

        <div>
            <label for="">Estoque</label>
            <input type="text" name="in_stock">
        </div>

        <div>
            <label for="">Status</label>
            <select name="status" id="">
                <option value="0">Inativo</option>
                <option value="1">Ativo</option>
            </select>
        </div>
        <button>Cadastrar</button>
    </form>

</div>
