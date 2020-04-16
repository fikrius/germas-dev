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
                    <div class="card-header"><b>Pengaturan Aplikasi</b></div>
                    <div class="row mt-3">
                        <div class="col-md-10 offset-1 mb-3">
                            <form method="POST" action="{{ url('pengaturan/create') }}" enctype="multipart/form-data">
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
                                    <input type="text" value="" name="nama_aplikasi" class="form-control" id="nama_aplikasi" placeholder="Nama Aplikasi">
                                </div>
                                <div class="form-group">
                                    <label for="foto_beranda_1">Foto Beranda 1</label>
                                    <div class="col-md-12 mb-3">
                                        <img id="preview_foto_beranda_1" src="{{ asset('data_file/image-preview.png') }}" alt="preview image" style="max-height: 150px;">
                                    </div>
                                    <input type="file" value="" name="foto_beranda_1" class="form-control-file" id="foto_beranda_1">
                                </div>
                                <div class="form-group">
                                    <label for="foto_beranda_2">Foto Beranda 2</label>
                                    <div class="col-md-12 mb-3">
                                        <img id="preview_foto_beranda_2" src="{{ asset('data_file/image-preview.png') }}" alt="preview image" style="max-height: 150px;">
                                    </div>
                                    <input type="file" value="" name="foto_beranda_2" class="form-control-file" id="foto_beranda_2">
                                </div>
                                <div class="form-group">
                                    <label for="foto_beranda_3">Foto Beranda 3</label>
                                    <div class="col-md-12 mb-3">
                                        <img id="preview_foto_beranda_3" src="{{ asset('data_file/image-preview.png') }}" alt="preview image" style="max-height: 150px;">
                                    </div>
                                    <input type="file" value="" name="foto_beranda_3" class="form-control-file" id="foto_beranda_3">
                                </div>
                                <div class="form-group">
                                    <label for="caption_foto_beranda_1">Caption Foto Beranda 1</label>
                                    <input type="text" value="" name="caption_foto_beranda_1" class="form-control" id="caption_foto_beranda_1">
                                </div>
                                <div class="form-group">
                                    <label for="caption_foto_beranda_2">Caption Foto Beranda 2</label>
                                    <input type="text" value="" name="caption_foto_beranda_2" class="form-control" id="caption_foto_beranda_2">
                                </div>
                                <div class="form-group">
                                    <label for="caption_foto_beranda_3">Caption Foto Beranda 3</label>
                                    <input type="text" value="" name="caption_foto_beranda_3" class="form-control" id="caption_foto_beranda_3">
                                </div>
                                <div class="form-group">
                                    <label for="visi">Visi</label>
                                    <input type="text" value="" name="visi" class="form-control" id="visi">
                                </div>
                                <div class="form-group">
                                    <label for="misi">Misi</label>
                                    <textarea class="form-control" name="misi" id="misi"></textarea>
                                    {{-- <input type="text" value="" name="misi" class="form-control" id="misi"> --}}
                                </div>
                                <div class="form-group">
                                    <label for="foto_profil">Foto Profil</label>
                                    <div class="col-md-12 mb-3">
                                        <img id="preview_foto_profil" src="{{ asset('data_file/image-preview.png') }}" alt="preview image" style="max-height: 150px;">
                                    </div>
                                    <input type="file" value="" name="foto_profil" class="form-control-file" id="foto_profil">
                                </div>
                                <div class="form-group">
                                    <label for="data_pribadi">Data Pribadi</label>
                                    <textarea name="data_pribadi" id="data_pribadi" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="data_keluarga">Data Keluarga</label>
                                    <textarea name="data_keluarga" id="data_keluarga" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="data_riwayat_pendidikan">Data Riwayat Pendidikan</label>
                                    <textarea name="data_riwayat_pendidikan" id="data_riwayat_pendidikan" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="data_riwayat_pekerjaan">Data Riwayat Pekerjaan</label>
                                    <textarea name="data_riwayat_pekerjaan" id="data_riwayat_pekerjaan" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="data_riwayat_pengabdian_masyarakat">Data Riwayat Pengabdian Masyarakat</label>
                                    <textarea name="data_riwayat_pengabdian_masyarakat" id="data_riwayat_pengabdian_masyarakat" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="foto_tengah">Foto Tengah</label>
                                    <div class="col-md-12 mb-3">
                                        <img id="preview_foto_tengah" src="{{ asset('data_file/image-preview.png') }}" alt="preview image" style="max-height: 150px;">
                                    </div>
                                    <input type="file" value="" name="foto_tengah" class="form-control-file" id="foto_tengah">
                                </div>
                                <div class="form-group">
                                    <label for="caption_foto_tengah">Caption Foto Tengah</label>
                                    <input type="text" value="" name="caption_foto_tengah" class="form-control" id="caption_foto_tengah">
                                </div>
                                <div class="form-group">
                                    <label for="caption_lain">Caption Lain</label>
                                    <input type="text" value="" name="caption_lain" class="form-control" id="caption_lain">
                                </div>
                                <div class="form-group">
                                    <label for="telepon">Telepon</label>
                                    <input type="text" value="" name="telepon" class="form-control" id="telepon">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" value="" name="email" class="form-control" id="email">
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
                            <form method="POST" action="{{ url('pengaturan/createGaleri') }}" enctype="multipart/form-data">
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
                                    <label for="galeri">Upload Foto</label>
                                    <div class="col-md-12 mb-3">
                                        <img id="preview_galeri" src="{{ asset('data_file/image-preview.png') }}" alt="preview image" style="max-height: 150px;">
                                    </div>
                                    <input type="file" value="" name="galeri" class="form-control-file" id="galeri">
                                </div>
                                <input type="submit" class="btn btn-lg btn-success" value="Simpan">
                            </form>         
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
