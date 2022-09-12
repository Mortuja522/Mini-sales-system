@extends('layout.layout')

@section('content')
</br>
</br>
</br>
</br>

    <<div class="row">
    <div class="col-md-5"></div>
    <div class="card col-md-5">
        <div class="card-body">

        <div class="flex gap-3 flex-col items-center justify-center">
            <h1 class="text-3xl font-bold">Edit&updated Product</h1>
            <h2>{{ $temp ?? '' }}</h2>
            <form class="flex flex-col gap-4 text-lg" method="POST" action="{{ url ('/update/product/'.$products->id)}}" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div>
                    <div class="flex justify-end gap-2">
                        <label for="name">Name :</label>
                        <input placeholder="name" value="{{$products->name}}" class="border-2 w-60" type="text" name="name">
                    </div>
                    @error('name')
                        <span class="text-md text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <div class="flex justify-end gap-4">
                        <label for="description">Description :</label>
                        <input placeholder="description" value="{{$products->description}}" class="border-2 w-60" type="text" name="description">
                    </div>
                    @error('description')
                        <span class="text-md text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <div class="flex justify-end gap-2">
                        <label for="Quantity">Quantity :</label>
                        <input placeholder="numeric" value="{{$products->quantity}}" class="border-2 w-60" type="text" name="quantity">
                    </div>
                    @error('quantity')
                        <span class="text-md text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <div class="flex justify-end gap-2">
                        <label for="Purchase Price">Purchase Price :</label>
                        <input placeholder="numeric" value="{{$products->purchase_price}}" class="border-2 w-60" type="text" name="purchase_price">
                    </div>
                    @error('purchase_price')
                        <span class="text-md text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <div class="flex justify-end gap-2">
                        <label for="Sales Price">Sales Price :</label>
                        <input placeholder="numeric" value="{{$products->sales_price}}" class="border-2 w-60" type="text" name="sales_price">
                    </div>
                    @error('sales_price')
                        <span class="text-md text-red-600">{{ $message }}</span>
                    @enderror
</div>

                <div>
                    <div class="flex justify-end gap-2">
                        <label for="image">Image :</label>
                        <input type="file" value="" class="border-2 w-60" id="customFile" name="image" />
                         <img src="{{asset('images'. $products->image)}}" width="70px" height="70px" alt="Img">
                    </div>
                    @error('image')
                        <span class="text-md text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <div class="flex justify-end gap-2">
                        <label for="userid">User Id :</label>
                        <input placeholder="numeric" value="{{$products->user_id}}" class="border-2 w-60" type="text" name="user_id">
                    </div>
                    @error('user_id')
                        <span class="text-md text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-grid gap-2 col-6 mx-auto">
                    <input class="btn btn-success" class="border-2" type="submit" value="Updated">
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



