<x-layouts.site>
    <div class="border-b border-gray-300 pb-4 flex justify-between items-center">
        <h1 class="text-4xl font-thin text-white">
            <a href="{{ route('site.home') }}"
                class="text-xl hover:underline hover:text-black transition duration-300 ease-in-out">Home</a> <span
                class="text-xl">&raquo;</span> Checkout
        </h1>
    </div>
    <div class="w-full h-[480px] flex justify-center items-center">
        <div class="w-[380px] rounded p-4">
            <form action="{{ route('site.checkout.process') }}" method="POST">
                @csrf
                <div class="w-full mb-6">
                    <label for="card_number" class="text-white mb-2">Número Cartão</label>
                    <input type="text" name="card_number" id="card_number" placeholder="Número Cartão..." required
                        class="w-full p-2 rounded border border-gray-900 bg-white">
                </div>

                <div class="w-full mb-6 flex gap-x-2">
                    <div class="w-1/2">
                        <label for="card_date" class="text-white mb-2">Validade Cartão</label>
                        <input type="text" name="card_date" id="card_date" placeholder="Validade Cartão..." required
                            class="w-full p-2 rounded border border-gray-900 bg-white">
                    </div>

                    <div class="w-1/2">
                        <label for="card_cvv" class="text-white mb-2">CVV Cartão</label>
                        <input type="text" name="card_cvv" id="card_cvv" placeholder="CVV Cartão..." required
                            class="w-full p-2 rounded border border-gray-900 bg-white">
                    </div>
                </div>

                <button class="px-5 py-2 rounded text-white text-5xl font-bold bg-green-600">
                    PAGAR
                </button>
            </form>
        </div>
    </div>
</x-layouts.site>
