<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        @yield('title')
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
       <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('css/bootstrap-tagsinput.css')}}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    
    <body class="sb-nav-fixed">
        
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" background-color="white" href="/home">
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
                                <a class="nav-link" href="{{route('home.index')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                                </a>
                            
                                @can('teamleadstocks-list')
                                <a class="nav-link collapsed" href="{{route('teamleadstocks.index')}}"  data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-archive"></i></div>
                               Teamlead Stocks
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <!-- <a class="nav-link" href="#">View Stock</a> -->
                                    
                                </nav>
                            </div>
                            @endcan

                            @can('request-list')
                            <a class="nav-link collapsed" href=""  data-bs-toggle="collapse" data data-bs-target="#collapseLayouts47" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-file"></i></div>
                                Request
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts47" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                    
                                     <a class="nav-link" href="{{route('request.drafts')}}">Drafts</a>
                                     <a class="nav-link" href="{{route('request.index')}}">Request</a> 
                                
                            </nav>
                            </div>
                            @endcan

                            @can('returns-list')
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
                         @endcan




                            @can('ereturns-list')
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts8" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-file"></i></div>
                                           Engineer-returns
                                             <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                         </a>
                                         <div class="collapse" id="collapseLayouts8" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                             <nav class="sb-sidenav-menu-nested nav">
                                                 <a class="nav-link" href="{{route('returned.index')}}">View Returns</a>
                                                 <a class="nav-link" href="{{route('returned.create')}}">Add Returns</a>
                                         </nav>
                                     </div>   
                                     @endcan
                                     @can('approval-list')
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts89" aria-expanded="false" aria-controls="collapseLayouts">
                                        <div class="sb-nav-link-icon"><i class="fa fa-file"></i></div>
                                                   Approve Request
                                                     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                                 </a>
                                             <div class="collapse" id="collapseLayouts89" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                                     <nav class="sb-sidenav-menu-nested nav">
                                                         
                                                         <a class="nav-link" href="{{route('approval.index')}}">View request</a>
                                                         <a class="nav-link" href="{{route('approval.index')}}">Approve Requests</a>

                                                 </nav>
                                               </div>
                                               @endcan

                         <div class="sb-sidenav-menu-heading">Engineer Menu</div>
                         @can('requestengineer-list')
                      <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"  data-bs-target="#collapseLayouts41" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa fa-file"></i></div>
                          Request
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts41" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('requests.drafts')}}">Drafts</a>
                                <a class="nav-link" href="{{route('requestengineer.index')}}">Requests</a>
                        </nav>
                        </div> 
                        @endcan

                        @can('ereturns-list')
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts8" aria-expanded="false" aria-controls="collapseLayouts">
                         <div class="sb-nav-link-icon"><i class="fa fa-file"></i></div>
                                       Returns
                          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                     </a>
                         <div class="collapse" id="collapseLayouts8" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                         <nav class="sb-sidenav-menu-nested nav">
                                             <a class="nav-link" href="{{route('returns.index')}}">View Returns</a>
                                             <a class="nav-link" href="{{route('returns.create')}}">Add Returns</a>
                         </nav>
                        </div>
                         @endcan


                         @can('pm-list')
                                 <a class="nav-link collapsed" href="{{route('pm.index')}}"  data-bs-target="#collapseLayouts8" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fa fa-window-restore"></i></div>
                                  Pm Approval
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayouts8" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <!-- <a class="nav-link" href="#">View Request</a> -->
                                    </nav>
                                </div>

                                @endcan


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
        <script src="js/datatables-simple-demo.js"></script>
    
    </body>
</html>
