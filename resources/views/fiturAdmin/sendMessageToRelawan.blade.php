@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endsection

@section('content')
    <div class=”container”>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <b>Obrolan | {{ $user->name }}</b>
                        <a class="btn btn-warning btn-sm" style="float: right" href="{{ url('/daftarrelawanfjvixcplkrbprsci') }}">Daftar Relawan</a>
                    </div>
                        <div class="row mt-4 mb-4">
                            <div class="col-md-8 offset-1 mb-4" style="overflow-y: scroll; height: 20rem;" id="scroll-body">
                                
                                @if ($data_pesan->count() == 0)
                                    <div class="row">
                                        <div class="col-md-12 mt-2">
                                            <h6 id="status-chat" class="text-center">Tidak ada pesan</h6>
                                        </div>
                                    </div>
                                @else
                                    {{-- <div class="row mt-2 mb-2" id="left-col">
                                        <div style="float: left;">
                                            <div class="card" style="width: 18rem;">
                                            <div class="card-body" style="background-color: lightgrey"">
                                                <h5 class="card-title">haasdfas</h5>
                                                <hr>
                                                <p class="card-text"></p>
                                            </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                    @foreach ($data_pesan as $d)
                                        <div class="row mb-2" id="right-col">
                                            <div class="col-md-4 offset-6">
                                                <div class="card" style="width: 18rem;">
                                                    <div class="card-body">
                                                    <h5 class="card-title">{{ $d->pesan }}</h5>
                                                    <hr>
                                                    <p class="card-text">{{ date('l, d F Y', strtotime($d->created_at)) }}</p>
                                                    <p class="card-text">{{ date('h:i:sa', strtotime($d->created_at)) }}</p>
                                                </div>
                                                </div>
                                            </div>       
                                        </div>
                                    @endforeach

                                @endif
                            </div>
                        
                            <div class="col-md-8 offset-1">
                                <form method="post" action="{{ url('daftarrelawanfjvixcplkrbprsci/sendMessage') }}">
                                    {{ csrf_field() }}
                                    <input type="text" value="{{ $user->id }}" name="user_id" hidden>
                                    {{-- <input type="text" value="{{ auth()->user()->roles }}" name="role_pengirim" hidden> --}}
                                    <div class="input-group control-group">
                                        <input type="text" name="pesan" class="form-control">
                                        <div class="input-group-btn"> 
                                            <button class="btn btn-success" id="sendMessage">Kirim Pesan</button>
                                        </div>
                                    </div>
                                </form>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>

                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
            var messageBody = document.querySelector('#scroll-body');
            messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
        

        });
    </script>
@endsection
