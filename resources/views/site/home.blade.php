<x-layouts.site>
    <div class="w-full mt-20">

        <div class="border-b border-purple-500 mb-10 pb-4 flex justify-between items-center">
            <h1 class="text-4xl font-bold text-white">Produtos</h1>
        </div>
        <div class="max-w-7xl grid grid-cols-3 gap-14">
            @foreach ($products as $product)
                <div
                    class="w-96 min-h-[460px] relative bg-white border border-purple-500 rounded mb-10 shadow shadow-purple-500">
                    <img src="{{ $product->thumb ? asset('storage/' . $product->thumb) : asset('storage/no-photo.jpg') }}"
                        alt="Foto Produto: {{ $product->name }}" class="w-full h-52 rounded-t">

                    <div class="p-4">
                        <h4 class="text-xl font-bold capitalize">{{ $product->name }}</h4>

                        <p class="text-xl font-thin py-2">{{ $product->description }}</p>

                        <h2 class="text-3xl mt-4 mb-10 font-bold text-red-800">R$
                            {{ number_format($product->price, 2, ',', '.') }}</h2>

                        <a href="{{ route('site.single', ['product' => $product->slug]) }}"
                            class="absolute bottom-2 px-8 py-4 mt-5 bg-gradient-to-b from-purple-500 to-purple-800
                                    font-bold text-white transition-all duration-300 ease-in-out rounded
                                    hover:to-purple-800 hover:from-purple-900">
                            Ver produto
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layouts.site>
