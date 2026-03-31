@extends('frontend.layouts.frontend_master')

@section('title', 'Home')

@section('content')

<div class="container mt-4">

    <div class="row">
        <!-- HERO BESAR -->
        <div class="col-lg-8">
            <div class="card border-0">
                <img src="https://img.antaranews.com/cache/800x533/2026/03/31/IMG_3561.jpg"
                     class="card-img-top"
                     style="height:420px; object-fit:cover;">

                <div class="card-img-overlay d-flex flex-column justify-content-end"
                     style="background:linear-gradient(transparent,rgba(0,0,0,.7));">

                    <h3 class="text-white font-weight-bold">
                        <a class="text-white"
                           href="https://www.antaranews.com/berita/5502262/china-sebut-dukung-upaya-mediasi-pakistan-ke-as-dan-iran">
                            China sebut dukung upaya mediasi Pakistan ke AS dan Iran
                        </a>
                    </h3>

                    <small class="text-white">
                        2026-03-31
                    </small>

                </div>
            </div>
        </div>

        <!-- LATEST -->
        <div class="col-lg-4">
            <h5 class="font-weight-bold mb-3">Latest post</h5>

            <div class="d-flex mb-3">
                <img src="https://img.antaranews.com/cache/800x533/2026/03/31/WhatsApp-Image-2026-03-30-at-11.21.59.jpeg"
                     width="90"
                     height="70"
                     style="object-fit:cover"
                     class="rounded">

                <div class="pl-3">
                    <h6 class="mb-1">
                        <a href="https://www.antaranews.com/berita/5502250/perempuan-harus-berdaya-kemenpppa-soroti-penguatan-sdm-dan-organisasi"
                           class="text-dark">
                           Perempuan harus berdaya, KemenPPPA soroti penguatan SDM dan organisasi
                        </a>
                    </h6>

                    <small class="text-muted">
                        2026-03-31 • 5 min read
                    </small>
                </div>
            </div>

            <div class="d-flex mb-3">
                <img src="https://img.antaranews.com/cache/800x533/2026/03/30/dialog-antikorupsi-kpk-dengan-pemprov-jateng-2763542.jpg"
                     width="90"
                     height="70"
                     style="object-fit:cover"
                     class="rounded">

                <div class="pl-3">
                    <h6 class="mb-1">
                        <a href="https://www.antaranews.com/berita/5502258/kpk-fokus-awasi-tiga-sektor-rawan-korupsi-di-jawa-tengah"
                           class="text-dark">
                           KPK fokus awasi tiga sektor rawan korupsi di Jawa Tengah
                        </a>
                    </h6>

                    <small class="text-muted">
                        2026-03-31 • 10 min read
                    </small>
                </div>
            </div>

            <div class="d-flex mb-3">
                <img src="https://img.antaranews.com/cache/800x533/2026/03/25/Pembukaan-IHSG-usai-libur-Lebaran.jpg250326-Ada-2.jpg"
                     width="90"
                     height="70"
                     style="object-fit:cover"
                     class="rounded">

                <div class="pl-3">
                    <h6 class="mb-1">
                        <a href="https://www.antaranews.com/berita/5502246/ihsg-selasa-dibuka-menguat-3132-poin"
                           class="text-dark">
                           IHSG Selasa dibuka menguat 31,32 poin
                        </a>
                    </h6>

                    <small class="text-muted">
                        2026-03-31 • 15 min read
                    </small>
                </div>
            </div>

            <div class="d-flex mb-3">
                <img src="https://img.antaranews.com/cache/800x533/2026/03/31/CjkinzN000033_20260330_CBMFN0A001.jpg"
                     width="90"
                     height="70"
                     style="object-fit:cover"
                     class="rounded">

                <div class="pl-3">
                    <h6 class="mb-1">
                        <a href="https://www.antaranews.com/berita/5502242/korsel-konfirmasi-impor-perdana-nafta-rusia-sejak-konflik-timur-tengah"
                           class="text-dark">
                           Korsel konfirmasi impor perdana nafta Rusia sejak konflik timur tengah"
                        </a>
                    </h6>

                    <small class="text-muted">
                        2026-03-31 • 20 min read
                    </small>
                </div>
            </div>

        </div>
    </div>


    <!-- FOUNDERS -->
    <div class="mt-5">
    <h4 class="font-weight-bold mb-4">Founders corner</h4>

    <div class="row">

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <img src="https://img.antaranews.com/cache/800x533/2026/03/25/Rupiah-Terus-Melemah-Terhadap-Dolar-100326-Adm-3.jpg"
                     class="card-img-top"
                     style="height:200px; object-fit:cover;">

                <div class="card-body">
                    <span class="badge badge-warning mb-2">Rupiah</span>

                    <h5 class="font-weight-bold">
                        <a href="#" class="text-dark">
                            Rupiah pada Selasa pagi menguat jadi Rp16.987 per dolar AS
                        </a>
                    </h5>

                    <p class="text-muted">
                        Nilai tukar rupiah pada Selasa pagi menguat 15 poin...
                    </p>

                    <small class="text-muted">2026-03-31 • 10 min read</small>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <img src="https://img.antaranews.com/cache/800x533/2026/03/31/CjkinzN000039_20260330_CBMFN0A001.jpg"
                     class="card-img-top"
                     style="height:200px; object-fit:cover;">

                <div class="card-body">
                    <span class="badge badge-warning mb-2">Liburan</span>

                    <h5 class="font-weight-bold">
                        <a href="#" class="text-dark">
                            Proyek LMC ubah hidup warga Mekong, air bersih kini kian dekat
                        </a>
                    </h5>

                    <p class="text-muted">
                        Sebelum 2021, warga Desa Hatkeep di Provinsi Luang Prabang...
                    </p>

                    <small class="text-muted">2026-03-31 • 10 min read</small>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <img src="https://img.antaranews.com/cache/800x533/2026/03/31/372979.jpg"
                     class="card-img-top"
                     style="height:200px; object-fit:cover;">

                <div class="card-body">
                    <span class="badge badge-warning mb-2">Boxing</span>

                    <h5 class="font-weight-bold">
                        <a href="#" class="text-dark">
                            Nasukawa dan Estrada naik ring rebut peluang hadapi juara dunia WBC
                        </a>
                    </h5>

                    <p class="text-muted">
                        World Boxing Council mengumumkan Tenshin Nasukawa, Juan Francisco
                    </p>

                    <small class="text-muted">2026-03-31 • 10 min read</small>
                </div>
            </div>
        </div>

    </div>
</div>

</div>

@endsection