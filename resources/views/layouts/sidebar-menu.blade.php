<div class="nav">
    <div class="sb-sidenav-menu-heading"></div>
    <a class="nav-link" href="{{ url('/') }}">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
        Dashboard
    </a>
    <a class="nav-link" href="{{ url('/film') }}">
        <div class="sb-nav-link-icon"><i class="bi bi-camera-reels"></i></div>
        Film
    </a>
    <a class="nav-link" href="{{ url('/teater') }}">
        <div class="sb-nav-link-icon"><i class="bi bi-cast"></i></div>
        Teater
    </a>
    <a class="nav-link" href="{{ url('/jadwal-tayang') }}">
        <div class="sb-nav-link-icon"><i class="bi bi-calendar-week"></i></div>
        Jadwal Tayang
    </a>
    <a class="nav-link" href="{{ url('/harga') }}">
        <div class="sb-nav-link-icon"><i class="bi bi-cash-stack"></i></div>
        Harga
    </a>
    <a class="nav-link" href="{{ url('/transaksi') }}">
        <div class="sb-nav-link-icon"><i class="bi bi-cart-check"></i></div>
        Transaksi
    </a>
    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
        Akun
        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
    </a>
    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link" href="{{ url('/akun/admin') }}">Admin</a>
            <a class="nav-link" href="{{ url('/akun/user') }}">User</a>
        </nav>
    </div>
</div>