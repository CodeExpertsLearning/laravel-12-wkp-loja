<div>

    <form action="{{ route('manager.categories.store') }}" method="POST">
        @csrf

        <div>
            <label for="">Categoria</label>
            <input type="text" name="name">
        </div>

        <button>Cadastrar</button>
    </form>

</div>
