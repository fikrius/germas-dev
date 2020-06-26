@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endsection

@section('content')
    <div class=”container”>
        {{-- @if(\Session::has('error'))
            <div class="alert alert-danger">
                {{\Session::get('error')}}
            </div>
        @endif --}}
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><b>Pengaturan Aplikasi</b></div>
                    <div class="row mt-3">
                        <div class="col-md-10 offset-1 mb-3">
                            <form id="form-pengaturan" method="POST" action="{{ url('pengaturan/create') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div id="scroll">
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>	
                                                <strong>{{ $message }}</strong>
                                        </div>
                                    @endif      
                                    @if ($message = Session::get('error'))
                                        <div class="alert alert-error alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>	
                                                <strong>{{ $message }}</strong>
                                        </div>
                                    @endif   
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
                                <div class="form-group">
                                    <label for="nama_aplikasi">Nama Aplikasi</label>
                                    <input type="text" value="{{ $data->nama_aplikasi }}" name="nama_aplikasi" class="form-control" id="nama_aplikasi" placeholder="Nama Aplikasi">
                                </div>
                                <div class="form-group">
                                    <label for="foto_beranda_1">Foto Beranda 1</label>
                                    @if ($data->foto_beranda_1 == null)
                                        <div class="col-md-12 mb-3">
                                            <img id="preview_foto_beranda_1" src="{{ asset('data_file/image-preview.png') }}" alt="preview image" style="max-height: 150px;">
                                        </div>
                                    @else 
                                        <div class="col-md-12 mb-3">
                                            <img id="preview_foto_beranda_1" src="{{ asset('data_file/'.$data->foto_beranda_1) }}" alt="preview image" style="max-height: 150px;">
                                        </div>
                                    @endif
                                    <input type="file" name="foto_beranda_1" class="form-control-file" id="foto_beranda_1">
                                </div>
                                <div class="form-group">
                                    <label for="foto_beranda_2">Foto Beranda 2</label>
                                    @if ($data->foto_beranda_2 == null)
                                        <div class="col-md-12 mb-3">
                                            <img id="preview_foto_beranda_2" src="{{ asset('data_file/image-preview.png') }}" alt="preview image" style="max-height: 150px;">
                                        </div>
                                    @else 
                                        <div class="col-md-12 mb-3">
                                            <img id="preview_foto_beranda_2" src="{{ asset('data_file/'.$data->foto_beranda_2) }}" alt="preview image" style="max-height: 150px;">
                                        </div>
                                    @endif
                                    <input type="file" value="" name="foto_beranda_2" class="form-control-file" id="foto_beranda_2">
                                </div>
                                <div class="form-group">
                                    <label for="foto_beranda_3">Foto Beranda 3</label>
                                    @if ($data->foto_beranda_1 == null)
                                        <div class="col-md-12 mb-3">
                                            <img id="preview_foto_beranda_3" src="{{ asset('data_file/image-preview.png') }}" alt="preview image" style="max-height: 150px;">
                                        </div>
                                    @else 
                                        <div class="col-md-12 mb-3">
                                            <img id="preview_foto_beranda_3" src="{{ asset('data_file/'.$data->foto_beranda_3) }}" alt="preview image" style="max-height: 150px;">
                                        </div>
                                    @endif
                                    <input type="file" value="" name="foto_beranda_3" class="form-control-file" id="foto_beranda_3">
                                </div>
                                <div class="form-group">
                                    <label for="caption_foto_beranda_1">Caption Foto Beranda 1</label>
                                    <input type="text" value="{{ $data->caption_foto_beranda_1 }}" name="caption_foto_beranda_1" class="form-control" id="caption_foto_beranda_1">
                                </div>
                                <div class="form-group">
                                    <label for="caption_foto_beranda_2">Caption Foto Beranda 2</label>
                                    <input type="text" value="{{ $data->caption_foto_beranda_2 }}" name="caption_foto_beranda_2" class="form-control" id="caption_foto_beranda_2">
                                </div>
                                <div class="form-group">
                                    <label for="caption_foto_beranda_3">Caption Foto Beranda 3</label>
                                    <input type="text" value="{{ $data->caption_foto_beranda_3 }}" name="caption_foto_beranda_3" class="form-control" id="caption_foto_beranda_3">
                                </div>
                                <div class="form-group">
                                    <label for="visi">Visi</label>
                                    <input type="text" value="{{ $data->visi }}" name="visi" class="form-control" id="visi">
                                </div>
                                <div class="form-group">
                                    <label for="misi">Misi</label>
                                    <textarea class="form-control" name="misi" id="misi">{{ $data->misi }}</textarea>
                                    {{-- <input type="text" value="" name="misi" class="form-control" id="misi"> --}}
                                </div>
                                <div class="form-group">
                                    <label for="foto_profil">Foto Profil</label>
                                    @if ($data->foto_profil == null)
                                        <div class="col-md-12 mb-3">
                                            <img id="preview_foto_profil" src="{{ asset('data_file/image-preview.png') }}" alt="preview image" style="max-height: 150px;">
                                        </div>
                                    @else 
                                        <div class="col-md-12 mb-3">
                                            <img id="preview_foto_profil" src="{{ asset('data_file/'.$data->foto_profil) }}" alt="preview image" style="max-height: 150px;">
                                        </div>
                                    @endif
                                    <input type="file" value="" name="foto_profil" class="form-control-file" id="foto_profil">
                                </div>
                                <div class="form-group">
                                    <label for="data_pribadi">Data Pribadi</label>
                                    <textarea name="data_pribadi" id="data_pribadi" class="form-control">{{ $data->data_pribadi }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="data_keluarga">Data Keluarga</label>
                                    <textarea name="data_keluarga" id="data_keluarga" class="form-control">{{ $data->data_keluarga }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="data_riwayat_pendidikan">Data Riwayat Pendidikan</label>
                                    <textarea name="data_riwayat_pendidikan" id="data_riwayat_pendidikan" class="form-control">{{ $data->data_riwayat_pendidikan }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="data_riwayat_pekerjaan">Data Riwayat Pekerjaan</label>
                                    <textarea name="data_riwayat_pekerjaan" id="data_riwayat_pekerjaan" class="form-control">{{ $data->data_riwayat_pekerjaan }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="data_riwayat_pengabdian_masyarakat">Data Riwayat Pengabdian Masyarakat</label>
                                    <textarea name="data_riwayat_pengabdian_masyarakat" id="data_riwayat_pengabdian_masyarakat" class="form-control">{{ $data->data_riwayat_pengabdian_masyarakat }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="foto_tengah">Foto Tengah</label>
                                    @if ($data->foto_tengah == null)
                                        <div class="col-md-12 mb-3">
                                            <img id="preview_foto_tengah" src="{{ asset('data_file/image-preview.png') }}" alt="preview image" style="max-height: 150px;">
                                        </div>
                                    @else 
                                        <div class="col-md-12 mb-3">
                                            <img id="preview_foto_tengah" src="{{ asset('data_file/'.$data->foto_tengah) }}" alt="preview image" style="max-height: 150px;">
                                        </div>
                                    @endif
                                    <input type="file" value="" name="foto_tengah" class="form-control-file" id="foto_tengah">
                                </div>
                                <div class="form-group">
                                    <label for="caption_foto_tengah">Caption Foto Tengah</label>
                                    <input type="text" value="{{ $data->caption_foto_tengah }}" name="caption_foto_tengah" class="form-control" id="caption_foto_tengah">
                                </div>
                                <div class="form-group">
                                    <label for="caption_lain">Caption Lain</label>
                                    <input type="text" value="{{ $data->caption_lain }}" name="caption_lain" class="form-control" id="caption_lain">
                                </div>
                                <div class="form-group">
                                    <label for="telepon">Telepon</label>
                                    <input type="text" value="{{ $data->telepon }}" name="telepon" class="form-control" id="telepon">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" value="{{ $data->email }}" name="email" class="form-control" id="email">
                                </div>
                                <input type="submit" class="btn btn-lg btn-success" value="Simpan">
                            </form>         
                        </div>
                    </div>
                </div>
                
                <div class="card mt-3">
                    <div class="card-header"><b>Galeri</b></div>
                    <div class="row mt-3">
                        <div class="col-md-10 offset-1 mb-3">
                            <form method="post" action="{{ url('pengaturan/createGaleri') }}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                @if ($message = Session::get('sukses'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>	
                                            <strong>{{ $message }}</strong>
                                    </div>
                                @endif      
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif  
                                <div class="input-group control-group" id="tambah">
                                    <input type="file" name="filenames[]" class="form-control">
                                    <div class="input-group-btn"> 
                                        <button class="btn btn-success" id="tombol-tambah" type="button"><i></i>Tambah</button>
                                    </div>
                                </div>
                                <div class="clone">
                                    <div class="input-group control-group hapus-section" id="hapus">
                                        <input type="file" name="filenames[]" class="form-control">
                                        <div class="input-group-btn"> 
                                            <button class="btn btn-danger" type="button"><i></i>Hapus</button>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success" style="margin-top:10px">Submit</button>
                            </form>      
                            {{-- table foto galeri --}}
                            @if ($message = Session::get('sukses_hapus'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button> 
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            <table class="table table-hover mt-4">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto Galeri</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($galeri as $g)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img style="max-height: 150px;" class="img-fluid img-thumbnail" src="{{ asset('/data_file/galeri/'.$g->filename) }}" alt="foto galeri">
                                            </td>
                                            <td>
                                                <a onclick="confirm('Apakah yakin ingin menghapus foto?')" class="btn btn-danger btn-sm" href="{{ url('/pengaturan/delete/'.$g->id) }}">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a style="float: right" data-toggle="modal" data-target="#deleteall" href="{{ url('/pengaturan/deleteall') }}" class="btn btn-danger btn-sm">Hapus Semua</a>

                            <div class="modal fade" id="deleteall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Semua Foto Galeri</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form-delete">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="password-confirmation" class="col-form-label">Masukkan Password :</label>
                                                <input name="password-confirmation" type="password" class="form-control" id="password-confirmation">
                                            </div>
                                            <div id="notif" style="color: red"></div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                                <button type="submit" class="btn btn-primary" id="send">Kirim</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>
                            
                            {{ $galeri->links() }}
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
        $(document).ready(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Password confirmation -> Delete all photo galeri
            $('#form-delete').submit(function(e){
                var password = $("#password-confirmation").val();
                $('#notif').html("");
                console.log(password);

                e.preventDefault();
                console.log(1);
                $.ajax({
                    type: 'POST',
                    url: 'pengaturan/deleteall',
                    data: {password:password},
                    success: function(data){
                        console.log(2);
                        if(data.msg == "Password Salah"){
                            $('#notif').html(data.msg);
                            return false;
                        }else{
                            console.log(data.msg);
                            $('#notif').html(data.msg);
                            setTimeout(function(){
                                location.reload();
                            }, 3000);
                        }
                    }
                });
            });

            //Menampilkan input file di galeri
            var hapus = $(".clone").html();
            $("#tombol-tambah").click(function(){ 
                $("#tambah").after(hapus);
            });
            $("body").on("click",".btn-danger",function(){ 
                $(this).parents("#hapus").remove();
            });

            //Menampilkan preview foto
            $('#foto_beranda_1').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => { 
                    $('#preview_foto_beranda_1').attr('src', e.target.result); 
                }
                reader.readAsDataURL(this.files[0]); 
            });    

            $('#foto_beranda_2').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => { 
                    $('#preview_foto_beranda_2').attr('src', e.target.result); 
                }
                reader.readAsDataURL(this.files[0]); 
            });

            $('#foto_beranda_3').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => { 
                    $('#preview_foto_beranda_3').attr('src', e.target.result); 
                }
                reader.readAsDataURL(this.files[0]); 
            });    

            $('#foto_profil').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => { 
                    $('#preview_foto_profil').attr('src', e.target.result); 
                }
                reader.readAsDataURL(this.files[0]); 
            });   

            $('#foto_tengah').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => { 
                    $('#preview_foto_tengah').attr('src', e.target.result); 
                }
                reader.readAsDataURL(this.files[0]); 
            });   

        });

    </script>
@endsection
