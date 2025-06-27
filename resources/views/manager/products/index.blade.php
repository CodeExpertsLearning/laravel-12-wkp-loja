@extends('layouts.app')

@section('title')
    Listagem Produtos
@endsection

@section('body')
    <div class="w-full mb-6 flex justify-end py-2">
        <a href="{{ route('manager.products.create') }}"
            class="px-4 py-2 rounded border border-purple-900 bg-purple-700
                           text-white hover:bg-purple-900 transition duration-300 ease-in-out cursor-pointer">Cadastrar
            Produto</a>
    </div>
    <div>
        <table class="w-full mb-6">
            <thead>
                <tr class="border-b border-gray-600">
                    <th class="px-6 py-4 text-left">#</th>
                    <th class="px-6 py-4 text-left">Produto</th>
                    <th class="px-6 py-4 text-left">Cadastro em</th>
                    <th class="px-6 py-4 text-left">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr class="border-b border-gray-400">
                        <td class="px-6 py-4 text-left">{{ $product->id }}</td>
                        <td class="px-6 py-4 text-left w-[60%]">{{ $product->name }}</td>
                        <td class="px-6 py-4 text-left">{{ $product->created_at->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 text-left flex gap-x-2">
                            <a href="{{ route('manager.products.edit', ['product' => $product->id]) }}"
                                class="px-4 py-2 rounded border border-blue-900 bg-blue-700
                            text-white hover:bg-blue-900 transition duration-300 ease-in-out cursor-pointer">Editar</a>

                            <form action="{{ route('manager.products.destroy', ['product' => $product->id]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="px-4 py-2 rounded border border-red-900 bg-red-700
                            text-white hover:bg-red-900 transition duration-300 ease-in-out cursor-pointer">Apagar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Nenhum produto encontrado...</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
@endsection
