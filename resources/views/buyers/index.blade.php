@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mb-6">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
            </div>
            @foreach ($products as $product)
                <div class="col-3 m-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">
                                <strong>Harga: </strong>Rp. {{ number_format($product->price, 2, ',', '.') }} <br>
                                <hr>
                                <strong>Description: </strong> <br> {{ $product->desc }}
                            </p>
                            <a href="{{ route('buyers.detail', [$product->id]) }}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
