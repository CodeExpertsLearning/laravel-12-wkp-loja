@extends('layouts.app')

@section('title')
    Cadastrar Produtos
@endsection

@section('body')
    <div class="w-full">

        <form action="{{ route('manager.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="w-full mb-6">
                <label for="" class="block">Produto</label>
                <input type="text" name="name" class="w-full p-2 rounded border border-gray-800">

                @error('name')
                    <div class="w-full block mt-6 rounded border-red-900 bg-red-400 text-red-900 p-2">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="w-full mb-6">
                <label for="" class="block">Descrição</label>
                <input type="text" name="description" class="w-full p-2 rounded border border-gray-800">

                @error('description')
                    <div class="w-full block mt-6 rounded border-red-900 bg-red-400 text-red-900 p-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="w-full mb-6">
                <label for="" class="block">Conteúdo</label>
                <textarea name="body" rows="5" class="w-full p-2 rounded border border-gray-800"></textarea>

                @error('body')
                    <div class="w-full block mt-6 rounded border-red-900 bg-red-400 text-red-900 p-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="w-full flex items-center gap-x-6">
                <div class="w-[33%] mb-6">
                    <label for="" class="block">Preço</label>
                    <input type="text" name="price" class="w-full p-2 rounded border border-gray-800">

                    @error('price')
                        <div class="w-full block mt-6 rounded border-red-900 bg-red-400 text-red-900 p-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="w-[33%] mb-6">
                    <label for="" class="block">Estoque</label>
                    <input type="text" name="in_stock" class="w-full p-2 rounded border border-gray-800">

                    @error('in_stock')
                        <div class="w-full block mt-6 rounded border-red-900 bg-red-400 text-red-900 p-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="w-[33%] mb-6">
                    <label for="" class="block">Status</label>
                    <select name="status" id="" class="w-full p-2 rounded border border-gray-800">
                        <option value="0">Inativo</option>
                        <option value="1">Ativo</option>
                    </select>

                    @error('status')
                        <div class="w-full block mt-6 rounded border-red-900 bg-red-400 text-red-900 p-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="w-full mb-6">
                <label for="" class="block">Fotos Produtos</label>
                <input type="file" name="photos[]" class="w-full p-2 rounded border border-gray-800" multiple>

                @error('photos.*')
                    <div class="w-full block mt-6 rounded border-red-900 bg-red-400 text-red-900 p-2">
                        {{ $message }}
                    </div>
                @enderror
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
