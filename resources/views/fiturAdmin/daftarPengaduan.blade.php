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
                    <div class="card-header">{{ __('Daftar Pengaduan') }}</div>
                    <?php if(auth()->user()->isAdmin == 1){?>
                        <div class="panel-body">
                            {{-- <a href="{{url('admin/routes')}}">Pemilih</a> --}}
                            {{-- <a href="{{url('Pemilih')}}">Pemilih</a>
                            <a href="{{url('Relawan')}}">Relawan</a>
                            <a href="{{url('Pengaturan')}}">Pengaturan</a> --}}
                        </div>
                    <?php } else echo '';?>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <table class="table table-hover display mt-3" id="tabel-daftar-pengaduan" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Isi Pengaduan</th>
                                        <th>Dibuat Pada</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $d)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $d->isi_pengaduan }}</td>
                                            <td>{{ $d->created_at }}</td>
                                            <td>
                                                <button id="btn-hapus" class="btn btn-danger btn-sm" onclick="hapusPengaduan({{$d->id}})">Hapus</button>
                                            </td>
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
@endsection

@section('javascripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
            var table = $('#tabel-daftar-pengaduan').DataTable({
                "columns": [
                    null,
                    { "width": "600px" },
                    { "width": "200px" },
                    { "width": "200px" }
                ]
            });

        });

        //hapus pengaduan;
        function hapusPengaduan(id_pengaduan){
            //get id pengaduan
            $id = $("#btn-hapus").val();
            $.ajax({
                method: 'get',
                url: 'daftarpengaduan12345/' + id_pengaduan,
                success: function(data){
                    alert(data.success);
                    location.reload();

                },error: function(data){
                    alert(data.gagal);
                }

            });
        }

    </script>
@endsection
