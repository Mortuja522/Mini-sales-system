@extends('layout.layout')

@section('content')
</br>
</br>
</br>
</br>



<a class="btn btn-primary" href="{{route('createFrom')}}">Create Product</a>
<a class="btn btn-danger float-right" href="{{route('printlist')}}">Download Report </a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Product Name</th>
      <th scope="col">Quantity sold</th>
      <th scope="col">Current Stock</th>
      <th scope="col">Purchase Price</th>
      <th scope="col">Sales Price</th>
      <th scope="col">Total Stock Sales Price</th>
      <th scope="col">Add Quantity</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    @foreach($products as $p)
    <tr>
      <td>{{$p->id}}</td>
      <td><img src="images/{{$p->image}}" alt="product image" width="50" height="50">&nbsp;{{$p->name}}</td>
      <td>{{$p->quantity_sold}}</td>
      <td>{{$p->quantity}}</td>
      <td>{{$p->purchase_price}}</td>
      <td>{{$p->sales_price}}</td>
      <td>{{$p->total_sell_stock_pr}}</td>
      <td>
        <form method="POST" action="{{ url ('/add/quantity/'. $p->id)}}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="product_id" value="{{$p->id}}" name="product_id" />
          <input type="text" placeholder="numeric" name="quantity" />
          @error('quantity')
          <span class="text-md text-red-600">{{ $message }}</span>
          @enderror
          <input type="submit" value="Add" />
        </form>
      </td>
      <td><a class="btn btn-primary" href="/edit/product/{{ $p->id }}">Edit </a>&nbsp;<a class="btn btn-danger"
          href="/delete/product/{{ $p->id }}"> Delete </a></td>
    </tr>
    @endforeach
  </tbody>
</table>


</br>

@endsection