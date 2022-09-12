@extends('layout.layout')

@section('content')

<h4>Customer Name: <b>{{Session::get('customer_name')}}</b></h4>

@if(Session::has('cart'))

<table class="table table -bordered">

    <tr>
        <td>Name</td>
        <td>Quantity</td>
    </tr>

    @foreach( $cart as $item)
    <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->quantity}}</td>
    </tr>
    @endforeach
    
</table>
<h5>Total Price: {{$total_price}} TK</h5> <a class="btn btn-success" href="{{route('purchase')}}">Purchase</a>
@else
Cart is Empty
@endif


@endsection