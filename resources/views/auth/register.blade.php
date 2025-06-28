<x-layouts.site>

    <div class="w-full min-h-[480px] flex justify-center items-center">
        <div class="w-[390px] bg-black rounded shadow p-2">
            <form action="{{ route('register.store') }}" method="POST" novalidate>
                @csrf

                <div class="mb-6 block">
                    <label for="name" class="text-white">Nome Completo</label>
                    <input type="text" name="name" id="name"
                        class="w-full p-2 rounded border border-gray-900 text-white" value="{{ old('name') }}">

                    @error('name')
                        <div class="w-full block mt-6 rounded border-red-900 bg-red-400 text-red-900 p-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-6 block">
                    <label for="email" class="text-white">E-mail</label>
                    <input type="email" name="email" id="email"
                        class="w-full p-2 rounded border border-gray-900 text-white" value="{{ old('email') }}">

                    @error('email')
                        <div class="w-full block mt-6 rounded border-red-900 bg-red-400 text-red-900 p-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-6 block">
                    <label for="password" class="text-white">Senha</label>
                    <input type="password" name="password" id="password"
                        class="w-full p-2 rounded border border-gray-900 text-white">

                    @error('password')
                        <div class="w-full block mt-6 rounded border-red-900 bg-red-400 text-red-900 p-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-6 block">
                    <label for="password_confirmation" class="text-white">Confirmar Senha</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="w-full p-2 rounded border border-gray-900 text-white">
                </div>

                <button
                    class="px-4 py-2 rounded border border-purple-900
                        text-white bg-purple-700 hover:bg-purple-900 transition ease-in-out duration-300">Cadastrar</button>
            </form>
        </div>
    </div>

</x-layouts.site>
