@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($message = Session::get('warning'))
            <div class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <a href="{{ url('/') }}" class="btn btn-primary">Back</a>
            </div>
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>{{ $product->name }}</h3>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Price</td>
                                            <td>:</td>
                                            <td>Rp. {{ number_format($product->price, 2, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Description</td>
                                            <td>:</td>
                                            <td>{{ $product->desc }}</td>
                                        </tr>
                                            <tr>
                                                <td>Jumlah Pesan</td>
                                                <td>:</td>
                                                <td>
                                                    <form action="{{ route('addto.cart', [$product->id]) }}" method="post">
                                                        @csrf
                                                        <input style="width: 100px;" type="number" name="jumlah_pesan" class="form-control" id="jumlah_pesan" min="1" required><br>
                                                        <button type="submit" class="btn btn-primary">Add to Chart</button>
                                                    </form>
                                                </td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
