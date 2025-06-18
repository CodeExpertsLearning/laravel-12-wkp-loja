@extends('layouts.app')

@section('title')
    Editar Categorias
@endsection

@section('body')
    <div>
        <div>

            <form action="{{ route('manager.categories.update', ['category' => $category->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div>
                    <label for="">Categoria</label>
                    <input type="text" name="name" value="{{ $category->name }}">
                </div>

                <button>Atualizar</button>
            </form>

        </div>

    </div>
@endsection
