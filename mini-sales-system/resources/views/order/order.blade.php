@extends('layout.layout')

@section('content')
</br>
</br>
<h5>{{Session::get('msgg')}}</h5>

<div class="row">
    <div class="col-md-5">
        <a class="btn btn-primary" href="{{route('fromcustomer')}}"> Add Customer</a>
        <div class="card">
            <div class="card-header">
                <h4>Customer List</h4>
            </div>
            <table class="table card-body ">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $c)
                    <tr>
                        <td>{{$c->id}}</td>
                        <td>{{$c->name}}</td>
                        <td>{{$c->phone_number}}</td>
                        <td>{{$c->address}}</td>
                        <td><a class="btn btn-danger" href="/select/customer/{{ $c->id }}/{{ $c->name }}"> Select </a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
</br>
</br>
</br>


<div class="row">
    @foreach($products as $p)
    <div class="col-md-3 pl-5 pr-5 pb-5">
        <div class="card">
            <img src="images/{{$p->image}}" alt="product image" width="100" height="100">
            <h4>{{$p->name}}</h4>
            <h6> Available Quantity: {{$p->quantity}}</h6>
            <form method="POST" action="{{ route('addOrder') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="product_id" value="{{$p->id}}" />
                <input type="hidden" name="product_name" value="{{$p->name}}" />
                <input type="text" name="quantity" placeholder="Purchase Quantity" />
                @error('quantity')
                <span class="text-md text-red-600">{{ $message }}</span>
                @enderror
                @if(Session::get('p_id') == $p->id)
                <span class="text-md text-red-600">{{Session::get('msg')}}</span>
                @else
                @endif
            
                    

                <input type="submit" value="Add" />
            </form>
        </div>
    </div>

    @endforeach

</div>



</br>
</br>
</br>
</br>

@endsection