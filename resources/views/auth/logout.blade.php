<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class ="p-5">
        <h1 class = "text-center">Logout</h1>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <div>
            <h4>Are you sure want to logout?</h4>
        </div>
        <button type="submit">Logout</button>
    </form>
    </div>
</body>
</html>
