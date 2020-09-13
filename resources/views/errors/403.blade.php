@extends('layouts.app')

@section('content')

<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="page-error">
                <div class="page-inner">
                    <h1>403</h1>
                    <div class="page-description">
                        {{ $exception->getMessage() }}
                    </div>
                    <div class="page-search">
                        <div class="mt-3">
                            Back to <a href="{{ url('/login') }}">Login</a> or
                            <a href="{{ url('/register') }}">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
