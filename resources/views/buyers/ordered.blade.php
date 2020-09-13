@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <a href="{{ url('/') }}" class="btn btn-primary">Back</a>
        </div>
        <div class="col-md-12">
            <br>
            <h3>Order History</h3>
            <table class="table table-invoice">
                <thead>
                    <th>No</th>
                    <th>Invoice Number</th>
                    <th>Date Order</th>
                    <th>Status</th>
                    <th>Total Price</th>
                    <th>Payslip</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($order as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->invoice_number }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                @if ($item->status == "PENDING")
                                    <span class="badge badge-dark">{{ $item->status }}</span>
                                @elseif ($item->status == "DELIVERED")
                                    <span class="badge badge-warning">{{ $item->status }}</span>
                                @endif
                            </td>
                            <td>Rp. {{ number_format($item->total_price, 2, ',', '.') }}</td>
                            <td>
                                @if ($item->payslip)
                                    <img src="{{ asset('storage/'. $item->payslip) }}" width="100px" alt="image" class="m-1">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('ordered.detail', [$item->id]) }}" class="btn btn-primary">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
