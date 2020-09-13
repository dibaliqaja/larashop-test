@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <a href="{{ url('/ordered') }}" class="btn btn-primary">Back</a>
        </div>
        <div class="col-md-12">
            <br>
            @if ($message = Session::get('status'))
                <div class="alert alert-warning alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <h3>Checkout</h3>
            <p align="right">Order date : {{ $order->created_at }}</p>
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
            @if ($order->status == "PENDING")
                Order Status : <span class="badge badge-dark">{{ $order->status }}</span>
                <br>
                <form action="{{ route('upload', $order->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="address"><b>Address</b></label>
                        <textarea style="width: 500px" name="address" id="address" class="form-control @error('address') is-invalid @enderror" required>{{ old('address', $order->address) }}</textarea>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for=""><b>Payslip</b></label>
                        <input type="file" class="form-control-file" name="payslip">
                        <span class="text-small font-italic">Upload payslip for order confirmation</span>
                        <div class="invalid-feddback text-danger">
                            {{ $errors->first('payslip') }}
                        </div>
                        @if ($order->payslip)
                            <img src="{{ asset('storage/'. $order->payslip) }}" width="100px" alt="image" class="m-2">
                        @else
                            No Image
                        @endif
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            @elseif ($order->status == "DELIVERED")
                Order Status : <span class="badge badge-warning">{{ $order->status }}</span><br>
                <img class="mt-2" alt="payslip" src="{{ asset('assets/img/avatar/avatar-1.png') }}" width="150px">
            @endif
        </div>
    </div>

@endsection
