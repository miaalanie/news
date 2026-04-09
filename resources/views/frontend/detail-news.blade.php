@extends('frontend.layouts.frontend_master')

@section('title', $news['title'])

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-lg-9 col-xl-8">

            {{-- 🔥 TITLE --}}
            <h1 style="font-weight:700; font-size:32px; line-height:1.3; margin-bottom:10px;">
                {{ $news['title'] }}
            </h1>

            {{-- 📅 DATE --}}
            <small style="color:#888; display:block; margin-bottom:20px;">
                {{ $news['date'] }}
            </small>

            {{-- 🖼 IMAGE --}}
            <div style="margin-bottom:25px;">
                <img src="{{ $news['image'] ?? 'https://via.placeholder.com/800x400' }}"
                    style="width:100%; max-height:420px; object-fit:cover; border-radius:10px;">
            </div>

            {{-- 🔊 TTS --}}
            <div style="margin-bottom:25px; display:flex; gap:10px;">
                <button id="playBtn" onclick="playContentTTS()"
                    style="background:#28a745; color:white; border:none; padding:6px 14px; border-radius:5px; font-size:14px;">
                    🔊 Dengarkan
                </button>

                <button onclick="stopTTS()"
                    style="background:#dc3545; color:white; border:none; padding:6px 14px; border-radius:5px; font-size:14px;">
                    ⛔ Stop
                </button>
            </div>

            <hr style="margin:30px 0;">

            {{-- 🧱 CONTENT HASIL SCRAPING --}}
            <div id="articleContent" style="font-size:16px; line-height:1.8; color:#444;">
                {!! $content !!}
            </div>

            {{-- 🔗 SOURCE BUTTON --}}
            <div style="margin-top:40px;">
                <a href="{{ $news['link'] }}" target="_blank"
                    style="background:#ffc107; color:#000; padding:10px 20px; border-radius:6px; text-decoration:none; font-weight:500;">
                    🔗 Baca Sumber Asli
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