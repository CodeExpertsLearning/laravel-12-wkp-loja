<x-layouts.site>
    <div class="w-full mt-20">

        @php $photos = $product->photos; @endphp

        <div class="max-w-7xl @if ($photos->count()) flex gap-x-4 @endif">
            @if ($photos->count())
                <div class="w-[40%] p-2">
                    <img src="{{ asset('storage/' . $photos->first()->photo) }}" alt="Foto Produto: {{ $product->name }}"
                        class="w-full p-1 rounded bg-purple-500 shadow shadow-black rounded-t" id="mainPhoto">

                    <div class="w-full mt-4 flex gap-x-2">
                        @foreach ($photos as $photo)
                            <img src="{{ asset('storage/' . $photo->photo) }}" alt="Foto Produto: {{ $product->name }}"
                                class="w-[25%] p-1 rounded bg-purple-500 shadow shadow-black rounded-t photoList">
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="@if ($photos->count()) w-[60%] @else w-full @endif pl-12">
                <h1 class="text-4xl font-bold text-white mb-4">Produto: {{ $product->name }}</h1>
                <p class="text-white">{{ $product->description }}</p>
                <h2 class="text-3xl mt-4 mb-10 font-bold text-white">R$
                    {{ number_format($product->price, 2, ',', '.') }}</h2>

                <form action="{{ route('site.cart.add') }}" method="post">
                    @csrf

                    <div class="flex items-center gap-x-2">
                        <label class="text-white">Quantidade</label>
                        <input type="hidden" name="cart[product]" value="{{ $product->slug }}">
                        <input type="number" min="1" name="cart[quantity]" required
                            class="w-[80px] p-4 rounded border-purple-900 text-white bg-black text-2xl" value="1">
                        @error('cart.product')
                            <span class="text-xl font-bold text-white bg-red-800 rounded p-1">{{ $message }}</span>
                        @enderror
                        @error('cart.quantity')
                            <span class="text-xl font-bold text-white bg-red-800 rounded p-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <button
                        class="px-8 py-4 mt-5 bg-gradient-to-b from-purple-500 to-purple-800
                            font-bold text-white transition-all duration-300 ease-in-out rounded
                            hover:to-purple-800 hover:from-purple-900">
                        COMPRAR
                    </button>
                </form>
            </div>

        </div>
        <div class="w-full mt-10 py-10 border-t border-purple-500">
            <p class="text-white text-xl">{{ $product->body }}</p>
        </div>
    </div>

    @push('scripts')
        <script>
            const mainPhoto = document.querySelector('img#mainPhoto')
            const listPhotos = document.querySelectorAll('img.photoList')

            listPhotos.forEach(photoEl => {
                photoEl.addEventListener('mouseover', e => {
                    mainPhoto.src = e.target.src;
                })
            })
        </script>
    @endpush
</x-layouts.site>
