@extends('frontend.layouts.frontend_master')

@section('title', 'All News')

@section('content')

<div class="container mt-5">

    @if($all_news && count($all_news) > 0)

    @php
    $all_news = collect($all_news);
    $hero = $all_news->first();
    $latest = $all_news->slice(1, 4);
    $others = $all_news->slice(5);
    @endphp

    {{-- tampilkan data seperti biasa --}}

    @else

    {{-- tampilkan halaman kosong --}}
    @include('errors.402')

    @endif

    {{-- 🔥 HERO + SIDEBAR --}}
    <div class="row">

        {{-- HERO --}}
        <div class="col-lg-8">
            @if($hero)
            <div class="card border-0">
                <img src="{{ $hero['image'] ?? 'https://via.placeholder.com/800x400' }}"
                    class="card-img-top"
                    style="height:420px; object-fit:cover;">

                <div class="card-img-overlay d-flex flex-column justify-content-end"
                    style="background:linear-gradient(transparent,rgba(0,0,0,.7));">

                    <h3 class="text-white font-weight-bold">
                        <a class="text-white tts-title"
                            href="{{ route('detail', $hero['slug'] ?? '#') }}"
                            target="_blank"
                            onmouseenter="playTTS(`{{ addslashes($hero['title']) }}`)"
                            onmouseleave="stopTTS()">
                            {{ $hero['title'] }}
                        </a>
                    </h3>

                    <small class="text-white">
                        {{ $hero['date'] }}
                    </small>

                </div>
            </div>
            @endif
        </div>

        {{-- SIDEBAR --}}
        <div class="col-lg-4">
            <h5 class="font-weight-bold mb-3">Latest post</h5>

            @foreach($latest as $news)
            <div class="d-flex mb-3">

                <img src="{{ $news['image'] ?? 'https://via.placeholder.com/90x70' }}"
                    width="90"
                    height="70"
                    style="object-fit:cover"
                    class="rounded">

                <div class="pl-3">
                    <h6 class="mb-1">
                        <a href="{{ route('detail', $news['slug'] ?? $news->news_slug ?? '#') }}"
                            class="text-dark tts-title"
                            target="_blank"
                            onmouseenter="playTTS(`{{ addslashes($news['title']) }}`)"
                            onmouseleave="stopTTS()">
                            {{ \Illuminate\Support\Str::limit($news['title'], 60) }}
                        </a>
                    </h6>

                    <small class="text-muted">
                        {{ $news['date'] }}
                    </small>
                </div>

            </div>
            @endforeach
        </div>

    </div>

    {{-- 🧱 GRID NEWS --}}
    <div class="row mt-5">
        @foreach($others as $news)
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm mb-4">

                <img src="{{ $news['image'] ?? 'https://via.placeholder.com/350x200' }}"
                    class="card-img-top"
                    style="height:200px; object-fit:cover;">

                <div class="card-body">

                    <h5 class="font-weight-bold">
                        <a href="{{ route('detail', $news['slug'] ?? $news->news_slug ?? '#') }}"
                            class="text-dark tts-title"
                            target="_blank"
                            onmouseenter="playTTS(`{{ addslashes($news['title'] . '. ' . $news['description']) }}`)"
                            onmouseleave="stopTTS()">
                            {{ \Illuminate\Support\Str::limit($news['title'], 60) }}
                        </a>
                    </h5>

                    <p class="text-muted">
                        {{ \Illuminate\Support\Str::limit($news['description'], 100) }}
                    </p>

                    <small class="text-muted">
                        {{ $news['date'] }}
                    </small>

                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

@endsection


<script>
    let ttsTimeout;

    function playTTS(text) {
        clearTimeout(ttsTimeout);

        ttsTimeout = setTimeout(() => {
            window.speechSynthesis.cancel();

            const speech = new SpeechSynthesisUtterance(text);
            speech.lang = "id-ID";
            speech.rate = 1;
            speech.pitch = 1;

            const voices = speechSynthesis.getVoices();
            const indo = voices.find(v => v.lang.includes("id"));

            if (indo) {
                speech.voice = indo;
            }

            window.speechSynthesis.speak(speech);
        }, 300); // delay biar gak terlalu sensitif
    }

    function stopTTS() {
        clearTimeout(ttsTimeout);
        window.speechSynthesis.cancel();
    }
</script>