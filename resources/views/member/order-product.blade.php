@extends('layout.main')
@section('title', 'Success!')

@section('content')

<form action="{{ route('post-product') }}" method="post">
  @csrf
  <input name="date" type="hidden" value="{{ $product->created_at }}">
  <input name="email" type="hidden" value="{{ auth()->user()->email }}">
  <input name="type" type="hidden" value="{{ $type }}">
  <div class="col-md-4">
    <h1>Success!</h1>
      <div class="form-group">
        <label for="order_no" class="form-label">Order no.</label>
          <input type="text" class="form-control" id="order_no" name="order_no" value="{{ $order }}" readonly>
        </div>
      <div class="form-group">
        <label for="total" class="form-label">Total</label>
          <input type="text" class="form-control" id="total" name="total" value="Rp {{ number_format($total,0,',','.') }}" readonly>
        </div>

    <br><h6>{{ $product->product }} that cost Rp {{ number_format($product->price,0,',','.') }} will be shipped to : </h6><br>
    <h6>{{ $product->shipping_address }}</h6><br>
    <h6>only after you pay</h6><br>

    <div class="input-group">			
      <input type="submit" class="btn btn-primary" value="Pay now">
    </div>
  
  </div>
</form>

@endsection