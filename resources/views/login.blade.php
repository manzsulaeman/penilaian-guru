<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Login User - Laravel 11</title>
</head>
<body>
    <div class="container">
        <h2>Login User</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nip">NIP</label>
                <input type="text" name="nip" id="nip" placeholder="Enter NIP" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter Password" required>
            </div>
            <button type="submit">Login</button>
            <div class="footer-link">
                <p>Forgot your password? <a href="{{ route('password.request') }}">Reset here</a></p>
            </div>
        </form>
    </div>
</body>
</html>
