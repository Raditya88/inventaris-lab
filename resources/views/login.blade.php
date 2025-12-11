<h2>Login Admin</h2>

@if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif

<form action="/login" method="POST">
    @csrf
    <input type="text" name="username" placeholder="Username"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <button type="submit">Login</button>
</form>
