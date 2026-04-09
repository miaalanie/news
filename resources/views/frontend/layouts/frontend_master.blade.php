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
    <div class="container-fluid bg-dark text-light pt-5 px-sm-3 px-md-5 mt-5">
        <div class="row py-4">
            <div class="col-lg-4 col-md-6 mb-4">
                <h5 class="mb-4 text-uppercase font-weight-bold">
                    {{ __('messages.contact_us') }}
                </h5>

                <p class="mb-2 d-flex align-items-center">
                    <i class="fa fa-map-marker-alt mr-3"></i>
                    {{ $default_setting->address }}
                </p>

                <p class="mb-2 d-flex align-items-center">
                    <i class="fa fa-phone-alt mr-3"></i>
                    {{ $default_setting->support_phone }}
                </p>

                <p class="mb-3 d-flex align-items-center">
                    <i class="fa fa-envelope mr-3"></i>
                    {{ $default_setting->support_email }}
                </p>
            </div>
        </div>
    </div>

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
