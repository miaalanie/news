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
                    class="nav-item nav-link {{(Route::currentRouteName() == 'index') ? 'active' : ''}}">
                    HOME
                </a>
                <a href="{{ route('today.news') }}"
                    class="nav-item nav-link {{(Route::currentRouteName() == 'today.news') ? 'active' : ''}}">
                    TODAY
                </a>
                <a href="{{ route('politik.news') }}"
                    class="nav-item nav-link {{(Route::currentRouteName() == 'politik.news') ? 'active' : ''}}">
                    POLITIK
                </a>
                <a href="{{ route('tekno.news') }}"
                    class="nav-item nav-link {{(Route::currentRouteName() == 'tekno.news') ? 'active' : ''}}">
                    TEKNOLOGI
                </a>
                <a href="{{ route('hiburan.news') }}"
                    class="nav-item nav-link {{(Route::currentRouteName() == 'hiburan.news') ? 'active' : ''}}">
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

    </div>
    </div>
    <!-- Navbar End -->

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

                <h6 class="mt-4 mb-3 text-uppercase font-weight-bold">
                    {{ __('messages.follow_us') }}
                </h6>

                <div class="d-flex">
                    <a target="_blank" class="btn btn-outline-light btn-square mr-2" href="{{ $default_setting->facebook_link }}">
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <a target="_blank" class="btn btn-outline-light btn-square mr-2" href="{{ $default_setting->twitter_link }}">
                        <i class="fab fa-twitter"></i>
                    </a>

                    <a target="_blank" class="btn btn-outline-light btn-square mr-2" href="{{ $default_setting->instagram_link }}">
                        <i class="fab fa-instagram"></i>
                    </a>

                    <a target="_blank" class="btn btn-outline-light btn-square mr-2" href="{{ $default_setting->linkedin_link }}">
                        <i class="fab fa-linkedin-in"></i>
                    </a>

                    <a target="_blank" class="btn btn-outline-light btn-square" href="{{ $default_setting->youtube_link }}">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>

            </div>

        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
        <p class="m-0 text-center">
            &copy;
            <a href="{{ route('index') }}">{{ $default_setting->app_name }}</a>.
            {{ __('messages.copyright') }}
            <a href="https://diskominfo.sukabumikota.go.id/" target="_blank" rel="noopener noreferrer">
                Diskominfo Kota Sukabumi
            </a>
        </p>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="javascript:void(0);" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('admin') }}/plagins/datatables/js/datatables.min.js"></script>
    <script src="{{ asset('frontend') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('frontend') }}/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('frontend') }}/lib/lightbox/dist/simple-lightbox.js"></script>
    <script src="{{ asset('admin') }}/plagins/select2/js/select2.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('frontend') }}/js/main.js"></script>

    @yield('script')

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Subscriber Data
            $('#subscriber_form').on('submit', function(e) {
                e.preventDefault();
                const form_data = new FormData(this);
                $("#subscriber_btn").text('Submit...');
                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: new FormData(this),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(document).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.status == 400) {
                            $.each(data.error, function(prefix, val) {
                                $('span.' + prefix + '_error').text(val[0]);
                            })
                        } else {
                            $("#subscriber_btn").text('Done');
                            $("#subscriber_form")[0].reset();
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-center',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                            })

                            Toast.fire({
                                icon: 'success',
                                title: 'Subscribe success'
                            })
                        }
                    }
                });
            });

            // Find Product
            $('#findNews').keyup(function() {
                var searchData = $("#findNews").val();
                if (searchData.length > 0) {
                    $.ajax({
                        type: 'POST',
                        url: "{{route('find.news')}}",
                        data: {
                            search: searchData
                        },
                        success: function(result) {
                            $('#suggest_news').html(result)
                        }
                    })
                    // ajax end
                }
                if (searchData.length < 1) {
                    $('#suggest_news').html("")
                }
            })
        });

        // Find Product
        function showSearchResult() {
            $('#suggest_news').slideDown()
        }

        function hideSearchResult() {
            $('#suggest_news').slideUp()
        }
    </script>

    <script type="text/javascript">
        var url = "{{ route('change.language') }}";

        $(".changeLanguage").change(function() {
            window.location.href = url + "?language=" + $(this).val();
        });
    </script>
</body>

</html>