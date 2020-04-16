<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <title>GERMAS</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{ asset('logo.jpeg') }}" rel="shortcut icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('lib/nivo-slider/css/nivo-slider.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/owlcarousel/owl.carousel.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/owlcarousel/owl.transitions.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/venobox/venobox.css') }}" rel="stylesheet">

  <!-- Nivo Slider Theme -->
  <link href="{{ asset('css/nivo-slider-theme.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

</head>

<body data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>

  <header>
    <!-- header-area start -->
    <div id="sticker" class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <!-- Navigation -->
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                <!-- Brand -->
                <a class="navbar-brand page-scroll sticky-logo" href="{{ url('/') }}">
                  @php
                    $first_word = str_split($data->nama_aplikasi);
                    $array_word = explode($first_word[0],$data->nama_aplikasi);
                    $last_word = $array_word[1];    
                  @endphp
                  <h1><span style="color: yellow;">{{ strtoupper($first_word[0]) }}</span>{{ strtoupper($last_word) }}</h1>
                </a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                  @if(auth()->user())
                    <li>
                      <a class="page-scroll" href="{{ url('/home') }}">Beranda</a>
                    </li>
                  @else
                    <li>
                      <a class="page-scroll" href="{{ url('/login') }}">Login</a>
                    </li>
                  @endif
                  <li>
                    <a class="page-scroll" href="{{ url('/pengaduan') }}">Pengaduan</a>
                  </li>
                </ul>
              </div>
              <!-- navbar-collapse -->
            </nav>
            <!-- END: Navigation -->
          </div>
        </div>
      </div>
    </div>
    <!-- header-area end -->
  </header>
  <!-- header end -->

  <!-- Start Slider Area -->
  <div id="home" class="slider-area">
    <div class="bend niceties preview-2">
      <div id="ensign-nivoslider" class="slides">
        <img src="{{ asset('data_file/'.$data->foto_beranda_1) }}" alt="" title="#slider-direction-5" />
        <img src="{{ asset('data_file/'.$data->foto_beranda_2) }}" alt="" title="#slider-direction-4" />
        <img src="{{ asset('data_file/'.$data->foto_beranda_3) }}" alt="" title="#slider-direction-6" />
      </div>

      <!-- direction 4 -->
      <div id="slider-direction-4" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content text-center">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">{{ $data->caption_foto_beranda_1 }}</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn page-scroll" href="#about">Visi Misi</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 5 -->
      <div id="slider-direction-5" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content text-center">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">{{ $data->caption_foto_beranda_2 }}</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn page-scroll" href="#about">Visi Misi</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 6 -->
      <div id="slider-direction-6" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content text-center">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">{{ $data->caption_foto_beranda_3 }}</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn page-scroll" href="#about">Visi Misi</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- End Slider Area -->

  <!-- Visi Misi -->
  <div id="about" class="about-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Visi & Misi</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- single-well start-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-left">
            <div class="single-well">
               <img src="{{ asset('data_file/'.$data->foto_profil) }}" alt="foto profil">                        
            </div>
          </div>
        </div>
        <!-- single-well end-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-middle">
            <div class="single-well">
              
                <h4 class="sec-head">VISI</h4>
              <p>
                {{ nl2br($data->visi) }}
              </p>

              <h4 class="sec-head">MISI</h4>
              <ul>
                <p>{!! nl2br($data->misi) !!}</p>
                {{-- <li>
                  <i class="fa fa-check"></i> Mewujudkan sumber daya manusia yang cerdas, sehat dan bermartabat
                </li>
                <li>
                  <i class="fa fa-check"></i> Mewujudkan tata kelola Pemerintahan Desa yang baik dan bersih
                </li>
                <li>
                  <i class="fa fa-check"></i> Meningkatkan kualitas pelayanan masyarakat.
                </li>
                <li>
                  <i class="fa fa-check"></i> Mengembangkan ekonomi desa yang berbasis potensi lokal
                </li>
                <li>
                  <i class="fa fa-check"></i> Meningkatkan kualitas infrastruktur desa & penyediaan kebutuhan sarana prasarana dasar sosial masyarakat
                </li>
                <li>
                  <i class="fa fa-check"></i> Mewujudkan desa yang berwawasan pengurangan resiko bencana berbasis masyarakat
                </li>
                <li>
                  <i class="fa fa-check"></i> Mewujudkan tatanan kehidupan masyarakat yang berakhlak dan toleran
                </li>
                <li>
                  <i class="fa fa-check"></i> Mewujudkan lingkungan permukiman yang bersih , sehat, dan indah
                </li> --}}
              </ul>
            </div>
          </div>
        </div>
        <!-- End col-->
      </div>
    </div>
  </div>
  <!-- End About area -->

  <!-- Profil -->
  <div class="faq-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Profil Calon Kepala Desa Meger</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="faq-details">
            <div class="panel-group" id="accordion">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
                        <a data-toggle="collapse" class="active" data-parent="#accordion" href="#check7">
                            <span class="acc-icons"></span>Data Pribadi
                        </a>
                    </h4>
                </div>
                <div id="check7" class="panel-collapse collapse in">
                  <div class="panel-body">
                    {!! nl2br($data->data_pribadi) !!}
                    {{-- <table>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td>:</td>
                            <td>Drs. MUHAMMAD AGUS SALIM</td>
                        </tr>
                        <tr>
                            <td>Nama Panggilan</td>
                            <td>:</td>
                            <td>Drs. MUHAMMAD AGUS SALIM</td>
                        </tr>
                        <tr>
                            <td>Tempat/Tanggal/Lahir</td>
                            <td>:</td>
                            <td>KLATEN, 3 AGUSTUS 1961</td>
                        </tr>
                        <tr>
                            <td>Alamat Rumah </td>
                            <td>:</td>
                            <td>MEGER RT 2 RW 2, MEGER, CEPER, KLATEN</td>
                        </tr>
                    </table> --}}
                  </div>
                </div>
              </div>
              
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
                        <a data-toggle="collapse" class="active" data-parent="#accordion" href="#check1">
                            <span class="acc-icons"></span>Data Keluarga
                        </a>
                    </h4>
                </div>
                <div id="check1" class="panel-collapse collapse in">
                  <div class="panel-body">
                    {!! nl2br($data->data_keluarga) !!}
                    {{-- <table>
                        <tr>
                            <td>Nama Istri</td>
                            <td>:</td>
                            <td>Dwi Sulistyarini</td>
                        </tr>
                        <tr>
                            <td>Nama Anak</td>
                            <td>:</td>
                            <td>
                                <ul>
                                    <li>LUTHFI A. NISA, S.Ked., M.P.H. (Dosen Fak. Kedokteran UGM)</li>
                                    <li>FAKHRIYYAH KHAIRUNNIDA, S.T. (Arsitek di Jakarta)</li>
                                    <li>FIKRI AHMADI (Kuliah UII Yogyakarta)</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Ibu</td>
                            <td>:</td>
                            <td>SURTI (almarhumah)</td>
                        </tr>
                        <tr>
                            <td>Nama Ayah</td>
                            <td>:</td>
                            <td>SUMPENO (almarhum)</td>
                        </tr>
                    </table> --}}
                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
                        <a data-toggle="collapse" class="active" data-parent="#accordion" href="#check2">
                            <span class="acc-icons"></span>Riwayat Pendidikan
                        </a>
                    </h4>
                </div>
                <div id="check2" class="panel-collapse collapse in">
                  <div class="panel-body">
                    {!! nl2br($data->data_riwayat_pendidikan) !!}
                    {{-- <table>
                        <tr>
                            <td>SD</td>
                            <td>:</td>
                            <td>SDN MEGER</td>
                        </tr>
                        <tr>
                            <td>SMP</td>
                            <td>:</td>
                            <td>SMPN 1 Ceper</td>
                        </tr>
                        <tr>
                            <td>SMA</td>
                            <td>:</td>
                            <td>SMAN 1 Surakarta</td>
                        </tr>
                        <tr>
                            <td>Perguruan Tinggi</td>
                            <td>:</td>
                            <td>SARJANA ADMINISTRASI NEGARA FISIPOL UGM</td>
                        </tr>
                    </table> --}}
                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
                        <a data-toggle="collapse" class="active" data-parent="#accordion" href="#check3">
                            <span class="acc-icons"></span>Riwayat Pekerjaan & Tempat Tugas
                        </a>
                    </h4>
                </div>
                <div id="check3" class="panel-collapse collapse in">
                  <div class="panel-body">
                    {!! nl2br($data->data_riwayat_pekerjaan) !!}
                    {{-- <table>
                        <tr>
                            <td>PNS PUSAT</td>
                            <td>:</td>
                            <td>DEPDIKBUD Kab. Klaten (1993-2000)</td>
                        </tr>
                        <tr>
                            <td>PNS DAERAH</td>
                            <td>:</td>
                            <td>
                                <ul>
                                    <li>1. DINAS PENDIDIKAN & KEBUDAYAAN KAB. KLATEN (2001-2007)</li>
                                    <li>2. BADAN KEPEGAWAIAN DAERAH KAB. KLATEN (2007-2012)</li>
                                    <li>3. BADAN PERENCANAAN PEMBANGUNAN DAERAH KAB. KLATEN (2012-2016)</li>
                                    <li>4. BADAN KEPEGAWAIAN, PENDIDIKAN DAN PELATIHAN DAERAH KAB. KLATEN (2016-2018)</li>
                                    <li>5. SEKRETARIAT DAERAH KAB. KLATEN (2018-2019)</li>
                                    <li>6. PENSIUN PNS per 1 SEPTEMBER 2019 (lama mengabdi selama 26 tahun)</li>
                                </ul>
                            </td>
                        </tr>
                    </table> --}}
                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
                        <a data-toggle="collapse" class="active" data-parent="#accordion" href="#check5">
                            <span class="acc-icons"></span>Riwayat Pengabdian Masyarakat
                        </a>
                    </h4>
                </div>
                <div id="check5" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <ul>
                      {!! nl2br($data->data_riwayat_pengabdian_masyarakat) !!}
                        {{-- <li>1. BPD DESA MEGER (WAKIL KETUA/KETUA, 2 PERIODE)</li>
                        <li>2. BKM DAMAI MEGER (KOORDINATOR, 3 PERIODE)</li>
                        <li>3. KETUA RW 02 DESA MEGER</li>
                        <li>4. DIKDASMEN PDM KLATEN (WAKIL KETUA)</li>
                        <li>5. PENDIRI BMT AL FALAH CEPER (KETUA PENGURUS 4 PERIODE)</li>
                        <li>6. TIM PERUMUS PEMBENTUKAN BUMDes MEGER</li>
                        <li>7. TIM PERUMUS RKPDes MEGER TAHUN 2020</li> --}}
                    </ul>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
      <!-- end Row -->
    </div>
  </div>
  <!-- End Faq Area -->

  <!-- Start Testimonials -->
  <div class="testimonials-area">
    <div class="testi-inner area-padding">
      <div class="testi-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <!-- Start testimonials Start -->
            <div class="testimonial-content text-center">
              <a class="quate" href="#"><i class="fa fa-quote-right"></i></a>
              <!-- start testimonial carousel -->
              <div class="testimonial-carousel">
                <div class="single-testi">
                  <div class="testi-text">
                    <p>
                      {{ $data->caption_foto_tengah }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <!-- End testimonials end -->
          </div>
          <!-- End Right Feature -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Testimonials -->

  <!-- Start portfolio Area -->
  <div id="portfolio" class="portfolio-area area-padding fix">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Galeri</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- Start Portfolio -page -->
        <div class="awesome-project-content">

          @foreach ($data_galeri as $a)
              <!-- single-awesome-project start -->
              <div class="col-md-4 col-sm-4 col-xs-12 design">
                <div class="single-awesome-project">
                  <div class="awesome-img">
                    <a href="#"><img src="{{ asset('data_file/galeri/'.$a->filename) }}" alt="" /></a>
                    <div class="add-actions text-center">
                      <div class="project-dec">
                        <a class="venobox" data-gall="myGallery" href="{{ asset('data_file/galeri/'.$a->filename) }}">
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- single-awesome-project end -->
          @endforeach


        </div>
      </div>
    </div>
  </div>
  <!-- awesome-portfolio end -->
  
  <!-- Start Suscrive Area -->
  <div class="suscribe-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
          <div class="suscribe-text text-center">
            <h3>{{ $data->caption_lain }}</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Suscrive Area -->
  <!-- Start contact Area -->
  <div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
      <div class="contact-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Kontak</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start contact icon column -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-mobile"></i>
                <p>
                  {{ $data->telepon }}<br>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-envelope-o"></i>
                <p>
                  {{ $data->email }}<br>
                  <span>Web: {{ url('/') }}</span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Contact Area -->

  <!-- Start Footer bottom Area -->
  <footer>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy; Copyright <strong>GERMAS</strong>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{ asset('lib/jquery/jquery.min.js') }}" ></script>
  <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}" ></script>
  <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}" ></script>
  <script src="{{ asset('lib/venobox/venobox.min.js') }}" ></script>
  <script src="{{ asset('lib/knob/jquery.knob.js') }}" ></script>
  <script src="{{ asset('lib/wow/wow.min.js') }}" ></script>
  <script src="{{ asset('lib/parallax/parallax.js') }}" ></script>
  <script src="{{ asset('lib/easing/easing.min.js') }}" ></script>
  <script src="{{ asset('lib/nivo-slider/js/jquery.nivo.slider.js') }}"  type="text/javascript"></script>
  <script src="{{ asset('lib/appear/jquery.appear.js') }}" ></script>
  <script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}" ></script>

  <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
