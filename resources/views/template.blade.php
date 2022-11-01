<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap');
    </style>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    {{-- <link rel="stylesheet" href="{{ asset('/css/tw.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('/css/nav.css') }}">
    @vite('resources/css/app.css')

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body id="body" class="bg-green-100 @if (Cookie::get('shrink') == true) shrink @endif">

    <nav>
        <div class="sidebar-top">
          <span class="shrink-btn" id="shrinkel">
            <i class='bx bx-chevron-left'></i>
          </span>
          
          <h3 class="hide">Koperasi Ruge</h3>
        </div>
    
        <div class="sidebar-links" style="margin-top: 2rem;">
          <ul>
            <div class="active-tab" style="
            {{ (request()->is('angg*')) ? 'top: 60.5px;' : '' }}
            {{ (request()->is('jen*')) ? 'top: 118.5px;' : '' }}
            {{ (request()->is('simp*')) ? 'top: 176.5px;' : '' }}
            {{ (request()->is('pinj*')) ? 'top: 234.5px;' : '' }}
            {{ (request()->is('dpin*')) ? 'top: 292.5px;' : '' }}
            {{ (request()->is('peng*')) ? 'top: 350.5px;' : '' }}
            "></div>
            <li class="tooltip-element" data-tooltip="0" id="sidemenu">
                <a href="/" class="{{ (request()->is('/')) ? 'active' : '' }}" data-active="0">
                  <div class="icon">
                    <i class='bx bx-home'></i>
                    <i class='bx bxs-home'></i>
                  </div>
                  <span class="link hide">Home</span>
                </a>
              </li>
            <li class="tooltip-element" data-tooltip="1" id="sidemenu">
              <a href="{{ route('angg.index') }}" class="{{ (request()->is('angg*')) ? 'active' : '' }}" data-active="1">
                <div class="icon">
                  <i class='bx bx-user-pin' ></i>
                  <i class='bx bxs-user-pin' ></i>
                </div>
                <span class="link hide">Anggota</span>
              </a>
            </li>
            <li class="tooltip-element" data-tooltip="2" id="sidemenu">
              <a href="{{ route('jen.index') }}" class="{{ (request()->is('jen*')) ? 'active' : '' }}"  data-active="2">
                <div class="icon">
                  <i class='bx bx-grid'></i>
                  <i class='bx bxs-grid'></i>
                </div>
                <span class="link hide">Jenis Simpanan</span>
              </a>
            </li>
            <li class="tooltip-element" data-tooltip="3" id="sidemenu">
              <a href="{{ route('simp.index') }}" class="{{ (request()->is('simp*')) ? 'active' : '' }}" data-active="3">
                <div class="icon">
                  <i class='bx bx-donate-heart'></i>
                  <i class='bx bxs-donate-heart'></i>
                </div>
                <span class="link hide">Simpanan</span>
              </a>
            </li>
            <li class="tooltip-element" data-tooltip="4" id="sidemenu">
              <a href="{{ route('pinj.index') }}" class="{{ (request()->is('pinj*')) ? 'active' : '' }}" data-active="4">
                <div class="icon">
                  <i class='bx bx-wallet-alt' ></i>
                  <i class='bx bxs-wallet-alt' ></i>
                </div>
                <span class="link hide">Pinjaman</span>
              </a>
            </li>
            <li class="tooltip-element" data-tooltip="5" id="sidemenu">
                <a href="{{ route('dpin.index') }}" class="{{ (request()->is('dpin*')) ? 'active' : '' }}" data-active="5">
                  <div class="icon">
                    <i class='bx bx-dollar-circle'></i>
                    <i class='bx bxs-dollar-circle'></i>
                  </div>
                  <span class="link hide">Bayar Pinjaman</span>
                </a>
              </li>
              <li class="tooltip-element" data-tooltip="6" id="sidemenu">
                <a href="{{ route('peng.index') }}" class="{{ (request()->is('peng*')) ? 'active' : '' }}" data-active="6">
                  <div class="icon">
                    <i class='bx bx-wallet' ></i>
                    <i class='bx bxs-wallet' ></i>
                  </div>
                  <span class="link hide">Pengambilan</span>
                </a>
              </li>
            <div class="tooltip">
              <span class="show">Home</span>
              <span>Anggota</span>
              <span>Jenis Simpanan</span>
              <span>Simpanan</span>
              <span>Pinjaman</span>
              <span>Bayar Pinjaman</span>
              <span>Pengambilan</span>
            </div>
          </ul>
        </div>
    
        <div class="sidebar-footer">
          <a href="#" class="account tooltip-element" data-tooltip="0">
            <i class='bx bx-user'></i>
          </a>
          <div class="admin-user tooltip-element" data-tooltip="1">
            <div class="admin-profile hide">
              <div class="admin-info">
                <h3>Ruge</h3>
                {{-- <h5>Admin</h5> --}}
              </div>
            </div>
            <a href="#" class="log-out">
              <i class='bx bx-log-out'></i>
            </a>
          </div>
          <div class="tooltip">
            <span class="show">Ruge</span>
            <span>Logout</span>
          </div>
        </div>
    </nav>

    <main id="main">
        @yield('content')
    </main>
</body>
<script src="{{asset('js/nav.js')}}"></script>
<script>
$("#shrinkel").on('click', function() {
    let data = {name: "shrink", value: true};

    if ($('#body').hasClass('shrink')) {
        data.value = true;
    } else {
        data.value = false;
    }

    axios.post('/set-cookie', data);
});
</script>
</html>