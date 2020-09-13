@extends('layouts.global')
@section('title_page', 'Edit Order')

@section('content')

    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form action="{{ route('orders.update', [$order->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="invoice_number">Invoice number</label>
            <input type="text" class="form-control" value="{{ $order->invoice_number }}" disabled>
        </div>
        <div class="form-group">
            <label for="buyer">Buyer</label>
            <input type="text" class="form-control" value="{{ $order->user->name }}" disabled>
        </div>
        <div class="form-group">
            <label for="total_price">Total Price</label>
            <input type="text" class="form-control" value="Rp. {{ number_format($order->total_price, 2, ',', '.') }}" disabled>
        </div>
        <div class="form-group">
            <label for="created_at">Order date</label>
            <input type="text" class="form-control" value="{{ $order->updated_at }}" disabled>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" id="address" class="form-control" disabled>{{ $order->address }}</textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option {{ $order->status == "PENDING" ? "selected" : "" }} value="PENDING">PENDING</option>
                <option {{ $order->status == "DELIVERED" ? "selected" : "" }} value="DELIVERED">DELIVERED</option>
            </select>
        </div>
        <div class="form-group">
            <label for="payslip">Payslip</label><br>
            @if ($order->payslip)
                <img src="{{ asset('storage/'. $order->payslip) }}" width="300px" alt="image" class="m-2">
            @else
                No Image
            @endif
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Update Order">
            <a href="{{ route('orders.index') }}" class="btn btn-danger">Back</a>
        </div>
    </form>

@endsection

