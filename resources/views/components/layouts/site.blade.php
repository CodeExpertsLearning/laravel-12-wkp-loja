<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Experts Store</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-fixed bg-gradient-to-b from-10% to-80% from-purple-800 to-black">
    <header class="w-full mb-10">
        <div class="max-w-7xl mx-auto flex justify-between items-center py-4">
            <a href="{{ route('site.home') }}" class="font-extrabold text-white text-xl">Experts Store</a>

            <nav class="mr-4">
                <ul class="flex items-center gap-x-4">
                    <li><a href="{{ route('site.home') }}"
                            class="text-white  hover:underline hover:font-bold transition duration-300 ease-in-out @if (request()->routeIs('site.home')) font-bold @else font-thin @endif">Home</a>
                    </li>

                    <li><a href="{{ route('site.customers.my-orders') }}"
                            class="text-white  hover:underline hover:font-bold transition duration-300 ease-in-out @if (request()->routeIs('site.home')) font-bold @else font-thin @endif">Meus
                            Pedidos</a>
                    </li>

                    <li class="relative">
                        <a href="{{ route('site.cart.index') }}"
                            class="flex gap-x-2 items-center text-white  hover:underline hover:font-bold transition duration-300 ease-in-out @if (request()->routeIs('site.home')) font-bold @else font-thin @endif">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                            @if (session()->has('cart') && count(session('cart')))
                                <span class="rounded-xl p-1 text-white bg-red-700">
                                    {{ count(session('cart')) }}
                                </span>
                            @endif
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="max-w-7xl mx-auto">
        @include('includes.messages')

        {{ $slot }}
    </div>
    <footer class="w-full mt-10">
        <div class="max-w-7xl mx-auto py-4 text-center border-t border-purple-500">
            <small class="text-white ">Experts Store &copy; Todos os Direitos Reservados</small>
        </div>
    </footer>
    @stack('scripts')
</body>

</html>
