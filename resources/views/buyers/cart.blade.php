@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <a href="{{ url('/') }}" class="btn btn-primary">Back</a>
        </div>
        <div class="col-md-12">
            <br>
            <h3>Cart</h3>
            <table class="table table-striped">
                <thead>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @if (!empty($product_order))
                        @forelse ($product_order as $item)
                            <tr>
                                <td>{{ $item->products->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>Rp. {{ number_format($item->products->price, 2, ',', '.') }}</td>
                                <td>Rp. {{ number_format($item->total_price, 2, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('cart.delete', [$item->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">No</td>
                            </tr>
                        @endforelse
                    @endif
                    @if (!empty($order))
                        <tr>
                            <td colspan="3" align="left"><strong>Total Price :</strong></td>
                            <td>Rp. {{ number_format($order->total_price, 2, ',', '.') }}</td>
                            <td>
                                @if ($order->total_price > 0)
                                    <a href="{{ route('checkout') }}" class="btn btn-success">Checkout</a>
                                @endif
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="3" align="left"><strong>Total Price :</strong></td>
                            <td>Rp. {{ number_format(0, 2, ',', '.') }}</td>
                            <td colspan="1"></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection
