<nav class="page-sidebar" data-pages="sidebar">
    <!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
    <div class="sidebar-overlay-slide from-top" id="appMenu">

    </div>
    <!-- END SIDEBAR MENU TOP TRAY CONTENT-->
    <!-- BEGIN SIDEBAR MENU HEADER-->
    <div class="sidebar-header">
        <img src="{{ asset('vendor/assets/img/logo_white.png') }}"
             alt="logo" class="brand"
             data-src="{{ asset('vendor/assets/img/logo_white.png') }}"
             data-src-retina="{{ asset('vendor/assets/img/logo_white_2x.png') }}" width="78" height="22"
        />
        <div class="sidebar-header-controls">
            <button type="button" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" data-pages-toggle="#appMenu">
                <i class="fa fa-angle-down fs-16"></i>
            </button>
            <button type="button" class="btn btn-link hidden-sm-down" data-toggle-pin="sidebar">
                <i class="fa fs-12"></i>
            </button>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu-items">
            <div class="m-t-10"></div>
            @each('layouts.includes.sidebar_item', $menus, 'menu')
        </ul>
        <div class="clearfix"></div>
    </div>
</nav>