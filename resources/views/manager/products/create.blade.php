@extends('layouts.app')

@section('title')
    Cadastrar Produtos
@endsection

@section('body')
    <div class="w-full">

        <form action="{{ route('manager.products.store') }}" method="POST">
            @csrf

            <div class="w-full mb-6">
                <label for="" class="block">Produto</label>
                <input type="text" name="name" class="w-full p-2 rounded border border-gray-800">
            </div>

            <div class="w-full mb-6">
                <label for="" class="block">Descrição</label>
                <input type="text" name="description" class="w-full p-2 rounded border border-gray-800">
            </div>

            <div class="w-full mb-6">
                <label for="" class="block">Conteúdo</label>
                <textarea name="body" rows="5" class="w-full p-2 rounded border border-gray-800"></textarea>
            </div>

            <div class="w-full flex items-center gap-x-6">
                <div class="w-[33%] mb-6">
                    <label for="" class="block">Preço</label>
                    <input type="text" name="price" class="w-full p-2 rounded border border-gray-800">
                </div>

                <div class="w-[33%] mb-6">
                    <label for="" class="block">Estoque</label>
                    <input type="text" name="in_stock" class="w-full p-2 rounded border border-gray-800">
                </div>

                <div class="w-[33%] mb-6">
                    <label for="" class="block">Status</label>
                    <select name="status" id="" class="w-full p-2 rounded border border-gray-800">
                        <option value="0">Inativo</option>
                        <option value="1">Ativo</option>
                    </select>
                </div>
            </div>

            <div class="w-full mb-6">
                <label class="w-full mb-4">Categorias</label>

                <div class="px-5 grid grid-cols-3">
                    @foreach ($categories as $category)
                        <div>
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                            {{ $category->name }} (Cod. {{ $category->id }})
                        </div>
                    @endforeach
                </div>
            </div>

            <button
                class="px-4 py-2 rounded border border-green-900 bg-green-700
                           text-white hover:bg-green-900 transition duration-300 ease-in-out cursor-pointer">Cadastrar</button>
        </form>

    </div>
@endsection
