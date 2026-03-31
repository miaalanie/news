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
                            <h4 class="m-0 text-uppercase font-weight-bold">
                                Date: {{ isset($archive_date) ? date('D d-F,Y', strtotime($archive_date)) : date('D d-F,Y') }}
                            </h4>
                        </div>
                    </div>

                    @php
                    $all_news = [
                        [
                            "title" => "China sebut dukung upaya mediasi Pakistan ke AS dan Iran",
                            "link" => "https://www.antaranews.com/berita/5502262/china-sebut-dukung-upaya-mediasi-pakistan-ke-as-dan-iran",
                            "image" => "https://img.antaranews.com/cache/800x533/2026/03/31/IMG_3561.jpg",
                            "description" => "Pemerintah China menyatakan mendukung upaya mediasi yang dilakukan oleh Pakistan bersama dengan Arab Sudi, Turki dan",
                            "date" => "2026-03-31"
                        ],
                        [
                            "title" => "KPK fokus awasi tiga sektor rawan korupsi di Jawa Tengah",
                            "link" => "https://www.antaranews.com/berita/5502258/kpk-fokus-awasi-tiga-sektor-rawan-korupsi-di-jawa-tengah",
                            "image" => "https://img.antaranews.com/cache/800x533/2026/03/30/dialog-antikorupsi-kpk-dengan-pemprov-jateng-2763542.jpg",
                            "description" => "Komisi Pemberantasan Korupsi (KPK) saat ini berfokus mengawasi tiga sektor rawan korupsi pada lingkungan pemerintah",
                            "date" => "2026-03-31"
                        ]
                    ];
                    @endphp

                    @forelse ($all_news as $news)
                    <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="{{ $news['image'] }}" style="object-fit: cover;">
                            
                            <div class="bg-white border border-top-0 p-4">
                                <div class="mb-2">
                                    <span class="badge badge-warning p-2 mr-2">TODAY</span>
                                    <small>{{ date('d-M, Y', strtotime($news['date'])) }}</small>
                                </div>

                                <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                                   href="{{ $news['link'] }}" target="_blank">
                                   {{ $news['title'] }}
                                </a>

                                <p>{{ $news['description'] }}</p>
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

                </div>
            </div>

        </div>
    </div>
</div>
<!-- News With Sidebar End -->
@endsection