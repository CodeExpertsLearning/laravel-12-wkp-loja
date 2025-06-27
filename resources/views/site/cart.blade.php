<x-layouts.site>

    <div class="w-full">
        <div class="border-b border-gray-300 pb-4 flex justify-between items-center">
            <h1 class="text-4xl font-thin text-white">
                <a href="{{ route('site.home') }}"
                    class="text-xl hover:underline hover:text-black transition duration-300 ease-in-out">Home</a> <span
                    class="text-xl">&raquo;</span> Carrinho
            </h1>
        </div>

        <div class="w-full">
            @cartcount($cartItems)
                @php $totalCart = 0; @endphp
                @foreach ($cartItems as $item)
                    <div class="w-full py-8 border-b border-gray-300 flex justify-around items-center gap-x-5">
                        <div class="w-[10%]">
                            <img src="{{ $item['photo'] ? asset('storage/' . $item['photo']) : asset('storage/no-photo.jpg') }}"
                                alt="Foto Produto: {{ $item['name'] }}" class="w-full rounded-t">
                        </div>
                        <div class="w-2/3 flex flex-col">
                            <div class="text-left">
                                <h4 class="font-bold capitalize  text-white">{{ $item['name'] }} - R$
                                    {{ number_format($item['price'], 2, ',', '.') }} ({{ $item['quantity'] }}x)</h4>
                                @php $subtotal = $item['price'] * $item['quantity']; @endphp
                                <h2 class="text-xl font-thin  text-white">Subtotal: R$
                                    {{ number_format($subtotal, 2, ',', '.') }}</h2>
                            </div>
                        </div>
                        <div>
                            <form action="{{ route('site.cart.remove', ['item' => $item['slug']]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-white cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:text-red-800">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>

                                </button>
                            </form>
                        </div>
                    </div>
                    @php $totalCart += $subtotal; @endphp
                @endforeach

                <div class="w-full py-8 border-b border-gray-300 flex justify-start text-white">
                    <h2 class="w-[20%] text-2xl font-extrabold">Total:</h2>
                    <strong class="w-2/3 text-left text-2xl font-extrabold">R$
                        {{ number_format($totalCart, 2, ',', '.') }}</strong>
                </div>

                <div class="w-full py-8 mt-10 flex justify-around gap-5 text-white">
                    <a href="{{ route('site.cart.cancel') }}"
                        class="px-5 py-2 rounded text-white text-2xl font-bold bg-red-600">Cancelar</a>
                    <a href="" class="px-5 py-2 rounded text-white text-2xl font-bold bg-green-600">Continuar</a>
                </div>
            @else
                <h3 class="w-full text-center text-white text-4xl font-thin py-4">Nenhum item no seu carrinho de compras!
                </h3>
            @endcartcount
        </div>
    </div>
</x-layouts.site>
