@extends('layout.main')
@section('title', 'Pay your order')

@section('content')

<br>
<form action="{{ route('post-order') }}" method="post">
  @csrf
  <div class="col-md-4">
    <h1>Pay your order</h1>
      <div class="form-group">
        <label for="order_no" class="form-label">Order no.</label>
          <input type="text" class="form-control" id="order_no" name="order_no" value="{{ $order }}" readonly>
        </div>
    <button type="submit" class="btn btn-primary">Pay now</button>
  </div>
</form>

@endsection