<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mini Sales System </title>
    <link rel="stylesheet" href="../css/app.css">
</head>

<body>
    <nav class="bg-blue-900 text-white py-6">
        <ul class="flex px-6 gap-10 text-xl font-bold">
            <li> <a class="hover:text-blue-300" href="{{ route('login') }}">Sign In</a> </li>
            <li> <a class="hover:text-blue-300" href="{{route('signup')}}">Sign Up</a> </li>
        </ul>
    </nav>
    @yield('content')
</body>

</html>