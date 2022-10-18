<div id="layoutSidenav_nav">
    <style>
        .sb-sidenav-dark {
            --bs-bg-opacity: 1;
            background-color: rgba(var(--bs-light-rgb), var(--bs-bg-opacity)) !important;
            color: rgba(0, 0, 0, 1);
        }

        .sb-sidenav-dark .sb-sidenav-menu .nav-link.active {
            font-weight: bolder;
            background-color: rgba(var(--bs-info-rgb), .3);
        }
    </style>
    <nav class="sb-sidenav sb-sidenav-dark">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="mt-3"></div>
                <a class="nav-link text-info {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}"
                    href="{{ URL::to('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt text-info"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading text-info">Master Data</div>
                <a class="nav-link text-info {{ Request::segment(1) == 'aspek-penilaian' ? 'active' : '' }}"
                    href="{{ URL::to('aspek-penilaian') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list text-info"></i></div>
                    Aspek Penilaian
                </a>
                <a class="nav-link text-info {{ Request::segment(1) == 'data-alternatif' ? 'active' : '' }}"
                    href="{{ URL::to('data-alternatif') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-list text-info"></i></div>
                    Data Alternatif
                </a>
                <a class="nav-link text-info {{ Request::segment(1) == 'kriteria-penilaian' ? 'active' : '' }}"
                    href="{{ URL::to('kriteria-penilaian') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-folder-open text-info"></i></div>
                    Kriteria Penilaian
                </a>
                <a class="nav-link text-info {{ Request::segment(1) == 'subkriteria-penilaian' ? 'active' : '' }}"
                    href="{{ URL::to('subkriteria-penilaian') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-folder-tree text-info"></i></div>
                    Subkriteria Penilaian
                </a>
                <a class="nav-link text-info {{ Request::segment(1) == 'pedoman-gap' ? 'active' : '' }}"
                    href="{{ URL::to('pedoman-gap') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-book-open text-info"></i></div>
                    Pedoman GAP
                </a>
                <a class="nav-link text-info {{ Request::segment(1) == 'data-penilaian' ? 'active' : '' }}"
                    href="{{ URL::to('data-penilaian') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-paste text-info"></i></div>
                    Data Penilaian
                </a>
                <a class="nav-link text-info {{ Request::segment(1) == 'hasil-penilaian' ? 'active' : '' }}"
                    href="{{ URL::to('hasil-penilaian') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-poll-h text-info"></i></div>
                    Hasil Penilaian
                </a>
            </div>
        </div>
    </nav>
</div>
