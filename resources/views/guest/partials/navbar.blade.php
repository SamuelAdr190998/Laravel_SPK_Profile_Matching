<div class="card-header p-0 m-0" id="parralax-div">
    <img src="{{ URL::to('library/simpletemp/img/home1.png') }}" class="card-img" alt="navbar-img"
        style="border-radius: 0; height: 30em; width: 100%;">
    <div class="card-img-overlay d-flex justify-content-start align-items-end" style="height: 30em; width: 100%;">
        <div class="container-fluid p-0 m-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-transparent p-0 m-0">
                <div class="container-fluid">
                    <div class="navbar-brand row align-items-center">
                        <div class="col-sm-4">
                            <img src="{{ URL::to('library/simpletemp/img/kauijo150.png') }}" alt="Logo"
                                class="d-inline-block" style="height: 6.5em; width: 8em;">
                        </div>
                        <div class="col-sm-6">
                            <p class="h2 fw-bold p-0 m-0">Kos Area USU</p>
                            <p class="p-0 m-0">
                                Website Rekomendasi Rumah Kos
                            </p>
                        </div>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a href="{{ URL::to('/') }}"
                                    class="nav-link {{ Request::segment(1) == null ? 'active' : null }} text-white"
                                    style="font-size: 1.2em;">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('kriteria-kos') }}"
                                    class="nav-link {{ Request::segment(1) == 'kriteria-kos' ? 'active' : null }} text-white"
                                    style="font-size: 1.2em;">
                                    Pilih Kriteria Kos
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('tentang') }}"
                                    class="nav-link {{ Request::segment(1) == 'tentang' ? 'active' : null }} text-white"
                                    style="font-size: 1.2em;">Tentang</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('bantuan') }}"
                                    class="nav-link {{ Request::segment(1) == 'bantuan' ? 'active' : null }} text-white"
                                    style="font-size: 1.2em;">Bantuan</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

    </div>
</div>
