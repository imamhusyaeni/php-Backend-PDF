@extends('layout.main')
@section('title', 'Order History')

@section('content')

<br>
<h1>Order History</h1>
<br>
<form action="{{ route('order-history') }}" method="get">
  <div class="form-group">
    <div class="input-group">
      <input type="text" class="form-control" name="search" placeholder="Search by Order no.">
    </div>
  </div>
</form>
<br>

<table class="table">
  @foreach ($orders as $order)
  {{-- <p>{{ $order->user->email }}</p> --}}
  <tr>
    <th scope="col">{{ $order->order_no }}</th>
    <th scope="col">{{ $order->total }}</th>
    <th scope="col">
      @if ($order->type == "top-up")
        @if ($order->status != "success")
          <form action="{{ route('paynow') }}" method="post" style="display: inline">
            @csrf
            <input name="order_no" type="hidden" value="{{ $order->order_no }}">
            <button type="submit" class="btn btn-primary">Pay now</button>
          </form>
        @else
          <button type="button" class="btn btn-success">Success</button>
        @endif
    </th>
  </tr>
  <tr>
    <td colspan="3"><p>{{ number_format($order->prepaid->value,0,',','.') }} &emsp; for &emsp; {{ $order->prepaid->mobile_number }}</p></td>
  </tr>	
    @else
      @if ($order->status != "success")
        <form action="{{ route('paynow') }}" method="post" style="display: inline">
          @csrf
          <input name="order_no" type="hidden" value="{{ $order->order_no }}">
          <button type="submit" class="btn btn-primary">Pay now</button>
        </form>
      @else
        <p>Shipping Code</p><br>
        <p>{{ $order->shipping_code }}</p>
      @endif
  </th>
  </tr>
  <tr>
    <td colspan="3"><p>{{ $order->product->product }} &emsp; that &emsp; costs &emsp; Rp {{ number_format($order->product->price,0,',','.') }}</p></td>
  </tr>	
  @endif 
  @endforeach
</table>

{{ $orders->links() }}

@endsection