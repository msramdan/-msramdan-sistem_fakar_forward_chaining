<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-desktop"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ set_active('home') }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item {{ set_active('diagnosa') }}">
        <a class="nav-link" href="{{ route('diagnosa.create') }}">
            <i class="fa fa-spinner" aria-hidden="true"></i>
            <span>Diagnosa</span></a>
    </li>
    @if (Auth::user()->level == 'Admin')
        <li class="nav-item {{ set_active('rule') }}">
            <a class="nav-link" href="{{ route('rule.index') }}">
                <i class="fa fa-database" aria-hidden="true"></i>
                <span>Rule / Basis Kasus</span></a>
        </li>
        <li class="nav-item {{ set_active('gejala') }}">
            <a class="nav-link" href="{{ route('gejala.index') }}">
                <i class="fas fa-fw fa-list"></i>
                <span>Data Gejala</span></a>
        </li>
    @endif


    <li class="nav-item {{ set_active('penyakit') }}">
        <a class="nav-link" href="{{ route('penyakit.index') }}">
            <i class="fas fa-fw fa-list"></i>
            <span>Informasi Penyakit</span></a>
    </li>
    <li class="nav-item {{ set_active('diagnosa') }}">
        <a class="nav-link" href="{{ route('diagnosa.index') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Laporan Riwayat</span></a>
    </li>
    @if (Auth::user()->level == 'Admin')
        <li class="nav-item {{ set_active('users') }}">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>User</span></a>
        </li>
    @endif


    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
