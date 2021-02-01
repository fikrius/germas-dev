@extends('layouts.app')

@section('styles')
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.3.3/css/autoFill.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/colreorder/1.5.0/css/colReorder.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.2.5/css/fixedColumns.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.4/css/fixedHeader.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/keytable/2.5.0/css/keyTable.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.2/css/responsive.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowgroup/1.1.0/css/rowGroup.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.4/css/rowReorder.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.0.0/css/scroller.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css"/>

@endsection


@section('content')
    <div class=”container”>
        @if(\Session::has('error'))
            <div class="alert alert-danger">
                {{\Session::get('error')}}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="height: auto">
                    <div class="card-header mb-4">{{ __('Dasbor : Cari nama di "Search"') }}</div>
                    <?php if(auth()->user()->isAdmin == 1){?>
                        <div class="panel-body">
                            {{-- <a href="{{url('admin/routes')}}">Pemilih</a> --}}
                            {{-- <a href="{{url('Pemilih')}}">Pemilih</a>
                            <a href="{{url('Relawan')}}">Relawan</a>
                            <a href="{{url('Pengaturan')}}">Pengaturan</a> --}}
                        </div>
                    <?php };?>

                    {{-- button download pdf --}}
                    
                    <div class="container">
                        <div class="row mb-3">
                            <div id="download" class="col-md-3">
                                <h5 style="color: red;">Cetak Dokumen</h5>
                            </div>
                            <div class="col-md-4 offset-5">
                                @if (auth()->user()->roles == 1)
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#btn-tambah-data">Tambah Data</button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#btn-reset-database">Reset Database</button>
                                @endif

                                {{-- Modal reset database (jadi 0) --}}
                                <div class="modal fade" id="btn-reset-database" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi reset database jadi 0 semua</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="form-reset">
                                                    {{-- {{ csrf_field() }} --}}
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
                                {{-- End modal reset database --}}

                                {{-- Modal tambah data --}}
                                <div class="modal fade" id="btn-tambah-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <form id="form-tambah-data" method="post">
                                            @csrf
                                          <div class="form-group">
                                            <label for="id_pemilih" class="col-form-label">Id Pemilih:</label>
                                            <input type="text" class="form-control" id="id_pemilih" name="id_pemilih" required>
                                          </div>
                                          <div class="form-group">
                                            <label for="nama" class="col-form-label">Nama:</label>
                                            <input type="text" class="form-control" id="nama" name="nama" required>
                                          </div>
                                          <div class="form-group">
                                            <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin:</label>
                                            <select name="jenis_kelamin" class="custom-select" id="jenis_kelamin">
                                                <option selected>Pilih Status -</option>
                                                <option value="1">Perempuan</option>
                                                <option value="2">Laki-laki</option>
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <label for="status" class="col-form-label">Status:</label>
                                            <select name="status" class="custom-select" id="status">
                                                <option selected>Pilih Status -</option>
                                                <option value="1">Pasti Memilih</option>
                                                <option value="2">Ragu Memilih</option>
                                                <option value="3">Tidak Memilih</option>
                                            </select>
                                          </div>
                                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                          <div class="notif">
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn_keluar">Keluar</button>
                                            <input type="submit" class="btn btn-primary" id="btn_submit_data" value="Tambah">
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <table id="table-pemilih" class="table table-hover display " style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id Pemilih</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th id="aksi">Aksi</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                    </table>

                    <!-- Modal Mention relawan yang akan memprospek pemilih-->
                    <div class="modal fade" id="formMentionRelawan" tabindex="-1" role="dialog" aria-labelledby="formMentionRelawan" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="formMentionRelawan">Beri Keterangan Untuk Diprospek : </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            {{-- <table id="table-daftar-relawan" class="table table-hover"cellspacing="0">
                                <thead width="100%">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Relawan</th>
                                        <th>Pilih</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $d)
                                        <tr>
                                            <td> {{ $loop->iteration }} </td>
                                            <td>{{ $d->name }}</td>
                                            <td>
                                                <input type="checkbox" aria-label="Checkbox for following text input">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> --}}
                            <form>
                                @csrf
                                <div class="form-group">
                                    <label for="input-keterangan">Berikan Keterangan</label>
                                    <textarea class="form-control" id="input-keterangan" rows="3" required></textarea>
                                    <div class="notif"></div>
                                  </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="button" class="btn btn-primary" id="btn-submit-ket">Simpan</button>
                          </div>
                        </div>
                      </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascripts')
    
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/datatables.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/plug-ins/1.10.19/pagination/four_button.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/autofill/2.3.3/js/dataTables.autoFill.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/colreorder/1.5.0/js/dataTables.colReorder.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.5/js/dataTables.fixedColumns.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.4/js/dataTables.fixedHeader.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/keytable/2.5.0/js/dataTables.keyTable.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/rowgroup/1.1.0/js/dataTables.rowGroup.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.4/js/dataTables.rowReorder.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/scroller/2.0.0/js/dataTables.scroller.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/plug-ins/1.10.19/pagination/four_button.js"></script>

    <script>
        var status_belum_vote = "Belum vote";
        var status_pasti = "Pasti Memilih";
        var status_ragu = "Ragu Memilih";
        var status_tidak = "Pasti Tidak Memilih";
        var reset_status = 0;
        
        $(document).ready(function () {
            $('#table-daftar-relawan').DataTable({
                "scrollY": "200px",
                "scrollCollapse": true,
            });
            $('.dataTables_length').addClass('bs-select');

            getKeterangan();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        });

        // Fungsi Reset database
        $('#form-reset').submit(function(e){
            $('#notif').html("");
            e.preventDefault();
            var password = $('#password-confirmation').val();

            $.ajax({
                type: 'POST',
                data: {password:password},
                url: '/petakanpemilih/reset-database',
                success: function(data){
                    console.log(data.msg);
                    if(data.msg == 'Password Salah'){
                        $('#notif').html(data.msg);
                        return false;
                    }
                    $('#notif').html(data.msg);
                    setTimeout(function(){
                        console.log(data.msg);
                        location.reload();
                    }, 3000);

                }
            });

        });
        

        var table = $('#table-pemilih').DataTable({
                buttons: true,
                ordering: true,
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Semua"]],
                paging: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('petakanpemilih.anyData') }}",
                dom: 'B<clear>f',
                buttons: ['print','pdf'],
                columns: [
                    { data: 'id_table', name: 'id_table' },
                    { data: 'id_pemilih', name: 'id_pemilih' },
                    { data: 'nama', name: 'nama'},
                    { data: 'status', name: 'status' },
                    { data: 'action', 'name': 'action', orderable: false, searchable: false},
                    { data: 'keterangan', 'name': 'keterangan', orderable: false, searchable: false }
                    // { data: 'actions', name: 'actions', orderable: false, searchable: false}
                ]
            });
        table
            .buttons()
            .container()
            .appendTo( '#download' );

        $("#btn_submit_data").on("click", function(e){
            
            var nama = $("#nama").val();
            var rt = $("#rt").val();
            var rw = $("#rw").val();
            var dukuh = $("#dukuh").val();
            console.log(nama + rt + rw + dukuh);

            var formData = {
                'nama' : nama,
                'rt' : rt,
                'rw' : rw,
                'dukuh' : dukuh
            };

            console.log(1);

            //cek form berisi spasi atau tidak
            if(nama == "" || rt == "" || rw == "" || dukuh == ""){
                e.preventDefault();
                console.log(3);
                $(".notif").append('<div class="alert alert-danger" role="alert">Form tidak boleh kosong!</div>');
                $("#form-tambah-data")[0].reset();

                
            }else{
                console.log(4);
                //process form
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: 'petakanpemilih/tambahData',
                    type: 'post',
                    data: formData,
                    // dataType: 'json',
                    success: function(data){
                        console.log(2);
                        if(data.status == true){
                            console.log(data.msg);
                            $("#form-tambah-data")[0].reset();
                             $(".notif").append('<div class="alert alert-success" role="alert">Tambah data berhasil!</div>');
                            
                        }else{
                            console.log("eror");
                        }

                    },
                    error: function(data){
                        console.log('Error:', data);
                    }
                });
            }

        });

        $('body').on('click','#btn-pasti',function(){
            var user_id = $(this).val();
            console.log(user_id);
            $.ajax({
                type: "get",
                url: "petakanpemilih/" + user_id + "/" + status_pasti,
                success: function(data){
                    setTimeout( function () {
                        table.ajax.reload();
                    }, 100 );
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });

        $('body').on('click','#btn-ragu',function(){
            var user_id = $(this).val();
            console.log(user_id);
            $.ajax({
                type: "get",
                url: "petakanpemilih/" + user_id + "/" + status_ragu,
                success: function(data){
                    // $("#btn-pasti").hide();
                    // $("#btn-ragu").hide();
                    // $("#btn-tidak").hide();
                    setTimeout( function () {
                        table.ajax.reload();
                    }, 100 );
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });

        $('body').on('click','#btn-tidak',function(){
            var user_id = $(this).val();
            console.log(user_id);
            $.ajax({
                type: "get",
                url: "petakanpemilih/" + user_id + "/" + status_tidak,
                success: function(data){
                    setTimeout( function () {
                        table.ajax.reload();
                    }, 100 );
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });

        $('body').on('click','#btn-reset',function(){
            var user_id = $(this).val();
            console.log(user_id);
            $.ajax({
                type: "get",
                url: "petakanpemilih/" + user_id + "/" + reset_status,
                success: function(data){
                    setTimeout( function () {
                        table.ajax.reload();
                    }, 100 );
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });



        // Fitur Lihat Keterangan
        function getKeterangan(){
            $("body").on('click','#btn-lihat-ket', function(){
                var id_table = $(this).val();
                CreateOrUpdateKeterangan(id_table);

                console.log(id_table);
                $.ajax({
                    url: "petakanpemilih/getKeterangan/" + id_table,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                        console.log(data[0].keterangan);
                        $("#input-keterangan").val(data[0].keterangan);
                    }
                });
            });
        }


        // Fitur Create/Update keterangan
        function CreateOrUpdateKeterangan(id_table){
            $("#btn-submit-ket").on("click", function(e){
                var valKet = $("#input-keterangan").val();
                e.preventDefault();

                if(valKet == ""){
                    console.log("ket null");
                    var notif = $(".notif").html('<div class="alert alert-danger" role="alert">Keterangan Kosong</div>');
                    notif.show();
                    setTimeout(function(){
                        notif.hide();
                    }, 2000);
                }else{
                    // update keterangan
                    $.ajax({
                        url: "petakanpemilih/updateKeterangan",
                        type: "get",
                        data: {
                            id: id_table,
                            keterangan: valKet 
                        },success:function(data){
                            console.log(data.success);
                            var notif = $(".notif").html('<div class="alert alert-success" role="alert">Update keterangan berhasil</div>');
                            notif.show();
                            setTimeout(function(){
                                notif.hide();
                            }, 2000);
                        },error:function(data){
                            var notif = $(".notif").html('<div class="alert alert-danger" role="alert">Update keterangan gagal!</div>');
                            notif.show();
                            setTimeout(function(){
                                notif.hide();
                            }, 2000);
                            
                        }

                    });
                }

            });
        }

    </script>

@endsection