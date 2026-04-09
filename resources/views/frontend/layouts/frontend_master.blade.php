@php
$default_setting = App\Models\DefaultSetting::first();
App\Models\Visitor_detail::insert([
'ip_address' => $_SERVER['REMOTE_ADDR'],
'visit_time' => Carbon\Carbon::now()
])
@endphp

@auth
@php
App\Models\User::where('id', Auth::user()->id)->update(['last_active' => Carbon\Carbon::now() ])
@endphp
@endauth

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $default_setting->app_name }} - @yield('title')</title>

    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}

    <!-- Favicon -->
    <link href="{{ asset('uploads/default_photo') }}/{{ $default_setting->favicon }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('frontend') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/lib/lightbox/dist/simple-lightbox.css" rel="stylesheet">
    <link href="{{ asset('admin') }}/plagins/datatables/css/datatables.min.css" rel="stylesheet">

    <link href="{{ asset('admin') }}/plagins/select2/css/select2.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend') }}/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">

        <a href="{{ route('index') }}" class="navbar-brand spy-logo">
            {{ $default_setting->app_name }}
        </a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">

            <!-- MENU -->
            <div class="navbar-nav mr-auto py-0">
                <a href="{{ route('index') }}"
                    class="nav-item nav-link tts-menu {{(Route::currentRouteName() == 'index') ? 'active' : ''}}">
                    HOME
                </a>
                <a href="{{ route('today.news') }}"
                    class="nav-item nav-link tts-menu {{(Route::currentRouteName() == 'today.news') ? 'active' : ''}}">
                    TODAY
                </a>
                <a href="{{ route('politik.news') }}"
                    class="nav-item nav-link tts-menu {{(Route::currentRouteName() == 'politik.news') ? 'active' : ''}}">
                    POLITIK
                </a>
                <a href="{{ route('tekno.news') }}"
                    class="nav-item nav-link tts-menu {{(Route::currentRouteName() == 'tekno.news') ? 'active' : ''}}">
                    TEKNOLOGI
                </a>
                <a href="{{ route('hiburan.news') }}"
                    class="nav-item nav-link tts-menu {{(Route::currentRouteName() == 'hiburan.news') ? 'active' : ''}}">
                    HIBURAN
                </a>
            </div>

            <!-- SEARCH -->
            <div class="input-group ml-auto d-none d-lg-flex" style="max-width:300px;">
                <form action="{{route('search.news')}}" method="GET" class="d-flex w-100">

                    <input type="text"
                        class="form-control border-0"
                        name="news_headline"
                        placeholder="{{ __('messages.keyword') }}">

                    <div class="input-group-append">
                        <button class="input-group-text bg-primary text-dark border-0 px-3">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </nav>

    <!-- Content Start -->
    @yield('content')
    <!-- Content End -->

    <!-- Footer Start -->
<<<<<<< Updated upstream
    <div class="container-fluid bg-dark text-light pt-5 px-sm-3 px-md-5 mt-5">
        <div class="row py-4">
            <div class="col-lg-4 col-md-6 mb-4">
                <h5 class="mb-4 text-uppercase font-weight-bold">
                    {{ __('messages.contact_us') }}
=======
    <div class="container-fluid text-light pt-5 px-sm-3 px-md-5 mt-5"
        style="background: linear-gradient(135deg, #1c1c1c, #111111);">

        <div class="row py-4 align-items-start">

            <!-- KIRI: Contact -->
            <div class="col-lg-6 col-md-6 mb-4">
                <h5 style="font-weight:700; margin-bottom:20px;color:#ffffff;">
                    CONTACT US
                    <span style="display:block;width:40px;height:2px;background:#ffc107;margin-top:8px;"></span>
>>>>>>> Stashed changes
                </h5>

                <p style="color:#ccc;">
                    <i class="fa fa-map-marker-alt mr-2"></i>
                    Jl. Syamsudin. SH No.25, Cikole, Kota Sukabumi, Jawa Barat 43113
                </p>

                <p style="color:#ccc;">
                    <i class="fa fa-phone-alt mr-2"></i>
                    +62 (266) 20229715
                </p>

                <p style="color:#ccc;">
                    <i class="fa fa-envelope mr-2"></i>
                    diskominfo@sukabumikota.go.id
                </p>
<<<<<<< Updated upstream
=======
            </div>

            <!-- KANAN: Sosial -->
            <div class="col-lg-6 col-md-6 mb-4" style="text-align:left;">
                <h5 style="font-weight:700; margin-bottom:20px;color:#ffffff;">
                    FOLLOW US
                    <span style="display:block;width:40px;height:2px;background:#ffc107;margin-top:8px; margin-right:auto;"></span>
                </h5>

                <div style="display:flex; gap:8px; margin-bottom:15px; justify-content:flex-start;">
                    <a target="_blank" href="https://www.facebook.com/diskominfokotsi"
                        style="width:38px;height:38px;border:1px solid #fff;display:flex;align-items:center;justify-content:center;color:#fff;">
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <a target="_blank" href="#"
                        style="width:38px;height:38px;border:1px solid #fff;display:flex;align-items:center;justify-content:center;color:#fff;">
                        <i class="fab fa-twitter"></i>
                    </a>

                    <a target="_blank" href="https://www.instagram.com/diskominfo_sukabumikota"
                        style="width:38px;height:38px;border:1px solid #fff;display:flex;align-items:center;justify-content:center;color:#fff;">
                        <i class="fab fa-instagram"></i>
                    </a>

                    <a target="_blank" href="https://maps.app.goo.gl/tgLkh3X6p2hKuDaC7"
                        style="width:38px;height:38px;border:1px solid #fff;display:flex;align-items:center;justify-content:center;color:#fff;">
                        <i class="fas fa-map"></i>
                    </a>

                    <a target="_blank" href="http://www.youtube.com/@pemerintahkotasukabumi"
                        style="width:38px;height:38px;border:1px solid #fff;display:flex;align-items:center;justify-content:center;color:#fff;">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>

                <p style="color:#aaa; font-size:14px;">
                    Ikuti kami untuk mendapatkan update berita terbaru seputar Kota Sukabumi.
                </p>
>>>>>>> Stashed changes
            </div>
        </div>
    </div>
<<<<<<< Updated upstream
=======

    <!-- Copyright -->
    <div class="container-fluid py-3 text-center"
        style="background:#111; color:#ccc;">
        &copy; {{ __('messages.copyright') }}
        <a href="https://diskominfo.sukabumikota.go.id/" target="_blank"
            style="color:#ffc107; text-decoration:none;">
            Diskominfo Kota Sukabumi
        </a>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="javascript:void(0);" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>
>>>>>>> Stashed changes

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend') }}/js/main.js"></script>

    <!-- TTS MENU SCRIPT -->
    <script>
    document.addEventListener("DOMContentLoaded", function () {

        const synth = window.speechSynthesis;

        // load voice
        speechSynthesis.getVoices();

        function speak(text){
            if(!text) return;

            synth.cancel();

            const speech = new SpeechSynthesisUtterance(text);
            speech.lang = "id-ID";
            speech.rate = 1;
            speech.pitch = 1;
            speech.volume = 1;

            synth.speak(speech);
        }

        document.addEventListener("mouseover", function(e){
            const el = e.target.closest(".tts-menu, .tts-title");
            if(el){
                speak(el.innerText.trim());
            }
        });

        document.addEventListener("mouseout", function(e){
            const el = e.target.closest(".tts-menu, .tts-title");
            if(el){
                synth.cancel();
            }
        });

    });
    </script>

</body>
</html>
