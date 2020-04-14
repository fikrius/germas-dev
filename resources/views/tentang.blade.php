@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tentang GERMAS') }}</div>

                <div class="card-body">
                    <img src="{{ asset('logo.jpeg') }}" class="img-fluid rounded mx-auto d-block" style="width: 400px;width: 400px;" alt="Responsive image">
                    Aplikasi relawan Gerakan Muhammad Agus Salim (GERMAS). 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
