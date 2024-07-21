<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('env') }}/sawit.png" class="rounded" width="30px" srcset="">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">PalmSisfo</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="/dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
      

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx bxs-user"></i>
              <div data-i18n="Account Settings">Karyawan & Gaji</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('karyawans') ? 'active' : '' }}">
                    <a href="/karyawans" class="menu-link">
                        <div data-i18n="Analytics">Karyawan</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('gaji_karyawan') ? 'active' : '' }}">
                    <a href="/gaji_karyawan" class="menu-link">
                        <div data-i18n="Analytics">Gaji Kariawan</div>
                    </a>
                </li>
            </ul>
          </li>
        <li class="menu-item {{ Request::is('hargabeli') ? 'active' : '' }}">
            <a href="/hargabeli" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dollar-circle"></i>
                <div data-i18n="Analytics">Harga Beli</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('hargajual') ? 'active' : '' }}">
            <a href="/hargajual" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-dollar-circle"></i>
                <div data-i18n="Analytics">Harga Jual</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('pembelian') ? 'active' : '' }}">
            <a href="/pembelian" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-log-in-circle"></i>
                <div data-i18n="Analytics">Pembelian</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('penjualan') ? 'active' : '' }}">
            <a href="/penjualan" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-log-out-circle"></i>
                <div data-i18n="Analytics">Penjualan</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('penggajian') ? 'active' : '' }}">
            <a href="/penggajian" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dollar"></i>
                <div data-i18n="Analytics">Gaji Karyawan</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('laporan') ? 'active' : '' }}">
            <a href="/laporan" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-report"></i>
                <div data-i18n="Analytics">Laporan</div>
            </a>
        </li>
       

     
    </ul>
</aside>
