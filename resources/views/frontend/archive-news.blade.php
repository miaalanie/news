@extends('frontend.layouts.frontend_master')

@section('title', 'All News')

@section('content')
<!-- News With Sidebar Start -->
<div class="container-fluid mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold">Date: {{ ($archive_date ? date('D d-F,Y', strtotime($archive_date)) : "N/A") }}</h4>
                        </div>
                    </div>

                    @forelse ($advertisements->where('advertisement_position', 'Center Top')->take(1) as $advertisement)
                    <div class="col-lg-12 mb-3">
                        <a href="{{ $advertisement->advertisement_link }}"><img class="img-fluid w-100" src="{{ asset('uploads/advertisement_photo') }}/{{ $advertisement->advertisement_photo }}" alt="{{ $advertisement->advertisement_title }}"></a>
                    </div>
                    @empty
                    <div class="col-lg-12">
                        <div class="alert alert-danger">
                            <span>{{ __('messages.not_found') }}</span>
                        </div>
                    </div>
                    @endforelse

                    @forelse ($all_news as $news)
                    <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="{{ asset('uploads/news_thumbnail_photo') }}/{{ $news->news_thumbnail_photo }}" style="object-fit: cover;">
                            <div class="bg-white border border-top-0 p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle mr-2" src="{{ asset('uploads/profile_photo') }}/{{ $news->relationtouser->profile_photo }}" width="25" height="25" alt="">
                                        <small><a href="{{ route('reporter.wise.news', $news->relationtouser->id) }}">{{ $news->relationtouser->name }}</a></small>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="{{ route('category.wise.news', $news->relationtocategory->category_slug) }}">{{ $news->relationtocategory->category_name }}</a>
                                    <a class="text-body" href="#"><small>{{ $news->created_at->format('d-M, Y') }}</small></a>
                                </div>
                                <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="{{ route('news.details', $news->news_slug) }}">{!! substr($news->news_headline, 0, 30) . '...' !!}</a>
                            </div>
                            <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                <div class="d-flex align-items-center">
                                    <small class="ml-3"><i class="far fa-eye mr-2"></i>{{ $news->news_view }}</small>
                                    <small class="ml-3"><i class="far fa-comment mr-2"></i>{{ App\Models\Comment::where('news_id', $news->id)->count() }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-lg-12">
                        <div class="alert alert-danger">
                            <span>{{ __('messages.not_found') }}</span>
                        </div>
                    </div>
                    @endforelse

                    @forelse ($advertisements->where('advertisement_position', 'Center Bottom')->take(1) as $advertisement)
                    <div class="col-lg-12 mb-3">
                        <a href="{{ $advertisement->advertisement_link }}"><img class="img-fluid w-100" src="{{ asset('uploads/advertisement_photo') }}/{{ $advertisement->advertisement_photo }}" alt="{{ $advertisement->advertisement_title }}"></a>
                    </div>
                    @empty
                    <div class="col-lg-12">
                        <div class="alert alert-danger">
                            <span>{{ __('messages.not_found') }}</span>
                        </div>
                    </div>
                    @endforelse
                </div>
                <div class="d-flex justify-content-center">
                    {{ $all_news->links() }}
                </div>
            </div>

           
        </div>
    </div>
</div>
<!-- News With Sidebar End -->
@endsection