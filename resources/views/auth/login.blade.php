<form action="{{ route('login.store') }}" method="POST">
    @csrf

    <div>
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email">
    </div>

    <div>
        <label for="password">Senha</label>
        <input type="password" name="password" id="password">
    </div>

    <div>
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Lembrar de mim?</label>
    </div>
    <button>Acessar</button>
</form>
