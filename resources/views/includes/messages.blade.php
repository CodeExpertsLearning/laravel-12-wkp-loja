@if (session('success'))
    <div class="my-10 p-5 rounded border-green-900 bg-green-400 text-green-900 font-bold">{{ session('success') }}</div>
@endif

@if (session('error'))
    <div class="my-10 p-5 rounded border-green-900 bg-red-400 text-red-900 font-bold">{{ session('error') }}</div>
@endif

@if (session('warning'))
    <div class="my-10 p-5 rounded border-green-900 bg-yellow-400 text-yellow-900 font-bold">{{ session('warning') }}
    </div>
@endif
