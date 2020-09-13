@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <a href="{{ url('/') }}" class="btn btn-primary">Back</a>
        </div>
        <div class="col-md-12">
            <br>
            <h3>Checkout</h3>
            <table class="table table-invoice">
                <thead>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Price</th>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($product_order as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->products->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>Rp. {{ number_format($item->products->price, 2, ',', '.') }}</td>
                            <td>Rp. {{ number_format($item->total_price, 2, ',', '.') }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" align="left"><strong>Total Price :</strong></td>
                        <td>Rp. {{ number_format($order->total_price, 2, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
            <form action="{{ route('confirm') }}" method="POST">
                @csrf

                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label text-md-right"><b>Address</b></label>

                    <div class="col-md-6">
                        <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" required autofocus>{{ old('address') }}</textarea>

                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button class="btn btn-primary" onclick="return confirm('Are you sure?');">Order</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
