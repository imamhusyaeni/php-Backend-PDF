@extends('layout.main')
@section('title', 'Prepaid Balance')

@section('content')

<form action="{{ route('prepaid') }}" method="post">
  @csrf
  <input name="type" type="hidden" value="top-up">
  <div class="col-md-4 col-md-offset-4">
    <h1>Prepaid Balance</h1><br>
    <div class="input-group">
      <input type="text" class="form-control {{ $errors->has('mobile_number') ? 'is-invalid' : '' }}" placeholder="Mobile Number" name="mobile_number">
      @if ($errors->has('mobile_number'))
          <div class="invalid-feedback">
            {{ $errors->first('mobile_number') }}
          </div>
      @endif
    </div>
    <div class="input-group">
      <select class="form-select {{ $errors->has('value') ? 'is-invalid' : '' }}" name="value">
        <option value="10000">10.000</option>
        <option value="50000">50.000</option>
        <option value="100000">100.000</option>
      </select>
      @if ($errors->has('value'))
          <div class="invalid-feedback">
            {{ $errors->first('value') }}
          </div>
      @endif
    </div><br>
    <div class="input-group">			
      <input type="submit" class="btn btn-primary" value="Submit">
    </div>
  </div>
</form>

@endsection