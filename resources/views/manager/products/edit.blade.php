@extends('layouts.app')

@section('title')
    Editar Produtos
@endsection

@section('body')
    <div class="w-full">

        <form action="{{ route('manager.products.update', ['product' => $product->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="w-full mb-6">
                <label for="" class="block">Produto</label>
                <input type="text" name="name" value="{{ $product->name }}"
                    class="w-full p-2 rounded border border-gray-800">

                @error('name')
                    <div class="w-full block mt-6 rounded border-red-900 bg-red-400 text-red-900 p-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="w-full mb-6">
                <label for="" class="block">Descrição</label>
                <input type="text" name="description" value="{{ $product->description }}"
                    class="w-full p-2 rounded border border-gray-800">

                @error('description')
                    <div class="w-full block mt-6 rounded border-red-900 bg-red-400 text-red-900 p-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="w-full mb-6">
                <label for="" class="block">Conteúdo</label>
                <textarea name="body" class="w-full p-2 rounded border border-gray-800" rows="5">{{ $product->body }}</textarea>

                @error('body')
                    <div class="w-full block mt-6 rounded border-red-900 bg-red-400 text-red-900 p-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="w-full flex items-center gap-x-6">
                <div class="w-[33%] mb-6">
                    <label for="" class="block">Preço</label>
                    <input type="text" name="price" value="{{ $product->price }}"
                        class="w-full p-2 rounded border border-gray-800">

                    @error('price')
                        <div class="w-full block mt-6 rounded border-red-900 bg-red-400 text-red-900 p-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="w-[33%] mb-6">
                    <label for="" class="block">Estoque</label>
                    <input type="text" name="in_stock" value="{{ $product->in_stock }}"
                        class="w-full p-2 rounded border border-gray-800">

                    @error('in_stock')
                        <div class="w-full block mt-6 rounded border-red-900 bg-red-400 text-red-900 p-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="w-[33%] mb-6">
                    <label for="" class="block">Status</label>
                    <select name="status" id="" class="w-full p-2 rounded border border-gray-800">
                        <option value="0" @selected($product->status == 0)>Inativo</option>
                        <option value="1" @selected($product->status == 1)>Ativo</option>
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
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                @checked($product->categories->contains($category))>
                            {{ $category->name }} (Cod. {{ $category->id }})
                        </div>
                    @endforeach
                </div>
            </div>

            <button
                class="px-4 py-2 rounded border border-green-900 bg-green-700
                           text-white hover:bg-green-900 transition duration-300 ease-in-out cursor-pointer">Atualizar</button>
        </form>

        <div class="w-full my-6 grid grid-cols-4 gap-4">
            @foreach ($product->photos as $photo)
                <div class="w-[280px] p-1 bg-white border border-gray-800 shadow relative group">
                    <img src="{{ asset('storage/' . $photo->photo) }}" alt="Foto do Produto: {{ $product->name }}">

                    <div class="absolute top-0 right-0 group-hover:block hidden">

                        <form
                            action="{{ route('manager.products.photo.destroy', ['product' => $product->id, 'photo' => $photo->id]) }}"
                            method="post">

                            @csrf
                            @method('DELETE')

                            <button
                                class="px-4 py-2 rounded border border-red-900 bg-red-700
                        text-white hover:bg-red-900 transition duration-300 ease-in-out cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>

                            </button>

                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
