@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pengaduan (Kritik & Saran)') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('pengaduan') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea class="form-control" name="pengaduan" style="height: 250px;" required></textarea>
                            </div>
                        </div>

                        @if($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                  <strong>{{ $message }}</strong>
                              </div>
                        @endif

                        @if($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                  <strong>{{ $message }}</strong>
                              </div>
                        @endif

                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                <button class="btn btn-primary btn-lg">
                                    {{ __('Kirim') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
