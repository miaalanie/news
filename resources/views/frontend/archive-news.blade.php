@extends('frontend.layouts.frontend_master')

@section('title', 'All News')

@section('content')

<div class="container mt-5">

    @php
    $hero = $all_news->first();
    $latest = $all_news->slice(1, 4);
    $others = $all_news->slice(5);
    @endphp

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
                        <a class="text-white tts-title" href="{{ $hero['link'] }}" target="_blank">
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
                       <a href="{{ route('detail', $news['slug'] ?? $news->news_slug ?? '#') }}" class="text-dark tts-title">
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
                        <a href="{{ route('detail', $news['slug'] ?? $news->news_slug ?? '#') }}" class="text-dark">
                            {{ \Illuminate\Support\Str::limit($news['title'], 60) }}
                        </a>
                    </h5>

                    <p class="text-muted">
                        {{ \Illuminate\Support\Str::limit($news['description'], 100) }}
                    </p>

                    <small class="text-muted">
                        {{ $news['date'] }}
                    </small>

                    {{-- 🔊 TTS --}}
                    <div class="mt-3">
                        <button
                            onclick="playTTS(`{{ addslashes($news['title'] . '. ' . $news['description']) }}`)"
                            class="btn btn-sm btn-success">
                            🔊 Dengarkan
                        </button>

                        <button onclick="stopTTS()" class="btn btn-sm btn-danger">
                            ⛔ Stop
                        </button>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

@endsection

<script>
    function playTTS(text) {
        const speech = new SpeechSynthesisUtterance(text);

        speech.lang = "id-ID"; // bahasa Indonesia
        speech.rate = 1; // kecepatan
        speech.pitch = 1;

        // ambil voice Indonesia kalau ada
        const voices = speechSynthesis.getVoices();
        const indoVoice = voices.find(v => v.lang === "id-ID");

        if (indoVoice) {
            speech.voice = indoVoice;
        }

        // stop suara sebelumnya
        window.speechSynthesis.cancel();

        // mulai bicara
        window.speechSynthesis.speak(speech);
    }

    function stopTTS() {
        window.speechSynthesis.cancel();
    }
</script>