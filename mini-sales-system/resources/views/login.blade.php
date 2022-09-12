@extends('layout.public')

@section('content')

</br>
</br>
</br>
<div class="row">
    <div class="col-md-4"></div>
    <div class="card col-md-4">
        <div class="card-body">

        <div class="flex gap-4 flex-col items-center justify-center">
            <h1 class="text-3xl font-bold">Sign In</h1>
            <h2>{{ $temp ?? '' }}</h2>
            <form class="flex flex-col gap-3 text-lg" method="POST" action="{{ route('signinfrom') }}" enctype="multipart/form-data">
            @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif

                @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
            
            {{ csrf_field() }}
                <div>
                    <div class="flex justify-end gap-2">
                        <label for="email">Email :</label>
                        <input class="border-2 w-60" type="email"  value="{{old('email')}}"  name="email">
                    </div>
                    @error('email')
                        <span class="text-md text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <div class="flex justify-end gap-2">
                        <label for="password">Password :</label>
                        <input class="border-2 w-60" type="password" name="password">
                    </div>
                    @error('password')
                        <span class="text-md text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-center">
                    <input class="border-2" class="btn btn-success" type="submit" value="Sign In">
                </div>
            </form>
        </div>


        </div>
    </div>

</div>
    
@endsection