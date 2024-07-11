<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="logo-icon">
            <img src="{{ asset('backend/assets/images/beeicon.png') }}" class="logo-img" alt="">
        </div>
        <div class="logo-name flex-grow-1">
            <h5 class="mb-0">Habits Hive</h5>
        </div>
        <div class="sidebar-close">
            <span class="material-icons-outlined">close</span>
        </div>
    </div>
    <div class="sidebar-nav">
        <!--navigation-->
        <ul class="metismenu" id="sidenav">
            <li class="menu-label">Home</li>
            <li>
                <a href="{{ route('user.home') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">home</i>
                    </div>
                    <div class="menu-title">Welcome</div>
                </a>
            </li>

            <li class="menu-label">Data Tabel</li>

            <li>
                <a href="{{ route('catatan.index') }}" class="menu-link">
                    <div class="parent-icon"><i class="material-icons-outlined">note</i>
                    </div>
                    <div class="menu-title">Catatan</div>
                </a>
            </li>

            <li>
                <a href="{{ route('pengingat.index')}}">
                    <div class="parent-icon"><i class="material-icons-outlined">schedule</i>
                    </div>
                    <div class="menu-title">Pengingat</div>
                </a>
            </li>
        </ul>
        <!--end navigation-->
    </div>
</aside>
