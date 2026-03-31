@extends('frontend.layouts.frontend_master')

@section('title', 'Home')

@section('content')
<!-- Main News Slider Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-7 px-0">
            <div class="owl-carousel main-carousel position-relative">
                @forelse ($all_news->where('news_position', 'Top Slider') as $news)
                <div class="position-relative overflow-hidden" style="height: 500px;">
                    <img class="img-fluid h-100" src="{{ asset('uploads/news_thumbnail_photo') }}/{{ $news->news_thumbnail_photo }}" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                href="{{ route('category.wise.news', $news->relationtocategory->category_slug) }}">{{ $news->relationtocategory->category_name }}</a>
                            <a class="text-white" href="#">{{ $news->created_at->format('d-M, Y') }}</a>
                        </div>
                        <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="{{ route('news.details', $news->news_slug) }}">{!! substr($news->news_headline, 0, 50) . '...' !!}</a>
                    </div>
                </div>
                @empty
                <div class="alert alert-danger">
                    <span>{{ __('messages.not_found') }}</span>
                </div>
                @endforelse
            </div>
        </div>
        <div class="col-lg-5 px-0">
            <div class="row mx-0">
                @forelse ($all_news->where('news_position', 'Top Right') as $news)
                <div class="col-md-6 px-0">
                    <div class="position-relative overflow-hidden" style="height: 250px;">
                        <img class="img-fluid w-100 h-100" src="{{ asset('uploads/news_thumbnail_photo') }}/{{ $news->news_thumbnail_photo }}" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="{{ route('category.wise.news', $news->relationtocategory->category_slug) }}">{{ $news->relationtocategory->category_name }}</a>
                                <a class="text-white" href="#"><small>{{ $news->created_at->format('d-M, Y') }}</small></a>
                            </div>
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="{{ route('news.details', $news->news_slug) }}">{!! substr($news->news_headline, 0, 25) . '...' !!}</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="alert alert-danger">
                    <span>{{ __('messages.not_found') }}</span>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
<!-- Main News Slider End -->

<!-- Featured News Slider Start -->
<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">{{ __('messages.featured_news') }}</h4>
        </div>
        <div class="owl-carousel news-carousel carousel-item-4 position-relative">
            @forelse ($all_news->where('news_position', 'Featured') as $news)
            <div class="position-relative overflow-hidden" style="height: 300px;">
                <img class="img-fluid h-100" src="{{ asset('uploads/news_thumbnail_photo') }}/{{ $news->news_thumbnail_photo }}" style="object-fit: cover;">
                <div class="overlay">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="{{ route('category.wise.news', $news->relationtocategory->category_slug) }}">{{ $news->relationtocategory->category_name }}</a>
                    </div>
                    <div class="mb-2">
                        <a class="text-white" href="#"><small>{{ $news->created_at->format('d-M, Y') }}</small></a>
                    </div>
                    <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="{{ route('news.details', $news->news_slug) }}">{!! substr($news->news_headline, 0, 25) . '...' !!}</a>
                </div>
            </div>
            @empty
            <div class="alert alert-danger">
                <span>{{ __('messages.not_found') }}</span>
            </div>
            @endforelse
        </div>
    </div>
</div>
<!-- Featured News Slider End -->

<!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">{{ __('messages.latest_news') }}</h4>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="{{ route('all.news') }}">{{ __('messages.view_all') }}</a>
                            </div>
                        </div>
                        @forelse ($all_news->where('news_position', 'Default') as $news)
                            @if ($loop->index == 0 || $loop->index == 1)
                                <div class="col-lg-6">
                                    <div class="position-relative mb-3">
                                        <img class="img-fluid w-100" src="{{ asset('uploads/news_thumbnail_photo') }}/{{ $news->news_thumbnail_photo }}" style="object-fit: cover;">
                                        <div class="bg-white border border-top-0 p-4">
                                            <div class="d-flex align-items-center mb-3">
                                                <img class="rounded-circle mr-2" src="{{ asset('uploads/profile_photo') }}/{{ $news->relationtouser->profile_photo }}" width="25" height="25" alt="">
                                                <small><a href="{{ route('reporter.wise.news', $news->relationtouser->id) }}">{{ $news->relationtouser->name }}</a></small>
                                            </div>
                                            <div class="mb-2">
                                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                    href="{{ route('category.wise.news', $news->relationtocategory->category_slug) }}">{{ $news->relationtocategory->category_name }}</a>
                                                <a class="text-body" href="#"><small>{{ $news->created_at->format('d-M, Y') }}</small></a>
                                            </div>
                                            <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="{{ route('
                                            
                                            details', $news->news_slug) }}">{!! substr($news->news_headline, 0, 25) . '...' !!}</a>
                                            <p class="m-0">{!! substr($news->news_details, 0, 50) . '...' !!}</p>
                                        </div>
                                        <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                            <div class="d-flex align-items-center">
                                                <small class="ml-3"><i class="far fa-eye mr-2"></i>{{ $news->news_view }}</small>
                                                <small class="ml-3"><i class="far fa-comment mr-2"></i>{{ App\Models\Comment::where('news_id', $news->id)->count() }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                        <div class="alert alert-danger">
                            <span>{{ __('messages.not_found') }}</span>
                        </div>
                        @endforelse

                        @forelse ($advertisements->where('advertisement_position', 'Center Top')->take(1) as $advertisement)
                            <div class="col-lg-12 mb-3">
                                <a target="_blank" href="{{ $advertisement->advertisement_link }}"><img class="img-fluid w-100" src="{{ asset('uploads/advertisement_photo') }}/{{ $advertisement->advertisement_photo }}" alt="{{ $advertisement->advertisement_title }}"></a>
                            </div>
                        @empty
                        <span class="text-danger">{{ __('messages.not_found') }}</span>
                        @endforelse

                        @foreach ($all_news->where('news_position', 'Default') as $news)
                            @if ($loop->index == 2 || $loop->index == 3)
                            <div class="col-lg-6">
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" src="{{ asset('uploads/news_thumbnail_photo') }}/{{ $news->news_thumbnail_photo }}" style="object-fit: cover;">
                                    <div class="bg-white border border-top-0 p-4">
                                        <div class="d-flex align-items-center mb-3">
                                            <img class="rounded-circle mr-2" src="{{ asset('uploads/profile_photo') }}/{{ $news->relationtouser->profile_photo }}" width="25" height="25" alt="">
                                            <small><a href="{{ route('reporter.wise.news', $news->relationtouser->id) }}">{{ $news->relationtouser->name }}</a></small>
                                        </div>
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                href="{{ route('category.wise.news', $news->relationtocategory->category_slug) }}">{{ $news->relationtocategory->category_name }}</a>
                                            <a class="text-body" href="#"><small>{{ $news->created_at->format('d-M, Y') }}</small></a>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="{{ route('news.details', $news->news_slug) }}">{!! substr($news->news_headline, 0, 25) . '...' !!}</a>
                                        <p class="m-0">{!! substr($news->news_details, 0, 50) . '...' !!}</p>
                                    </div>
                                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                        <div class="d-flex align-items-center">
                                            <small class="ml-3"><i class="far fa-eye mr-2"></i>{{ $news->news_view }}</small>
                                            <small class="ml-3"><i class="far fa-comment mr-2"></i>{{ App\Models\Comment::where('news_id', $news->id)->count() }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if ($loop->index == 4 || $loop->index == 5 || $loop->index == 6 || $loop->index == 7)
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                    <img width="110" height="110" src="{{ asset('uploads/news_thumbnail_photo') }}/{{ $news->news_thumbnail_photo }}" alt="">
                                    <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="{{ route('category.wise.news', $news->relationtocategory->category_slug) }}">{{ $news->relationtocategory->category_name }}</a>
                                            <a class="text-body" href="#"><small>{{ $news->created_at->format('d-M, Y') }}</small></a>
                                        </div>
                                        <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="{{ route('news.details', $news->news_slug) }}">{!! substr($news->news_headline, 0, 25) . '...' !!}</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach

                        @forelse ($advertisements->where('advertisement_position', 'Center Bottom')->take(1) as $advertisement)
                            <div class="col-lg-12 mb-3">
                                <a target="_blank" href="{{ $advertisement->advertisement_link }}"><img class="img-fluid w-100" src="{{ asset('uploads/advertisement_photo') }}/{{ $advertisement->advertisement_photo }}" alt="{{ $advertisement->advertisement_title }}"></a>
                            </div>
                        @empty
                            <span class="text-danger">{{ __('messages.not_found') }}</span>
                        @endforelse

                        @foreach ($all_news->where('news_position', 'Default') as $news)
                            @if ($loop->index == 8)
                                <div class="col-lg-12">
                                    <div class="row news-lg mx-0 mb-3">
                                        <div class="col-md-6 h-100 px-0">
                                            <img class="img-fluid h-100" src="{{ asset('uploads/news_thumbnail_photo') }}/{{ $news->news_thumbnail_photo }}" style="object-fit: cover;">
                                        </div>
                                        <div class="col-md-6 d-flex flex-column border bg-white h-100 px-0">
                                            <div class="mt-auto p-4">
                                                <div class="d-flex align-items-center mb-3">
                                                    <img class="rounded-circle mr-2" src="{{ asset('uploads/profile_photo') }}/{{ $news->relationtouser->profile_photo }}" width="25" height="25" alt="">
                                                    <small><a href="{{ route('reporter.wise.news', $news->relationtouser->id) }}">{{ $news->relationtouser->name }}</a></small>
                                                </div>
                                                <div class="mb-2">
                                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                        href="{{ route('category.wise.news', $news->relationtocategory->category_slug) }}">{{ $news->relationtocategory->category_name }}</a>
                                                    <a class="text-body" href="#"><small>{{ $news->created_at->format('d-M, Y') }}</small></a>
                                                </div>
                                                <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="{{ route('news.details', $news->news_slug) }}">{{ $news->news_headline  }}</a>
                                                <p class="m-0">{!! substr($news->news_details, 0, 50) . '...' !!}</p>
                                            </div>
                                            <div class="d-flex justify-content-between bg-white border-top mt-auto p-4">
                                                <div class="d-flex align-items-center">
                                                    <small class="ml-3"><i class="far fa-eye mr-2"></i>{{ $news->news_view }}</small>
                                                    <small class="ml-3"><i class="far fa-comment mr-2"></i>{{ App\Models\Comment::where('news_id', $news->id)->count() }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($loop->index == 9 || $loop->index == 10 || $loop->index == 11 || $loop->index == 12)
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                        <img width="110" height="110" src="{{ asset('uploads/news_thumbnail_photo') }}/{{ $news->news_thumbnail_photo }}" alt="">
                                        <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                            <div class="mb-2">
                                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="{{ route('category.wise.news', $news->relationtocategory->category_slug) }}">{{ $news->relationtocategory->category_name }}</a>
                                                <a class="text-body" href="#"><small>{{ $news->created_at->format('d-M, Y') }}</small></a>
                                            </div>
                                            <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="{{ route('news.details', $news->news_slug) }}">{!! substr($news->news_headline, 0, 25) . '...' !!}.</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">

    

                    <!-- Popular News Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">{{ __('messages.tranding_news') }}</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            @forelse ($tranding_news->take(5) as $news)
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img width="100" height="100" src="{{ asset('uploads/news_thumbnail_photo') }}/{{ $news->news_thumbnail_photo }}" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="{{ route('category.wise.news', $news->relationtocategory->category_slug) }}">{{ $news->relationtocategory->category_name }}</a>
                                        <br>
                                        <a class="text-body" href="#"><small>{{ $news->created_at->format('d-M, Y') }}</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="{{ route('news.details', $news->news_slug) }}">{!! substr($news->news_headline, 0, 25) . '...' !!}</a>
                                </div>
                            </div>
                            @empty
                            <div class="alert alert-warning" role="alert">
                            <span>{{ __('messages.not_found') }}</span>
                            </div>
                            @endforelse
                        </div>
                    </div>
                    <!-- Popular News End -->
                </div>
            </div>
        </div>
    </div>
<!-- News With Sidebar End -->
@endsection

@section('script')
<script>

    (function() {
        var $gallery = new SimpleLightbox('.photo_gallery a', {});
    })();

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.select_country').select2({
            placeholder: '{{ __('messages.select_country') }}',
        });
        $('.select_division').select2({
            placeholder: '{{ __('messages.select_division') }}',
        });
        $('.select_district').select2({
            placeholder: '{{ __('messages.select_district') }}',
        });
        $('.select_upazila').select2({
            placeholder: '{{ __('messages.select_upazila') }}',
        });
        $('.select_union').select2({
            placeholder: '{{ __('messages.select_union') }}',
        });

        // Divisions Data
        $('#division_col').hide();
        $(document).on('change', '.select_country', function(e){
            e.preventDefault();
            var country_id = $(this).val();
            $.ajax({
                url: '{{ route('get.divisions') }}',
                method: 'POST',
                data: {country_id:country_id},
                success: function(response) {
                    $('#all_division').html(response.send_data);
                    if (response.count > 0) {
                        $('#division_col').show();
                    } else {
                        $('#division_col').hide();
                    }
                }
            });
        })
        // District Data
        $('#district_col').hide();
        $(document).on('change', '.select_division', function(e){
            e.preventDefault();
            var division_id = $(this).val();
            $.ajax({
                url: '{{ route('get.districts') }}',
                method: 'POST',
                data: {division_id:division_id},
                success: function(response) {
                    $('#all_district').html(response.send_data);
                    if (response.count > 0) {
                        $('#district_col').show();
                    } else {
                        $('#district_col').hide();
                    }
                }
            });
        })
        // Upazila Data
        $('#upazila_col').hide();
        $(document).on('change', '.select_district', function(e){
            e.preventDefault();
            var district_id = $(this).val();
            $.ajax({
                url: '{{ route('get.upazilas') }}',
                method: 'POST',
                data: {district_id:district_id},
                success: function(response) {
                    $('#all_upazila').html(response.send_data);
                    if (response.count > 0) {
                        $('#upazila_col').show();
                    } else {
                        $('#upazila_col').hide();
                    }
                }
            });
        })
        // Union Data
        $('#union_col').hide();
        $(document).on('change', '.select_upazila', function(e){
            e.preventDefault();
            var upazila_id = $(this).val();
            $.ajax({
                url: '{{ route('get.unions') }}',
                method: 'POST',
                data: {upazila_id:upazila_id},
                success: function(response) {
                    $('#all_union').html(response.send_data);
                    if (response.count > 0) {
                        $('#union_col').show();
                    } else {
                        $('#union_col').hide();
                    }
                }
            });
        })
    });
</script>
@endsection
