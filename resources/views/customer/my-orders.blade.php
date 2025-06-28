<x-layouts.site>
    <div class="max-w-7xl mx-auto">
        <div class="w-full mb-8 text-white py-4 border-b border-purple-500">
            Olá, {{ request()->user()->name }}
        </div>

        <div class="w-full mb-8 text-white py-4">
            <h2 class="text-2xl font-extrabold block mb-8 text-white">Meus Pedidos</h2>

            @forelse($orders as $order)
                <div class="w-full rounded bg-white shadow p-4 my-8">
                    <h2 class="text-xl font-bold text-purple-900 mb-4 block">
                        Pedido: {{ $order->code }}
                    </h2>

                    <p>
                        <strong><span class="text-purple-900">Status</span>: <span
                                class="text-{{ $order->status->color() }}-800">{{ $order->status->status() }}</span></strong>
                    </p>

                    <p class="font-thin p-2 text-xl text-purple-900">
                        Produtos: <br>
                    <ul class="p-8">
                        @foreach ($order->items as $item)
                            <li class="text-purple-900 list-decimal">{{ $item->product->name }} -
                                {{ number_format($item->product->price, 2, ',', '.') }} ({{ $item->quantity }})x</li>
                        @endforeach
                    </ul>
                    </p>

                    <p class="font-thin p-2 text-xl text-purple-900">
                        Total Pedido: R$ {{ number_format($order->totalOrder(), 2, ',', '.') }}
                    </p>

                    @if ($order->status->name !== 'CUSTOMER_CANCELLED')
                        <p class="flex justify-start items-start">
                        <form action="{{ route('site.customers.my-orders.cancel', $order) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <button
                                class="px-4 py-2 rounded border border-red-900 bg-red-500 text-white">CANCELAR</button>
                        </form>
                        </p>
                    @endif
                </div>
            @empty
            @endforelse
        </div>

    </div>
</x-layouts.site>
