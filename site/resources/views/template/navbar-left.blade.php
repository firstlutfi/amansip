<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        
        <ul class="page-sidebar-menu page-sidebar-menu-light page-header-fixed" data-keep-expanded="true" data-auto-scroll="false" data-slide-speed="200" data-height="auto" data-initialized="1" style="overflow: hidden; width: auto; height: auto;">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <!-- <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li> -->
            <!-- END SIDEBAR TOGGLER BUTTON -->
            <li class="heading">
                <h3 class="uppercase">MENU</h3>
            </li>
            <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-envelope"></i>
                    <span class="title">Surat</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="{{ route('surat-masuk') }}" class="nav-link ">
                            <i class="icon-arrow-down"></i>
                            <span class="title">Surat Masuk</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{ route('surat-keluar') }}" class="nav-link ">
                            <i class="icon-arrow-up"></i>
                            <span class="title">Surat Keluar</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="page_general_blog_post.html" class="nav-link ">
                    <i class="icon-list"></i>
                    <span class="title"> Rencana </span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="page_general_blog_post.html" class="nav-link ">
                    <i class="icon-note"></i>
                    <span class="title"> Kegiatan </span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="page_general_blog_post.html" class="nav-link ">
                    <i class="icon-graduation"></i>
                    <span class="title"> Produk Hukum </span>
                </a>
            </li>
            <li class="heading">
                <h3 class="uppercase">PROFIL</h3>
            </li>
            <li class="nav-item  ">
                <a href="page_general_blog_post.html" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title"> Profil Saya </span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ route('logout') }}" class="nav-link ">
                    <i class="icon-logout"></i>
                    <span class="title"> Logout </span>
                </a>
            </li>
        </ul>
        
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->