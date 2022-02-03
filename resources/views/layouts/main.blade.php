  <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        @yield('title')
       <link href= https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css/>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
       <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('css/bootstrap-tagsinput.css')}}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    </head>
    
    <body class="sb-nav-fixed">
        
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" background-color="white" href="/admin">
                <img alt="image" src="{{ asset('BTN/BTN.png') }}"    width="150" height="50"  />
                </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <!-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div> -->
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('profile.index')}}">View Profile</a></li>
                        <li><a class="dropdown-item" href="{{route('password.request')}}">Change password</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><button class="dropdown-item"  form="form" type="submit">Logout</button></li>
                        <form id="form" action="{{route('logout')}}" method="post">
                            @csrf
                          </form>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                        <div class="sb-sidenav-menu">
                            <div class="nav">
                                <div class="sb-sidenav-menu-heading">Home</div>
                                <a class="nav-link" href="{{route('admin.index')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                                </a>
                                <div class="sb-sidenav-menu-heading">Inventory</div>

                                @can('item')
                                <a class="nav-link collapsed" href="{{route('item.index')}}"  data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fab fa-product-hunt"></i></div>
                                  Item
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                      <!-- <a class="nav-link" href="">View Item</a> -->
                                      <!-- <a class="nav-link" href="{{route('item.create')}}">Add Item</a> -->
                                    </nav>
                                </div>
                                </a>
                                @endcan 
                                @can('vendor')
                                <a class="nav-link collapsed" href="{{route('vendor.index')}}"  data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fas fa-store"></i></i></div>
                                  Vendors
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                    <!-- <a class="nav-link" href="">View Vendors</a> -->
                                     <!-- <a class="nav-link" href="{{route('vendor.create')}}">Add vendors</a> -->
                                    </nav>
                                </div>
                                 </a> 
                                @endcan
                                @can('price')
                                <a class="nav-link collapsed" href="{{route('price.index')}}"  data-bs-target="#collapseLayouts12" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fas fa-hand-holding-usd"></i></i></div>
                                  Prices
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayouts12" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <!-- <a class="nav-link" href="">View prices</a> -->
                                       <!-- <a class="nav-link" href="{{route('price.create')}}">Add prices</a> -->
                                    </nav>
                                </div>
                                </a>
                                @endcan
                                @can('purchase')
                                <a class="nav-link collapsed" href="{{route('purchase.index')}}"  data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                                  Purchases
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <!-- <a class="nav-link" href="">View Purchases</a>
                                        <a class="nav-link" href="{{route('purchase.create')}}">Add Puchases</a> -->
                                    </nav>
                                </div>
                              </a>
                              @endcan
                              @can('stock')
                              <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fa fa-archive"></i></div>
                                  Stocks
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{route('stocks.index')}}">View Stock</a>
                                        <!--<a class="nav-link" href="layout-sidenav-light.html">Issuance</a>
                                        <a class="nav-link" href="layout-sidenav-light.html">Issue Stock</a>-->
                                    </nav>
                                </div>
                                @endcan
     
                                @can('zone')
                                <a class="nav-link collapsed" href="{{route('zone.index')}}"  data-bs-target="#collapseLayouts13" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fa fa-truck"></i></div>
                                  Zones
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayouts13" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <!-- <a class="nav-link" href="">View Zones</a>
                                        <a class="nav-link" href="">Add Zones</a> -->
                                       
                                 </nav>
                                </div>
                                @endcan
                                
                                 @can('approve')
                                <a class="nav-link collapsed" href="{{route('approve.index')}}" data-bs-target="#collapseLayouts48" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fas fa-check-square"></i></i></div>
                                Approve
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayouts48" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="">Approve Requests</a>
                                        <!-- <a class="nav-link" href="{{route('approve.index')}}">View All Requests</a> -->
                                    </nav>
                                </div>
                                  @endcan
                        
                                
                                
                                {{-- <div class="sb-sidenav-menu-heading">Action</div> --}}

                                 {{-- @can('returns')
                                 <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts8" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fa fa-window-restore"></i></div>
                                  Teamlead Returns
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayouts8" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{route('returned.index')}}">View Returns</a>
                                    </nav>
                                </div>

                                @endcan --}}


                                @can('pm')
                                 <a class="nav-link collapsed" href="{{route('pm.index')}}"  data-bs-target="#collapseLayouts8" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fas fa-check-double"></i></i></div>
                                  Pm Approval
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayouts8" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <!-- <a class="nav-link" href="#">View Request</a> -->
                                    </nav>
                                </div>

                                @endcan



                                    {{-- @can('report')

                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts16" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fas fa-folder-open"></i></i></div>
                                  Reports
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>

                                <div class="collapse" id="collapseLayouts16" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{route('reports.itemreport')}}">Item Reports</a>
                                        <a class="nav-link" href="{{route('reports.vendorreport')}}">Vendor Reports </a>
                                        <a class="nav-link" href="{{route('reports.pricereport')}}">Price Reports </a>
                                        <a class="nav-link" href="{{route('reports.purchasereport')}}">purchase Reports </a>
                                        <a class="nav-link" href="{{route('reports.zonereport')}}">Zone Reports </a>
                                        <a class="nav-link" href="{{route('reports.issuancereport')}}">Issuance Reports </a>
                                        <a class="nav-link" href="{{route('reports.issuanceereport')}}">Issuancee Reports </a>
                                        <a class="nav-link" href="{{route('reports.returnreport')}}">Returns Reports </a>
                                        <a class="nav-link" href="{{route('reports.returnedreport')}}"> Engineer_Returns Reports </a>
                                       
                                
                                </nav>
                                </div> 
                                @endcan --}}
                                @can('user')
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts6" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                                  User Setting
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayouts6" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                    @can('user')
                                        <a class="nav-link" href="{{route('user.index')}}">Users</a> 
                                        @endcan
                                         <!-- <a class="nav-link" href="{{route('user.create')}}">Add User</a> -->
                                         @can('permission')
                                        <a class="nav-link" href="{{route('permissions.index')}}">Permissions</a>
                                        @endcan
                                        <!-- <a class="nav-link" href="{{route('permissions.create')}}">Add permissions</a> -->
                                        @can('role')
                                        <a class="nav-link" href="{{route('roles.index')}}">Roles</a>
                                        @endcan
                                        <!-- <a class="nav-link" href="{{route('roles.create')}}">Add Roles</a> -->
                                </nav>
                                </div>
                                @endcan
                                
                                 
                                <div class="sb-sidenav-menu-heading">Teamlead Menu</div> 
                                @can('team')
                                <a class="nav-link collapsed" href="{{route('teamleadstocks.index')}}"  data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-box"></i></i></div>
                               Teamlead Stocks
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <!-- <a class="nav-link" href="#">View Stock</a> -->
                                    
                                </nav>
                            </div>
                            @endcan

                            @can('request')
                            <a class="nav-link collapsed" href="{{route('request.index')}}"  data-bs-target="#collapseLayouts47" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-paper-plane"></i></i></div>
                                Request
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts47" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                    
                                    <!-- <a class="nav-link" href="{{route('request.index')}}">View request</a>
                                     <a class="nav-link" href="{{route('request.create')}}">Request</a> -->
                                
                            </nav>
                            </div>
                            @endcan
                        {{-- @can('returns-list')
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts8" aria-expanded="false" aria-controls="collapseLayouts">
                         <div class="sb-nav-link-icon"><i class="fa fa-file"></i></div>
                                        Teamlead Returns
                          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                     </a>
                         <div class="collapse" id="collapseLayouts8" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                         <nav class="sb-sidenav-menu-nested nav">
                                             <a class="nav-link" href="{{route('returns.index')}}">View Returns</a>
                                             <a class="nav-link" href="{{route('returns.create')}}">Add Returns</a>
                         </nav>
                        </div>
                         @endcan --}}
                            {{-- @can('ereturns')
                                <a class="nav-link collapsed" href="{{route('returned.index')}}"  data-bs-target="#collapseLayouts8" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-undo-alt"></i></i></div>
                                           Engineer-returns
                                             <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                         </a>
                                         <div class="collapse" id="collapseLayouts8" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                             <nav class="sb-sidenav-menu-nested nav">
                                            
                                         </nav>
                                     </div>   
                                     @endcan --}}
                                @can('approval')
                                <a class="nav-link collapsed"  href="{{route('approval.index')}}" data-bs-target="#collapseLayouts89" aria-expanded="false" aria-controls="collapseLayouts">
                                        <div class="sb-nav-link-icon"><i class="fas fa-check-circle"></i></i></div>
                                                   Approve Request
                                                     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                                 </a>
                                             <div class="collapse" id="collapseLayouts89" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                                     <nav class="sb-sidenav-menu-nested nav">
                                                         
                                                         {{-- <a class="nav-link">View request</a>
                                                         <a class="nav-link" href="{{route('approval.index')}}">Approve Requests</a> --}}

                                                 </nav>
                                               </div>
                                               @endcan

                          <div class="sb-sidenav-menu-heading">Engineer Menu</div> 
                         @can('requestengineer')
                      <a class="nav-link collapsed" href="{{route('requestengineer.index')}}"  data-bs-target="#collapseLayouts41" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-paper-plane"></i></i></div>
                          Request
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts41" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <!-- <a class="nav-link" href="">View Requests</a>
                                <a class="nav-link" href="">Add Requests</a> -->
                        </nav>
                        </div> 
                        @endcan

                        {{-- @can('ereturns')
                        <a class="nav-link collapsed" href="{{route('returned.index')}}" data-bs-target="#collapseLayouts8" aria-expanded="false" aria-controls="collapseLayouts">
                         <div class="sb-nav-link-icon"><i class="fa fa-file"></i></div>
                                       Returns
                          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                     </a>
                         <div class="collapse" id="collapseLayouts8" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                         <nav class="sb-sidenav-menu-nested nav">
                                              <a class="nav-link" href="">View Returns</a>
                                             <a class="nav-link" href="{{route('returns.create')}}">Add Returns</a> 
                         </nav>
                        </div>
                         @endcan --}}


                     </div>
                     </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{Auth::user()->name}}
                    </div>
                </nav>
            </div>
            @yield('content')

            </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; <?php echo date("Y"); ?> BTN </div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('js/scripts.js')}}"></script>
        <script src="{{asset('js/bootstrap-tagsinput.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{asset('js/datatables-simple-demo.js')}}"></script>
        <script src="{{asset('js/delete.js')}}"></script>
    
    </body>
</html>
