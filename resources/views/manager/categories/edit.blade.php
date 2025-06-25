@extends('layouts.app')

@section('title')
    Editar Categorias
@endsection

@section('body')
    <div class="w-full">

        <form action="{{ route('manager.categories.update', ['category' => $category->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="w-full mb-6">
                <label for="" class="block">Categoria</label>
                <input type="text" name="name" value="{{ $category->name }}"
                    class="w-full p-2 rounded border border-gray-800">
            </div>

            <button
                class="px-4 py-2 rounded border border-green-900 bg-green-700
                           text-white hover:bg-green-900 transition duration-300 ease-in-out cursor-pointer">Atualizar</button>
        </form>

    </div>
@endsection
