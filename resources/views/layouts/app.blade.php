<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header class="w-full bg-black mb-20 flex justify-between">

        <a href="#" class="px-6 py-4 font-bold text-white">
            {{ config('app.name') }}
        </a>

        <nav>
            <ul class="flex justify-around">
                <li class="py-4">
                    <a href="{{ route('manager.products.index') }}"
                        class="text-white px-6 py-4 @if (request()->routeIs('manager.products*')) bg-purple-800 @endif hover:bg-purple-800 transition ease-in-out duration-300">Produtos</a>
                </li>
                <li class="py-4">
                    <a href="{{ route('manager.categories.index') }}"
                        class="text-white px-6 py-4 @if (request()->routeIs('manager.categories*')) bg-purple-800 @endif hover:bg-purple-800 transition ease-in-out duration-300">Categorias</a>
                </li>

                <li class="py-4">
                    <form action="{{ route('logout') }}" method="POST" id="logout">
                        @csrf
                    </form>
                    <a href="#" onclick="document.querySelector('form#logout').submit()"
                        class="text-white px-6 py-4 hover:bg-red-800 transition ease-in-out duration-300">Sair</a>
                </li>
            </ul>
        </nav>

    </header>
    <!-- bootstrap -->
    <!-- button.btn.btn-primary.btn-lg -->

    <!-- tailwindcss-->
    <!-- button.px-2.py-2.rounded.border.border-green-900.bg-green-500.hover:bg-green-900.transition.duration-300.ease-in-out -->
    <div class="max-w-7xl mx-auto">
        @yield('body')
    </div>
</body>

</html>
