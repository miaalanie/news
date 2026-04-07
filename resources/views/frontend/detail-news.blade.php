@extends('frontend.layouts.frontend_master')

@section('title', $news['title'])

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-lg-8">

            {{-- 🔥 TITLE --}}
            <h2 class="font-weight-bold mb-3">
                {{ $news['title'] }}
            </h2>

            {{-- 📅 DATE --}}
            <small class="text-muted d-block mb-3">
                {{ $news['date'] }}
            </small>

            {{-- 🖼 IMAGE --}}
            <div class="mb-4">
                <img src="{{ $news['image'] ?? 'https://via.placeholder.com/800x400' }}"
                    class="img-fluid rounded shadow-sm"
                    style="width:100%; max-height:400px; object-fit:cover;">
            </div>

            {{-- 🔊 TTS --}}
            <div class="mt-3">
                <button id="playBtn" onclick="playContentTTS()" class="btn btn-success btn-sm">
                    🔊 Dengarkan
                </button>

                <button onclick="stopTTS()" class="btn btn-sm btn-danger">
                    ⛔ Stop
                </button>
            </div>

            {{-- 📝 DESCRIPTION --}}
            <p class="lead text-justify">
                {{ $news['description'] }}
            </p>

            {{-- 🧱 CONTENT HASIL SCRAPING --}}
            <div id="articleContent" class="article-content">
                {!! $content !!}
            </div>

            {{-- 🔗 SOURCE BUTTON --}}
            <div class="mt-4">
                <a href="{{ $news['link'] }}" target="_blank" class="btn btn-primary">
                    🔗 Baca Sumber Asli
                </a>
            </div>

            {{-- 🔙 BACK BUTTON --}}
            <div class="mt-3">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">
                    ⬅ Kembali
                </a>
            </div>

        </div>
    </div>

</div>


@endsection

<script>
    let voices = [];

    // pastikan voices ke-load
    function loadVoices() {
        voices = speechSynthesis.getVoices();
    }

    speechSynthesis.onvoiceschanged = loadVoices;

    function playContentTTS() {
        const btn = document.getElementById("playBtn");
        btn.innerText = "⏳ Memutar...";

        const text = document.getElementById("articleContent").innerText;

        playTTS(text);

        setTimeout(() => {
            btn.innerText = "🔊 Dengarkan";
        }, 3000);
    }

    function playTTS(text) {
        // stop dulu biar gak numpuk
        speechSynthesis.cancel();

        const speech = new SpeechSynthesisUtterance(text);

        speech.lang = "id-ID";
        speech.rate = 1;
        speech.pitch = 1;

        // 🔥 cari voice indo, kalau gak ada fallback
        let voice = voices.find(v => v.lang === "id-ID");

        if (!voice) {
            voice = voices.find(v => v.lang.startsWith("en"));
        }

        if (voice) {
            speech.voice = voice;
        }

        speech.onerror = function(e) {
            console.error("TTS error:", e);
        };

        speech.onend = function() {
            console.log("TTS selesai");
        };

        speechSynthesis.speak(speech);
    }

    function stopTTS() {
        speechSynthesis.cancel();
    }

    // load awal
    loadVoices();
</script>