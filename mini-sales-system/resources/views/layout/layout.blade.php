<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>


    <div>


        <a class="btn btn-success" href="{{route('index') }}">Home </a>
        <a class="btn btn-success" href="{{route('order') }}">Order</a>
        <a class="btn btn-info" href="{{route('cart')}}">Cart</a>

        <div class="float-right">
            <a class="btn btn-info" href=""> Profile </a>
            <a class="btn btn-danger" href="{{route('logout') }}"> logout </a>
        </div>


    </div>


    @yield('content')



    <div> Copy right &copy;Mortuja Morshed</div>

</body>