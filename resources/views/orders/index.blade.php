@extends('layouts.global')
@section('title_page','Data Orders')
@section('content')

    @if (session('status'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form action="{{ route('orders.index') }}">
    <div class="form-group row">
        <div class="col-md-5">
            <input type="text" class="form-control" name="buyer_email" id="buyer_email" value="{{ Request::get('buyer_email') }}" placeholder="Search by buyer email">
        </div>
        <div class="col-md-2">
            <select name="status" id="status" class="form-control select2">
                <option value="">ANY</option>
                <option {{ Request::get('status') == "PENDING" ? "selected" : "" }} value="PENDING">PENDING</option>
                <option {{ Request::get('status') == "DELIVERED" ? "selected" : "" }} value="DELIVERED">DELIVERED</option>
            </select>
        </div>
        <div class="col-md-2 pt-1">
            <input type="submit" value="Filter" class="btn btn-primary">
        </div>
    </div>
    </form>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Invoice number</th>
                <th>Status</th>
                <th>Buyer</th>
                <th>Order date</th>
                <th>Total price</th>
                <th>Payslip</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr>
                    <td>{{ $order->invoice_number }}</td>
                    <td>
                        @if ($order->status == "PENDING")
                            <span class="badge badge-dark">{{ $order->status }}</span>
                        @elseif ($order->status == "DELIVERED")
                            <span class="badge badge-warning">{{ $order->status }}</span>
                        @endif
                    </td>
                    <td>{{ $order->user->name }}<br><small>{{ $order->user->email }}</small></td>
                    <td>{{ $order->updated_at }}</td>
                    <td>Rp. {{ number_format($order->total_price, 2, ',', '.') }}</td>
                    <td>
                        @if ($order->payslip)
                            <img src="{{ asset('storage/'. $order->payslip) }}" width="100px" alt="image" class="m-1">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('orders.edit', [$order->id]) }}">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No data found.</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7">
                    {{ $orders->appends(Request::all())->links() }}
                </td>
            </tr>
        </tfoot>
    </table>

@endsection
