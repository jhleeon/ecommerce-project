<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Starlight Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="{{ asset('backend') }}/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">

    {{-- select2 & Data Table --}}
    <link href="{{ asset('backend') }}/lib/highlightjs/github.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/select2/css/select2.min.css" rel="stylesheet">

    {{-- summer Note --}}
    <link href="{{ asset('backend') }}/lib/medium-editor/medium-editor.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/medium-editor/default.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/summernote/summernote-bs4.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('backend') }}/css/starlight.css">
</head>

<body>

    @guest
    
    @else
        <!-- ########## START: LEFT PANEL ########## -->
        <div class="sl-logo"><a href="{{ route('admin.home') }}"><i class="icon ion-android-star-outline"></i>Admin Pannel</a></div>
        <div class="sl-sideleft">
            <div class="input-group input-group-search">
                <input type="search" name="search" class="form-control" placeholder="Search">
                <span class="input-group-btn">
                    <button class="btn"><i class="fa fa-search"></i></button>
                </span><!-- input-group-btn -->
            </div><!-- input-group -->

            <label class="sidebar-label">Navigation</label>
            
            <div class="sl-sideleft-menu">
                <a href="{{ route('admin.home') }}" class="sl-menu-link @yield('dashboard-active')">
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                        <span class="menu-item-label">Dashboard</span>
                    </div><!-- menu-item -->

                </a><!-- sl-menu-link -->
                <a href="{{ route('index') }}" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                        <span class="menu-item-label">Visit Site</span>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->

                <a href="{{ route('category.index') }}" class="sl-menu-link @yield('categories-active')" >
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                        <span class="menu-item-label">Categories</span>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->

                <a href="{{ route('brand.index') }}" class="sl-menu-link @yield('brands-active')" >
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                        <span class="menu-item-label">Brands</span>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->
            

                <a href="#" class="sl-menu-link @yield('products-active')">
                    <div class="sl-menu-item">
                        <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
                        <span class="menu-item-label">Products</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item "><a href="{{ route('product.create') }}" class="nav-link @yield('add-products-active')">Add Product</a></li>
                    <li class="nav-item"><a href="{{ route('product.manage') }}" class="nav-link @yield('manage-products-active')">Manage Product</a></li>
    
                </ul>
                
                <a href="{{ route('cupon.index') }}" class="sl-menu-link @yield('cupons-active')" >
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                        <span class="menu-item-label">Cupon</span>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->

                <a href="{{ route('order.index') }}" class="sl-menu-link @yield('orders-active')" >
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                        <span class="menu-item-label">Order</span>
                    </div>
                </a>
            </div>
            <br>
        </div><!-- sl-sideleft -->
        <!-- ########## END: LEFT PANEL ########## -->

        <!-- ########## START: HEAD PANEL ########## -->
        <div class="sl-header">
            <div class="sl-header-left">
                <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i
                            class="icon ion-navicon-round"></i></a></div>
                <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i
                            class="icon ion-navicon-round"></i></a></div>
            </div><!-- sl-header-left -->
            <div class="sl-header-right">
                <nav class="nav">
                    <div class="dropdown">
                        <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                            <span class="logged-name">{{ Auth::user()->name ?? ' ' }}</span>
                            <img src="{{ asset('backend') }}/img/img3.jpg" class="wd-32 rounded-circle" alt="">
                        </a>
                        <div class="dropdown-menu dropdown-menu-header wd-200">
                            <ul class="list-unstyled user-profile-nav">
                                {{-- <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                                <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li> --}}
                                <li><a href="{{ route('admin.logout') }}"><i class="icon ion-power"></i> Sign Out</a>
                                </li>
                            </ul>
                        </div><!-- dropdown-menu -->
                    </div><!-- dropdown -->
                </nav>
             
            </div><!-- sl-header-right -->
        </div><!-- sl-header -->
    @endguest




    {{-- main content --}}
    @yield('content')

    </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="{{ asset('backend') }}/lib/jquery/jquery.js"></script>
    <script src="{{ asset('backend') }}/lib/popper.js/popper.js"></script>
    <script src="{{ asset('backend') }}/lib/bootstrap/bootstrap.js"></script>
    <script src="{{ asset('backend') }}/lib/jquery-ui/jquery-ui.js"></script>
    {{-- Data Table & select 2 --}}
    <script src="{{ asset('backend') }}/lib/datatables/jquery.dataTables.js"></script>
    <script src="{{ asset('backend') }}/lib/datatables-responsive/dataTables.responsive.js"></script>
    <script>
        $(function() {
            'use strict';

            $('#datatable1').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
                
            });
            
            $('.dataTables_length select').select2({
                minimumResultsForSearch: Infinity
            });

        });
    </script>

{{-- summer note --}}
<script src="{{ asset('backend') }}/lib/medium-editor/medium-editor.js"></script>
<script src="{{ asset('backend') }}/lib/summernote/summernote-bs4.min.js"></script>
<script>
  $(function(){
    'use strict';

    // Inline editor
    var editor = new MediumEditor('.editable');

    // Summernote editor
    $('#summernote').summernote({
      height: 150,
      tooltip: false
    })

        // Summernote editor
    $('#summernote2').summernote({
      height: 150,
      tooltip: false
    })

  });
</script>



    <script src="{{ asset('backend') }}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="{{ asset('backend') }}/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
    <script src="{{ asset('backend') }}/lib/d3/d3.js"></script>
    <script src="{{ asset('backend') }}/lib/rickshaw/rickshaw.min.js"></script>
    <script src="{{ asset('backend') }}/lib/chart.js/Chart.js"></script>
    <script src="{{ asset('backend') }}/lib/Flot/jquery.flot.js"></script>
    <script src="{{ asset('backend') }}/lib/Flot/jquery.flot.pie.js"></script>
    <script src="{{ asset('backend') }}/lib/Flot/jquery.flot.resize.js"></script>
    <script src="{{ asset('backend') }}/lib/flot-spline/jquery.flot.spline.js"></script>

    <script src="{{ asset('backend') }}/js/starlight.js"></script>
    <script src="{{ asset('backend') }}/js/ResizeSensor.js"></script>
    <script src="{{ asset('backend') }}/js/dashboard.js"></script>

    <script src="{{ asset('backend') }}/lib/highlightjs/highlight.pack.js"></script>

    <script src="{{ asset('backend') }}/lib/select2/js/select2.min.js"></script>

    <script src="{{ asset('backend') }}/js/starlight.js"></script>


</body>

</html>
