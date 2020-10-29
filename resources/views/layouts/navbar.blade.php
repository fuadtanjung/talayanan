@extends('layouts.app')

@section('navbar')

    <!-- Main navbar -->
    <div class="navbar navbar-expand-md navbar-dark">
        <div class="navbar-brand wmin-200">
            <a href="index.html" class="d-inline-block">
                <img src="../../../../global_assets/images/logo_light.png" alt="">
            </a>
        </div>

        <div class="d-md-none">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                <i class="icon-tree5"></i>
            </button>
            <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
                <i class="icon-paragraph-justify3"></i>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                        <i class="icon-paragraph-justify3"></i>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
                        <i class="icon-bell2"></i>
                        <span class="d-md-none ml-2">Activity</span>
                        <span class="badge badge-pill badge-mark bg-orange-400 border-orange-400 ml-auto ml-md-0"></span>
                    </a>

                    <div class="dropdown-menu dropdown-content wmin-md-350">
                        <div class="dropdown-content-header">
                            <span class="font-weight-semibold">Latest activity</span>
                            <a href="#" class="text-default"><i class="icon-search4 font-size-base"></i></a>
                        </div>

                        <div class="dropdown-content-body dropdown-scrollable">
                            <ul class="media-list">
                                <li class="media">
                                    <div class="mr-3">
                                        <a href="#" class="btn bg-success-400 rounded-round btn-icon"><i class="icon-mention"></i></a>
                                    </div>

                                    <div class="media-body">
                                        <a href="#">Taylor Swift</a> mentioned you in a post "Angular JS. Tips and tricks"
                                        <div class="font-size-sm text-muted mt-1">4 minutes ago</div>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <a href="#" class="btn bg-pink-400 rounded-round btn-icon"><i class="icon-paperplane"></i></a>
                                    </div>

                                    <div class="media-body">
                                        Special offers have been sent to subscribed users by <a href="#">Donna Gordon</a>
                                        <div class="font-size-sm text-muted mt-1">36 minutes ago</div>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <a href="#" class="btn bg-blue rounded-round btn-icon"><i class="icon-plus3"></i></a>
                                    </div>

                                    <div class="media-body">
                                        <a href="#">Chris Arney</a> created a new <span class="font-weight-semibold">Design</span> branch in <span class="font-weight-semibold">Limitless</span> repository
                                        <div class="font-size-sm text-muted mt-1">2 hours ago</div>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <a href="#" class="btn bg-purple-300 rounded-round btn-icon"><i class="icon-truck"></i></a>
                                    </div>

                                    <div class="media-body">
                                        Shipping cost to the Netherlands has been reduced, database updated
                                        <div class="font-size-sm text-muted mt-1">Feb 8, 11:30</div>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <a href="#" class="btn bg-warning-400 rounded-round btn-icon"><i class="icon-comment"></i></a>
                                    </div>

                                    <div class="media-body">
                                        New review received on <a href="#">Server side integration</a> services
                                        <div class="font-size-sm text-muted mt-1">Feb 2, 10:20</div>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <a href="#" class="btn bg-teal-400 rounded-round btn-icon"><i class="icon-spinner11"></i></a>
                                    </div>

                                    <div class="media-body">
                                        <strong>January, 2018</strong> - 1320 new users, 3284 orders, $49,390 revenue
                                        <div class="font-size-sm text-muted mt-1">Feb 1, 05:46</div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="dropdown-content-footer bg-light">
                            <a href="#" class="text-grey mr-auto">All activity</a>
                            <div>
                                <a href="#" class="text-grey" data-popup="tooltip" title="Clear list"><i class="icon-checkmark3"></i></a>
                                <a href="#" class="text-grey ml-2" data-popup="tooltip" title="Settings"><i class="icon-gear"></i></a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

            <span class="badge bg-success-400 ml-md-auto mr-md-3">Active</span>

            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
                        <i class="icon-bubbles5"></i>
                        <span class="d-md-none ml-2">Messages</span>
                        <span class="badge badge-pill badge-mark bg-orange-400 border-orange-400 ml-auto ml-md-0"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
                        <div class="dropdown-content-header">
                            <span class="font-weight-semibold">Messages</span>
                            <a href="#" class="text-default"><i class="icon-compose"></i></a>
                        </div>

                        <div class="dropdown-content-body dropdown-scrollable">
                            <ul class="media-list">
                                <li class="media">
                                    <div class="mr-3 position-relative">
                                        <img src="../../../../global_assets/images/demo/users/face10.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="media-title">
                                            <a href="#">
                                                <span class="font-weight-semibold">James Alexander</span>
                                                <span class="text-muted float-right font-size-sm">04:58</span>
                                            </a>
                                        </div>

                                        <span class="text-muted">who knows, maybe that would be the best thing for me...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3 position-relative">
                                        <img src="../../../../global_assets/images/demo/users/face3.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="media-title">
                                            <a href="#">
                                                <span class="font-weight-semibold">Margo Baker</span>
                                                <span class="text-muted float-right font-size-sm">12:16</span>
                                            </a>
                                        </div>

                                        <span class="text-muted">That was something he was unable to do because...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/demo/users/face24.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-title">
                                            <a href="#">
                                                <span class="font-weight-semibold">Jeremy Victorino</span>
                                                <span class="text-muted float-right font-size-sm">22:48</span>
                                            </a>
                                        </div>

                                        <span class="text-muted">But that would be extremely strained and suspicious...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/demo/users/face4.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-title">
                                            <a href="#">
                                                <span class="font-weight-semibold">Beatrix Diaz</span>
                                                <span class="text-muted float-right font-size-sm">Tue</span>
                                            </a>
                                        </div>

                                        <span class="text-muted">What a strenuous career it is that I've chosen...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/demo/users/face25.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-title">
                                            <a href="#">
                                                <span class="font-weight-semibold">Richard Vango</span>
                                                <span class="text-muted float-right font-size-sm">Mon</span>
                                            </a>
                                        </div>

                                        <span class="text-muted">Other travelling salesmen live a life of luxury...</span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="dropdown-content-footer justify-content-center p-0">
                            <a href="#" class="bg-light text-grey w-100 py-2" data-popup="tooltip" title="Load more"><i class="icon-menu7 d-block top-0"></i></a>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown dropdown-user">
                    <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                        <img src="../../../../global_assets/images/demo/users/face11.jpg" class="rounded-circle mr-2" height="34" alt="">
                        <span>Victoria</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
                        <a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
                        <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span class="badge badge-pill bg-blue ml-auto">58</span></a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
                        <a href="#" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->


    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Dashboard</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->


    <!-- Page content -->
    <div class="page-content pt-0">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md align-self-start">

            <!-- Sidebar mobile toggler -->
            <div class="sidebar-mobile-toggler text-center">
                <a href="#" class="sidebar-mobile-main-toggle">
                    <i class="icon-arrow-left8"></i>
                </a>
                <span class="font-weight-semibold">Main sidebar</span>
                <a href="#" class="sidebar-mobile-expand">
                    <i class="icon-screen-full"></i>
                    <i class="icon-screen-normal"></i>
                </a>
            </div>
            <!-- /sidebar mobile toggler -->


            <!-- Sidebar content -->
            <div class="sidebar-content">
                <div class="card card-sidebar-mobile">

                    <!-- Header -->
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title">Navigation</h6>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                            </div>
                        </div>
                    </div>

                    <!-- User menu -->
                    <div class="sidebar-user">
                        <div class="card-body">
                            <div class="media">
                                <div class="mr-3">
                                    <a href="#"><img src="../../../../global_assets/images/demo/users/face11.jpg" width="38" height="38" class="rounded-circle" alt=""></a>
                                </div>

                                <div class="media-body">
                                    <div class="media-title font-weight-semibold">Victoria Baker</div>
                                    <div class="font-size-xs opacity-50">
                                        <i class="icon-pin font-size-sm"></i> &nbsp;Santa Ana, CA
                                    </div>
                                </div>

                                <div class="ml-3 align-self-center">
                                    <a href="#" class="text-white"><i class="icon-cog3"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /user menu -->


                    <!-- Main navigation -->
                    <div class="card-body p-0">
                        <ul class="nav nav-sidebar" data-nav-type="accordion">

                            <!-- Main -->
                            <li class="nav-item-header mt-0"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
                            <li class="nav-item">
                                <a href="index.html" class="nav-link active">
                                    <i class="icon-home4"></i>
                                    <span>
										Dashboard
										<span class="d-block font-weight-normal opacity-50">No active orders</span>
									</span>
                                </a>
                            </li>
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Layouts</span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                                    <li class="nav-item"><a href="../../../../layout_1/LTR/default/full/index.html" class="nav-link">Default layout</a></li>
                                    <li class="nav-item"><a href="../../../../layout_2/LTR/default/full/index.html" class="nav-link">Layout 2</a></li>
                                    <li class="nav-item"><a href="index.html" class="nav-link active">Layout 3</a></li>
                                    <li class="nav-item"><a href="../../../../layout_4/LTR/default/full/index.html" class="nav-link">Layout 4</a></li>
                                    <li class="nav-item"><a href="../../../../layout_5/LTR/default/full/index.html" class="nav-link">Layout 5</a></li>
                                    <li class="nav-item"><a href="../../../../layout_6/LTR/default/full/index.html" class="nav-link disabled">Layout 6 <span class="badge bg-transparent align-self-center ml-auto">Coming soon</span></a></li>
                                </ul>
                            </li>
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>Themes</span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="Themes">
                                    <li class="nav-item"><a href="index.html" class="nav-link active">Default</a></li>
                                    <li class="nav-item"><a href="../../../LTR/material/full/index.html" class="nav-link">Material</a></li>
                                    <li class="nav-item"><a href="../../../LTR/dark/full/index.html" class="nav-link">Dark</a></li>
                                    <li class="nav-item"><a href="../../../LTR/clean/full/index.html" class="nav-link disabled">Clean <span class="badge bg-transparent align-self-center ml-auto">Coming soon</span></a></li>
                                </ul>
                            </li>
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="icon-stack"></i> <span>Starter kit</span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="Starter kit">
                                    <li class="nav-item"><a href="../seed/layout_nav_horizontal.html" class="nav-link">Horizontal navigation</a></li>
                                    <li class="nav-item"><a href="../seed/sidebar_none.html" class="nav-link">No sidebar</a></li>
                                    <li class="nav-item"><a href="../seed/sidebar_main.html" class="nav-link">1 sidebar</a></li>
                                    <li class="nav-item nav-item-submenu">
                                        <a href="#" class="nav-link">2 sidebars</a>
                                        <ul class="nav nav-group-sub">
                                            <li class="nav-item"><a href="../seed/sidebar_secondary.html" class="nav-link">Secondary sidebar</a></li>
                                            <li class="nav-item"><a href="../seed/sidebar_right.html" class="nav-link">Right sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item nav-item-submenu">
                                        <a href="#" class="nav-link">3 sidebars</a>
                                        <ul class="nav nav-group-sub">
                                            <li class="nav-item"><a href="../seed/sidebar_right_hidden.html" class="nav-link">Right sidebar hidden</a></li>
                                            <li class="nav-item"><a href="../seed/sidebar_right_visible.html" class="nav-link">Right sidebar visible</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item"><a href="../seed/sidebar_sections.html" class="nav-link">Sectioned sidebar</a></li>
                                    <li class="nav-item"><a href="../seed/sidebar_stretched.html" class="nav-link">Stretched sidebar</a></li>
                                    <li class="nav-item-divider"></li>
                                    <li class="nav-item"><a href="../seed/navbar_fixed_main.html" class="nav-link">Fixed main navbar</a></li>
                                    <li class="nav-item"><a href="../seed/navbar_fixed_secondary.html" class="nav-link">Fixed secondary navbar</a></li>
                                    <li class="nav-item"><a href="../seed/navbar_fixed_both.html" class="nav-link">Both navbars fixed</a></li>
                                    <li class="nav-item"><a href="../seed/layout_boxed.html" class="nav-link">Boxed layout</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a href="../../../RTL/default/full/index.html" class="nav-link"><i class="icon-width"></i> <span>RTL version</span></a></li>
                            <!-- /main -->

                            <!-- Layout -->
                            <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Layout</div> <i class="icon-menu" title="Layout options"></i></li>
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="icon-stack2"></i> <span>Page layouts</span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="Page layouts">
                                    <li class="nav-item"><a href="layout_navbar_fixed_main.html" class="nav-link">Fixed main navbar</a></li>
                                    <li class="nav-item"><a href="layout_navbar_sticky_secondary.html" class="nav-link">Sticky secondary navbar</a></li>
                                    <li class="nav-item"><a href="layout_navbar_hideable_main.html" class="nav-link">Hideable main navbar</a></li>
                                    <li class="nav-item"><a href="layout_navbar_hideable_secondary.html" class="nav-link">Hideable secondary navbar</a></li>
                                    <li class="nav-item"><a href="layout_footer_fixed.html" class="nav-link">Fixed footer</a></li>
                                    <li class="nav-item"><a href="layout_footer_hideable.html" class="nav-link">Hideable footer</a></li>
                                    <li class="nav-item"><a href="layout_sidebar_stretched.html" class="nav-link">Stretched sidebar</a></li>
                                    <li class="nav-item"><a href="layout_without_header.html" class="nav-link">Without page header</a></li>
                                    <li class="nav-item-divider"></li>
                                    <li class="nav-item"><a href="layout_boxed_default.html" class="nav-link">Boxed with default sidebar</a></li>
                                    <li class="nav-item"><a href="layout_boxed_mini.html" class="nav-link">Boxed with mini sidebar</a></li>
                                    <li class="nav-item"><a href="layout_boxed_full.html" class="nav-link">Boxed full width</a></li>
                                    <li class="nav-item"><a href="layout_boxed_content.html" class="nav-link">Boxed content</a></li>
                                </ul>
                            </li>
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="icon-page-break2"></i> <span>Headers &amp; footers</span></a>
                                <ul class="nav nav-group-sub" data-submenu-title="Content styling">
                                    <li class="nav-item"><a href="content_page_header.html" class="nav-link">Page header</a></li>
                                    <li class="nav-item"><a href="content_page_footer.html" class="nav-link disabled">Page footer <span class="badge bg-transparent align-self-center ml-auto">Coming soon</span></a></li>
                                </ul>
                            </li>
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="icon-indent-decrease2"></i> <span>Sidebars</span></a>
                                <ul class="nav nav-group-sub" data-submenu-title="Sidebars">
                                    <li class="nav-item nav-item-submenu">
                                        <a href="#" class="nav-link">Main sidebar</a>
                                        <ul class="nav nav-group-sub">
                                            <li class="nav-item"><a href="sidebar_default_collapse.html" class="nav-link">Default collapsible</a></li>
                                            <li class="nav-item"><a href="sidebar_default_hide.html" class="nav-link">Default hideable</a></li>
                                            <li class="nav-item"><a href="sidebar_default_hidden.html" class="nav-link">Default hidden</a></li>
                                            <li class="nav-item"><a href="sidebar_mini_collapse.html" class="nav-link">Mini collapsible</a></li>
                                            <li class="nav-item"><a href="sidebar_mini_hide.html" class="nav-link">Mini hideable</a></li>
                                            <li class="nav-item"><a href="sidebar_mini_hidden.html" class="nav-link">Mini hidden</a></li>
                                            <li class="nav-item-divider"></li>
                                            <li class="nav-item"><a href="sidebar_default_sections.html" class="nav-link">Sectioned sidebar</a></li>
                                            <li class="nav-item"><a href="sidebar_default_stretched.html" class="nav-link">Stretched sidebar</a></li>
                                            <li class="nav-item"><a href="sidebar_default_color_dark.html" class="nav-link">Dark color</a></li>
                                            <li class="nav-item"><a href="sidebar_default_color_custom.html" class="nav-link">Custom color</a></li>
                                            <li class="nav-item"><a href="sidebar_default_color_sections_custom.html" class="nav-link">Custom sections color</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item nav-item-submenu">
                                        <a href="#" class="nav-link">Secondary sidebar</a>
                                        <ul class="nav nav-group-sub">
                                            <li class="nav-item"><a href="sidebar_secondary_after.html" class="nav-link">After default</a></li>
                                            <li class="nav-item"><a href="sidebar_secondary_before.html" class="nav-link">Before default</a></li>
                                            <li class="nav-item"><a href="sidebar_secondary_hidden.html" class="nav-link">Hidden by default</a></li>
                                            <li class="nav-item-divider"></li>
                                            <li class="nav-item"><a href="sidebar_secondary_sections.html" class="nav-link">Sectioned sidebar</a></li>
                                            <li class="nav-item"><a href="sidebar_secondary_stretched.html" class="nav-link">Stretched sidebar</a></li>
                                            <li class="nav-item"><a href="sidebar_secondary_color_dark.html" class="nav-link">Dark color</a></li>
                                            <li class="nav-item"><a href="sidebar_secondary_color_custom.html" class="nav-link">Custom color</a></li>
                                            <li class="nav-item"><a href="sidebar_secondary_color_sections_custom.html" class="nav-link">Custom sections color</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item nav-item-submenu">
                                        <a href="#" class="nav-link">Right sidebar</a>
                                        <ul class="nav nav-group-sub">
                                            <li class="nav-item"><a href="sidebar_right_default_collapse.html" class="nav-link">Show - collapse main</a></li>
                                            <li class="nav-item"><a href="sidebar_right_default_hide.html" class="nav-link">Show - hide main</a></li>
                                            <li class="nav-item"><a href="sidebar_right_default_toggle.html" class="nav-link">Show - fix default width</a></li>
                                            <li class="nav-item"><a href="sidebar_right_mini_toggle.html" class="nav-link">Show - fix mini width</a></li>
                                            <li class="nav-item"><a href="sidebar_right_secondary_hide.html" class="nav-link">Show - hide secondary</a></li>
                                            <li class="nav-item"><a href="sidebar_right_visible.html" class="nav-link">Visible by default</a></li>
                                            <li class="nav-item-divider"></li>
                                            <li class="nav-item"><a href="sidebar_right_sections.html" class="nav-link">Sectioned sidebar</a></li>
                                            <li class="nav-item"><a href="sidebar_right_stretched.html" class="nav-link">Stretched sidebar</a></li>
                                            <li class="nav-item"><a href="sidebar_right_color_dark.html" class="nav-link">Dark color</a></li>
                                            <li class="nav-item"><a href="sidebar_right_color_custom.html" class="nav-link">Custom color</a></li>
                                            <li class="nav-item"><a href="sidebar_right_color_sections_custom.html" class="nav-link">Custom sections color</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item-divider"></li>
                                    <li class="nav-item"><a href="sidebar_components.html" class="nav-link">Sidebar components</a></li>
                                </ul>
                            </li>
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="icon-menu3"></i> <span>Navbars</span></a>
                                <ul class="nav nav-group-sub" data-submenu-title="Navbars">
                                    <li class="nav-item nav-item-submenu">
                                        <a href="#" class="nav-link">Single navbar</a>
                                        <ul class="nav nav-group-sub">
                                            <li class="nav-item"><a href="navbar_single_top_static.html" class="nav-link">Single top static</a></li>
                                            <li class="nav-item"><a href="navbar_single_top_fixed.html" class="nav-link">Single top fixed</a></li>
                                            <li class="nav-item"><a href="navbar_single_bottom_static.html" class="nav-link">Single bottom static</a></li>
                                            <li class="nav-item"><a href="navbar_single_bottom_fixed.html" class="nav-link">Single bottom fixed</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item nav-item-submenu">
                                        <a href="#" class="nav-link">Multiple navbars</a>
                                        <ul class="nav nav-group-sub">
                                            <li class="nav-item"><a href="navbar_multiple_top_static.html" class="nav-link">Multiple top static</a></li>
                                            <li class="nav-item"><a href="navbar_multiple_top_fixed.html" class="nav-link">Multiple top fixed</a></li>
                                            <li class="nav-item"><a href="navbar_multiple_bottom_static.html" class="nav-link">Multiple bottom static</a></li>
                                            <li class="nav-item"><a href="navbar_multiple_bottom_fixed.html" class="nav-link">Multiple bottom fixed</a></li>
                                            <li class="nav-item"><a href="navbar_multiple_top_bottom.html" class="nav-link">Multiple - top and bottom</a></li>
                                            <li class="nav-item"><a href="navbar_multiple_secondary_sticky.html" class="nav-link">Multiple - secondary sticky</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item nav-item-submenu">
                                        <a href="#" class="nav-link">Content navbar</a>
                                        <ul class="nav nav-group-sub">
                                            <li class="nav-item"><a href="navbar_component_single.html" class="nav-link">Single navbar</a></li>
                                            <li class="nav-item"><a href="navbar_component_multiple.html" class="nav-link">Multiple navbars</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item-divider"></li>
                                    <li class="nav-item"><a href="navbar_colors.html" class="nav-link">Color options</a></li>
                                    <li class="nav-item"><a href="navbar_sizes.html" class="nav-link">Sizing options</a></li>
                                    <li class="nav-item"><a href="navbar_hideable.html" class="nav-link">Hide on scroll</a></li>
                                    <li class="nav-item"><a href="navbar_components.html" class="nav-link">Navbar components</a></li>
                                </ul>
                            </li>
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="icon-sort"></i> <span>Vertical navigation</span></a>
                                <ul class="nav nav-group-sub" data-submenu-title="Vertical navigation">
                                    <li class="nav-item"><a href="navigation_vertical_collapsible.html" class="nav-link">Collapsible menu</a></li>
                                    <li class="nav-item"><a href="navigation_vertical_accordion.html" class="nav-link">Accordion menu</a></li>
                                    <li class="nav-item"><a href="navigation_vertical_bordered.html" class="nav-link">Bordered navigation</a></li>
                                    <li class="nav-item"><a href="navigation_vertical_right_icons.html" class="nav-link">Right icons</a></li>
                                    <li class="nav-item"><a href="navigation_vertical_badges.html" class="nav-link">Badges</a></li>
                                    <li class="nav-item"><a href="navigation_vertical_disabled.html" class="nav-link">Disabled items</a></li>
                                </ul>
                            </li>
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="icon-transmission"></i> <span>Horizontal navigation</span></a>
                                <ul class="nav nav-group-sub" data-submenu-title="Horizontal navigation">
                                    <li class="nav-item"><a href="navigation_horizontal_click.html" class="nav-link">Submenu on click</a></li>
                                    <li class="nav-item"><a href="navigation_horizontal_hover.html" class="nav-link">Submenu on hover</a></li>
                                    <li class="nav-item"><a href="navigation_horizontal_elements.html" class="nav-link">With custom elements</a></li>
                                    <li class="nav-item"><a href="navigation_horizontal_tabs.html" class="nav-link">Tabbed navigation</a></li>
                                    <li class="nav-item"><a href="navigation_horizontal_disabled.html" class="nav-link">Disabled navigation links</a></li>
                                    <li class="nav-item"><a href="navigation_horizontal_mega.html" class="nav-link">Horizontal mega menu</a></li>
                                </ul>
                            </li>
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="icon-tree5"></i> <span>Menu levels</span></a>
                                <ul class="nav nav-group-sub" data-submenu-title="Menu levels">
                                    <li class="nav-item"><a href="#" class="nav-link"><i class="icon-IE"></i> Second level</a></li>
                                    <li class="nav-item nav-item-submenu">
                                        <a href="#" class="nav-link"><i class="icon-firefox"></i> Second level with child</a>
                                        <ul class="nav nav-group-sub">
                                            <li class="nav-item"><a href="#" class="nav-link"><i class="icon-android"></i> Third level</a></li>
                                            <li class="nav-item nav-item-submenu">
                                                <a href="#" class="nav-link"><i class="icon-apple2"></i> Third level with child</a>
                                                <ul class="nav nav-group-sub">
                                                    <li class="nav-item"><a href="#" class="nav-link"><i class="icon-html5"></i> Fourth level</a></li>
                                                    <li class="nav-item"><a href="#" class="nav-link"><i class="icon-css3"></i> Fourth level</a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-item"><a href="#" class="nav-link"><i class="icon-windows"></i> Third level</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item"><a href="#" class="nav-link"><i class="icon-chrome"></i> Second level</a></li>
                                </ul>
                            </li>
                            <!-- /layout -->

                        </ul>
                    </div>
                    <!-- /main navigation -->

                </div>
            </div>
            <!-- /sidebar content -->

        </div>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">
                @yield('content')
            </div>

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->


    <!-- Footer -->
    <div class="navbar navbar-expand-lg navbar-light">
        <div class="text-center d-lg-none w-100">
            <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                <i class="icon-unfold mr-2"></i>
                Footer
            </button>
        </div>

        <div class="navbar-collapse collapse" id="navbar-footer">
			<span class="navbar-text">
				&copy; 2015 - 2018. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
			</span>

            <ul class="navbar-nav ml-lg-auto">
                <li class="nav-item"><a href="https://kopyov.ticksy.com/" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
                <li class="nav-item"><a href="http://demo.interface.club/limitless/docs/" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Docs</a></li>
                <li class="nav-item"><a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="navbar-nav-link font-weight-semibold"><span class="text-pink-400"><i class="icon-cart2 mr-2"></i> Purchase</span></a></li>
            </ul>
        </div>
    </div>
    <!-- /footer -->
@endsection