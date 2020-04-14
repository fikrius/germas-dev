@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endsection

@section('content')
    <div class=”container”>
        <div class="row">
            <div class="col-md-10 offset-1">
                @if(\Session::has('error'))
                    <div class="alert alert-danger">
                        {{\Session::get('error')}}
                    </div>
                @endif

                {{-- Modal --}}
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#btn-tambah-pemilih" data-whatever="@getbootstrap">Tambah Data Pemilih</button>

                <div class="modal fade" id="btn-tambah-pemilih" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pemilih</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <label for="no_kk" class="col-form-label">No KK :</label>
                            <input type="text" class="form-control" id="no_kk" name="no_kk" required>
                          </div>
                          <div class="form-group">
                            <label for="nik" class="col-form-label">NIK :</label>
                            <input type="text" class="form-control" id="nik" name="nik" required>
                          </div>
                          <div class="form-group">
                            <label for="nama" class="col-form-label">Nama :</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                          </div>
                          <div class="form-group">
                            <label for="tempat_lahir" class="col-form-label">Tempat Lahir :</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                          </div>
                          <div class="form-group">
                            <label for="tanggal_lahir" class="col-form-label">Tanggal Lahir :</label>
                            <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                          </div>
                          <div class="form-group">
                            <label for="status_perkawinan" class="col-form-label">Status Perkawinan :</label>
                            <input type="text" class="form-control" id="status_perkawinan" name="status_perkawinan" required>
                          </div>
                          <div class="form-group">
                            <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin :</label>
                            <textarea class="form-control" id="jenis_kelamin" name="jenis_kelamin" required></textarea>
                          </div>
                          <div class="form-group">
                            <label for="dukuh" class="col-form-label">Dukuh :</label>
                            <input type="text" class="form-control" id="dukuh" name="dukuh" required>
                          </div>
                          <div class="form-group">
                            <label for="rt" class="col-form-label">RT :</label>
                            <input type="text" class="form-control" id="rt" name="rt" required>
                          </div>
                          <div class="form-group">
                            <label for="rw" class="col-form-label">RW :</label>
                            <input type="text" class="form-control" id="rw" name="rw" required>
                          </div>
                          <div class="form-group">
                            <label for="disabilitas" class="col-form-label">Disabilitas :</label>
                            <input type="text" class="form-control" id="disabilitas" name="disabilitas" required>
                          </div>
                          <div class="form-group">
                            <label for="keterangan" class="col-form-label">Keterangan :</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                          </div>
                          <div class="form-group">
                            <label for="status" class="col-form-label">Status (0/1/2/3) :</label>
                            <input type="number" class="form-control" id="status" name="status" required>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                        <button id="btn-tambah" type="button" class="btn btn-primary">Tambah</button>
                      </div>
                    </div>
                  </div>
                </div>
                <table class="table table-hover display" id="table-pemilih">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No KK</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Status Perkawinan</th>
                            <th>Jenis Kelamin</th>
                            <th>Dukuh</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>Disabilitas</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->no_kk }}</td>
                                <td>{{ $d->nik }}</td>
                                <td>{{ $d->nama }}</td>
                                <td>{{ $d->tempat_lahir }}</td>
                                <td>{{ $d->tanggal_lahir }}</td>
                                <td>{{ $d->status_perkawinan }}</td>
                                <td>{{ $d->jenis_kelamin }}</td>
                                <td>{{ $d->dukuh }}</td>
                                <td>{{ $d->rt }}</td>
                                <td>{{ $d->rw }}</td>
                                <td>{{ $d->disabilitas }}</td>
                                <td>{{ $d->keterangan }}</td>
                                <td>{{ $d->status }}</td>
                                <td>
                                    <button class="btn btn-success btn-sm">Ubah</button><button class="btn btn-danger btn-sm">Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
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
            $('#table-pemilih').DataTable({
                // processing: true,
                // serverSide: true,
                // ajax: 'pemilih/json',
                // columns: [
                //     {data: 'id'}
                // ]
            });

        });
    </script>

@endsection