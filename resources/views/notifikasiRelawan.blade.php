@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endsection

@section('content')
    <div class=”container”>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><b>Obrolan | Admin</b></div>
                        <div class="row mt-4 mb-4">
                            <div class="col-md-8 offset-1 mb-4" style="overflow-y: scroll; height: 20rem;" id="scroll-body">
                                
                                @if ($notifikasi->count() == 0)
                                    <div class="row">
                                        <div class="col-md-12 mt-2">
                                            <h6 id="status-chat" class="text-center">Tidak ada pesan</h6>
                                        </div>
                                    </div>
                                @else
                                    @foreach ($notifikasi as $n)
                                        @if ($n->user_id == 5)
                                            {{-- Kiri --}}
                                            @foreach ($notifikasi as $n)
                                                <div class="row mb-2" id="right-col">
                                                    <div class="col-md-4 offset-6">
                                                        <div class="card" style="width: 18rem;">
                                                            <div class="card-body">
                                                                <h5 class="card-title">{{ $n->pesan }}</h5>
                                                                <hr>
                                                                <p class="card-text">{{ date('l, d F Y', strtotime($n->created_at)) }}</p>
                                                                <p class="card-text">{{ date('h:i:sa', strtotime($n->created_at)) }}</p>
                                                            </div>
                                                        </div>
                                                    </div>       
                                                </div>
                                            @endforeach
                                        @endif
                                    @endforeach
                                
                                    {{-- Kanan --}}
                                    @foreach ($notifikasi as $n)
                                        <div class="row mb-2" id="right-col">
                                            <div class="col-md-4">
                                                <div class="card" style="width: 18rem;">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $n->pesan }}</h5>
                                                        <hr>
                                                        <p class="card-text">{{ date('l, d F Y', strtotime($n->created_at)) }}</p>
                                                        <p class="card-text">{{ date('h:i:sa', strtotime($n->created_at)) }}</p>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                    @endforeach

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
