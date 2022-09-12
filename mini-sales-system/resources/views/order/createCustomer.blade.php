@extends('layout.layout')

@section('content')
</br>
</br>
</br>
</br>

    <<div class="row">
    <div class="col-md-4"></div>
    <div class="card col-md-4">
        <div class="card-body">

        <!-- @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif -->

        <div class="flex gap-4 flex-col items-center justify-center">
            <h1 class="text-3xl font-bold"> Add Customer</h1>
            <h2>{{ $temp ?? '' }}</h2>
            <form class="flex flex-col gap-3 text-lg" method="POST" action="{{ route('insertcustomer') }}" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div>
                    <div class="flex justify-end gap-2">
                        <label for="name">Name :</label>
                        <input placeholder="name" class="border-2 w-60" type="text" name="name">
                    </div>
                    @error('name')
                        <span class="text-md text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <div class="flex justify-end gap-4">
                        <label for="phone_number">Phone :</label>
                        <input placeholder="01" class="border-2 w-60" type="text" name="phone_number">
                    </div>
                    @error('phone_number')
                        <span class="text-md text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <div class="flex justify-end gap-2">
                        <label for="Quantity">Address :</label>
                        <input placeholder="text" class="border-2 w-60" type="text" name="address">
                    </div>
                    @error('address')
                        <span class="text-md text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <div class="flex justify-end gap-2">
                        <label for="userid">User Id :</label>
                        <input placeholder="numeric" class="border-2 w-60" type="text" name="user_id">
                    </div>
                    @error('user_id')
                        <span class="text-md text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-grid gap-2 col-6 mx-auto">
                    <input class="btn btn-success" class="border-2" type="submit" value="Add">
                </div>
            </form>
        </div>


        </div>
    </div>

</div>
 

</br>
</br>
</br>
</br>
@endsection



