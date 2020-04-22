<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ strtoupper($data_pengaturan->nama_aplikasi) }}</title>

    {{-- <link rel="shortcut icon" href="{{ asset('logo.jpeg') }}"> --}}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    {{-- Yajra Datatables --}}
    {{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- styles tambahan --}}
    @yield('styles')

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ strtoupper($data_pengaturan->nama_aplikasi) }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Daftar') }}</a>
                                </li>
                            @endif
                            @else
                                @if(auth()->user()->isAdmin == 1)
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" href="{{ url('relawan') }}">Relawan</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('pemilih') }}">Pemilih</a>
                                    </li> --}}

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/home') }}">Beranda</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/logrelawan') }}">Log Relawan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/petakanpemilih') }}">Petakan Pemilih</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/daftarrelawanfjvixcplkrbprsci') }}">Daftar Relawan</a>
                                    </li>
                                    <li class="nav-item" id="badge-pengaduan">
                                        <a href="{{ url('/read') }}" class="nav-link">Pengaduan
                                            @if ($data_notifikasi_pengaduan > 0)
                                                <span class="badge badge-pill badge-info">{{ $data_notifikasi_pengaduan }}</span>
                                            @endif
                                            {{-- {{ auth()->user()->readnotifications->count() }} --}}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/pengaturan') }}">Pengaturan</a>
                                    </li>
                                @endif

                                @if(auth()->user()->isAdmin != 1)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/home') }}">Beranda</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('petakanpemilih') }}">Petakan Pemilih</a>
                                    </li>
                                @endif

                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="page-footer" style="bottom: 0;">
            <!-- Copyright -->
              <div class="footer-copyright text-center py-3">© 2018 Copyright
                <a href="{{ url('') }}"> {{ strtoupper($data_pengaturan->nama_aplikasi) }} </a>
              </div>
              <!-- Copyright -->
        </footer>


            

    </div>
    <script>
        $(document).ready(function(){
            // function markAsReadPengaduan(){
            //     $.ajax({
            //         url: '/daftarpengaduan12345/markasread',
            //         type: 'GET',
            //         dataType: 'json',
            //         success: function($data){
            //             console.log('sukses mark as read');
            //         }
            //     });
            // }
            // $('#badge-pengaduan').on('click', function(e){
            //     // e.preventDefault();
            //     var today = new Date();
            //     var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
            //     var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
            //     var dateTime = date + ' ' + time;

            //     $.get({
            //         url: '/daftarpengaduan12345/markasread/' + dateTime,
            //     });
            // });
        });

    </script>
    @yield('javascripts')
</body>
</html>
