<x-layouts.site>

    <div class="w-full h-[480px] flex justify-center items-center">
        <div class="w-[390px] bg-black rounded shadow-lg p-6">

            @error('email')
                <div class="my-10 p-5 rounded border-green-900 bg-red-400 text-red-900 font-bold">{{ $message }}</div>
            @enderror

            <form action="{{ route('login.store') }}" method="POST">
                @csrf

                <div class="mb-6 block">
                    <label for="email" class="text-white">E-mail</label>
                    <input type="email" name="email" id="email"
                        class="w-full p-2 rounded border border-gray-900 text-white">
                </div>

                <div class="mb-6 block">
                    <label for="password" class="text-white">Senha</label>
                    <input type="password" name="password" id="password"
                        class="w-full p-2 rounded border border-gray-900 text-white">
                </div>

                <div class="mb-6 block">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember" class="text-white">Lembrar de mim?</label>
                </div>
                <div class="flex justify-end">
                    <button
                        class="px-6 py-2 rounded cursor-pointer border border-purple-900
                        text-white bg-purple-700 hover:bg-purple-900 transition ease-in-out duration-300">Acessar</button>
                </div>
            </form>
        </div>
    </div>

</x-layouts.site>
