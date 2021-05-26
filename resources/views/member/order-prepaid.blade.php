@extends('layout.main')
@section('title', 'Success!')

@section('content')

<br>
<form action="{{ route('post-prepaid') }}" method="post">
  @csrf
  <input name="date" type="hidden" value="{{ $prepaid->created_at }}">
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
    
    <br><h6>Your mobile phone number {{ $prepaid->mobile_number }} will receive Rp {{ number_format($prepaid->value,0,',','.') }}</h6><br>

    <div class="input-group">			
      <input type="submit" class="btn btn-primary" value="Pay now">
    </div>

  </div>
</form>

@endsection