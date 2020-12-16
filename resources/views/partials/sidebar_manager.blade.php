<aside class="main-sidebar sidebar-dark-primary elevation-5" style="background-color: rgb(109, 57, 143)">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('/style/dist/img/logo3.png')}}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
        <span class="brand-text font-weight-light"><b>Dashboard Manager </b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- 1 -->
                <li class="nav-item">
                    <a href="/manager" class="nav-link" action="">
                        <i class="nav-icon fas fa-home"></i>
                        <p> Dashboard </p>
                    </a>
                </li>

                <!-- 2  -->
                <li class="nav-item">
                    <a href="/manager/daftar_ruang" class="nav-link">
                        <i class="nav-icon fas fa-map-marker-alt"></i>
                        <p> Daftar Ruangan </p>
                    </a>
                </li>

                <!-- 3  -->
                <li class="nav-item">
                    <a href="/manager/daftar_cs" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p> Daftar CS </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
