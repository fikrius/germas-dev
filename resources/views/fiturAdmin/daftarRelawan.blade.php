@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endsection

@section('content')
    <div class=”container”>
        @if(\Session::has('error'))
            <div class="alert alert-danger">
                {{\Session::get('error')}}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header mb-3">{{ __('Dasbor') }}</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-hover display mt-3" id="tabel-relawan">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Is Admin</th>
                                                <th>Dibuat Pada</th>
                                                <th>Beri Pesan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $r)
                                                <tr>
                                                    <td>{{$r->id}}</td>
                                                    <td>{{$r->name}}</td>
                                                    <td>{{$r->email}}</td>
                                                    <td>{{$r->roles}}</td>
                                                    <td>{{ date('l, F Y | h:i:sa', strtotime($r->created_at)) }}</td>
                                                    @if ($r->roles == 1)
                                                        <td>
                                                            <a href="{{ url('daftarrelawanfjvixcplkrbprsci/pesan/'.$r->id) }}" class="btn btn-sm btn-danger disabled">Buat Pesan</a>
                                                        </td>
                                                    @else 
                                                        <td>
                                                            <a href="{{ url('daftarrelawanfjvixcplkrbprsci/pesan/'.$r->id) }}" class="btn btn-sm btn-success">Buat Pesan</a>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
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

@section('javascripts')
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#tabel-relawan').DataTable({
                "columns": [
                null,
                { "width": "400px" },
                { "width": "400px" },
                null,
                { "width": "1000px" }
              ]
            });

        });
    </script>

@endsection