@extends('layout.main')
@section('title', 'Product Page')

@section('content')

<form action="{{ route('product') }}" method="post">
  @csrf
  <input name="type" type="hidden" value="product">
  <div class="col-md-4 col-md-offset-4">
    <h1>Product Page</h1>
    <div class="form-floating">
      <textarea class="form-control {{ $errors->has('product') ? 'is-invalid' : '' }}" placeholder="Leave a comment here" id="floatingTextarea" name="product"></textarea>
      <label for="floatingTextarea">Product</label>
      @if ($errors->has('product'))
          <div class="invalid-feedback">
            {{ $errors->first('product') }}
          </div>
      @endif
    </div>
    <div class="form-floating">
      <textarea class="form-control {{ $errors->has('shipping_address') ? 'is-invalid' : '' }}" placeholder="Leave a comment here" id="floatingTextarea" name="shipping_address"></textarea>
      <label for="floatingTextarea">Shipping Address</label>
      @if ($errors->has('shipping_address'))
          <div class="invalid-feedback">
            {{ $errors->first('shipping_address') }}
          </div>
      @endif
    </div>
    <div class="input-group">
      <input type="text" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" placeholder="Price" name="price">
      @if ($errors->has('price'))
          <div class="invalid-feedback">
            {{ $errors->first('price') }}
          </div>
      @endif
    </div>

    <div class="input-group">			
      <input type="submit" class="btn btn-primary" value="Submit">
    </div>
  </div>
</form>

@endsection