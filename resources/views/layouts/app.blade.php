<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="/assets/images/favicon-32x32.png" type="image/png" />
        <!--plugins-->
        <link href="/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
        <link href="/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
        <link href="/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
        <!-- Bootstrap CSS -->
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="/assets/css/bootstrap-extended.css" rel="stylesheet" />
        <link href="/assets/css/style.css" rel="stylesheet" />
        <link href="/assets/css/icons.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        
      
        <!-- loader-->
          <link href="/assets/css/pace.min.css" rel="stylesheet" />
      
        <!--Theme Styles-->
        <link href="/assets/css/dark-theme.css" rel="stylesheet" />
        <link href="/assets/css/light-theme.css" rel="stylesheet" />
        <link href="/assets/css/semi-dark.css" rel="stylesheet" />
        <link href="/assets/css/header-colors.css" rel="stylesheet" />
      
        <title>Cargo Tracker - PFE PROJECT</title>
      </head>
      
<body>
     <!--start wrapper-->
  <div class="wrapper">
    <!--start top header-->
      <header class="top-header">        
        <nav class="navbar navbar-expand gap-3">
          <div class="mobile-toggle-icon fs-3">
              <i class="bi bi-list"></i>
            </div>
            <form class="searchbar">
                <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><i class="bi bi-search"></i></div>
                <input class="form-control" type="text" placeholder="Type here to search">
                <div class="position-absolute top-50 translate-middle-y search-close-icon"><i class="bi bi-x-lg"></i></div>
            </form>
            <div class="top-navbar-right ms-auto">
              <ul class="navbar-nav align-items-center">
                <li class="nav-item search-toggle-icon">
                  <a class="nav-link" href="#">
                    <div class="">
                      <i class="bi bi-search"></i>
                    </div>
                  </a>
              </li>
              <li class="nav-item dropdown dropdown-user-setting">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                  <div class="user-setting d-flex align-items-center">
                    <img src="./assets/images/girlavatar.png" class="user-img" alt="">
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                     <a class="dropdown-item" href="#">
                       <div class="d-flex align-items-center">
                          <img src="./assets/images/girlavatar.png" alt="" class="rounded-circle" width="54" height="54">
                          <div class="ms-3">
                            <h6 class="mb-0 dropdown-user-name">{{ Auth::user()->first_name }}</h6>
                          </div>
                       </div>
                     </a>
                   </li>
                   <li><hr class="dropdown-divider"></li>
                   <li>
                      <a class="dropdown-item" href="{{ route('profile') }}">
                         <div class="d-flex align-items-center">
                           <div class=""><i class="bi bi-person-fill"></i></div>
                           <div class="ms-3"><span>Profile</span></div>
                         </div>
                       </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                         <div class="d-flex align-items-center">
                           <div class=""><i class="bi bi-gear-fill"></i></div>
                           <div class="ms-3"><span>Setting</span></div>
                         </div>
                       </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{ route('home') }}">
                         <div class="d-flex align-items-center">
                           <div class=""><i class="bi bi-speedometer"></i></div>
                           <div class="ms-3"><span>Dashboard</span></div>
                         </div>
                       </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                         <div class="d-flex align-items-center">
                           <div class=""><i class="bi bi-piggy-bank-fill"></i></div>
                           <div class="ms-3"><span>Earnings</span></div>
                         </div>
                       </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                         <div class="d-flex align-items-center">
                           <div class=""><i class="bi bi-cloud-arrow-down-fill"></i></div>
                           <div class="ms-3"><span>Downloads</span></div>
                         </div>
                       </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                         <div class="d-flex align-items-center">
                           <div class=""><i class="bi bi-lock-fill"></i></div>
                           <div class="ms-3"><span>Logout</span></div>
                         </div>
                       </a>
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    </li>
                </ul>
              </li>
              <li class="nav-item dropdown dropdown-large">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                  <div class="projects">
                    <i class="bi bi-grid-3x3-gap-fill"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                   <div class="row row-cols-3 gx-2">
                      <div class="col">
                        <a href="ecommerce-orders.html">
                         <div class="apps p-2 radius-10 text-center">
                            <div class="apps-icon-box mb-1 text-white bg-gradient-purple">
                              <i class="bi bi-basket2-fill"></i>
                            </div>
                            <p class="mb-0 apps-name">Orders</p>
                         </div>
                        </a>
                      </div>
                      <div class="col">
                        <a href="javascript:;">
                        <div class="apps p-2 radius-10 text-center">
                           <div class="apps-icon-box mb-1 text-white bg-gradient-info">
                            <i class="bi bi-people-fill"></i>
                           </div>
                           <p class="mb-0 apps-name">Users</p>
                        </div>
                      </a>
                     </div>
                     <div class="col">
                      <a href="ecommerce-products-grid.html">
                      <div class="apps p-2 radius-10 text-center">
                         <div class="apps-icon-box mb-1 text-white bg-gradient-success">
                          <i class="bi bi-trophy-fill"></i>
                         </div>
                         <p class="mb-0 apps-name">Products</p>
                      </div>
                      </a>
                    </div>
                    <div class="col">
                      <a href="component-media-object.html">
                      <div class="apps p-2 radius-10 text-center">
                         <div class="apps-icon-box mb-1 text-white bg-gradient-danger">
                          <i class="bi bi-collection-play-fill"></i>
                         </div>
                         <p class="mb-0 apps-name">Media</p>
                      </div>
                      </a>
                    </div>
                    <div class="col">
                      <a href="pages-user-profile.html">
                      <div class="apps p-2 radius-10 text-center">
                         <div class="apps-icon-box mb-1 text-white bg-gradient-warning">
                          <i class="bi bi-person-circle"></i>
                         </div>
                         <p class="mb-0 apps-name">Account</p>
                       </div>
                      </a>
                    </div>
                    <div class="col">
                      <a href="javascript:;">
                      <div class="apps p-2 radius-10 text-center">
                         <div class="apps-icon-box mb-1 text-white bg-gradient-voilet">
                          <i class="bi bi-file-earmark-text-fill"></i>
                         </div>
                         <p class="mb-0 apps-name">Docs</p>
                      </div>
                      </a>
                    </div>
                    <div class="col">
                      <a href="ecommerce-orders-detail.html">
                      <div class="apps p-2 radius-10 text-center">
                         <div class="apps-icon-box mb-1 text-white bg-gradient-branding">
                          <i class="bi bi-credit-card-fill"></i>
                         </div>
                         <p class="mb-0 apps-name">Payment</p>
                      </div>
                      </a>
                    </div>
                    <div class="col">
                      <a href="javascript:;">
                      <div class="apps p-2 radius-10 text-center">
                         <div class="apps-icon-box mb-1 text-white bg-gradient-desert">
                          <i class="bi bi-calendar-check-fill"></i>
                         </div>
                         <p class="mb-0 apps-name">Events</p>
                      </div>
                    </a>
                    </div>
                    <div class="col">
                      <a href="javascript:;">
                      <div class="apps p-2 radius-10 text-center">
                         <div class="apps-icon-box mb-1 text-white bg-gradient-amour">
                          <i class="bi bi-book-half"></i>
                         </div>
                         <p class="mb-0 apps-name">Story</p>
                        </div>
                      </a>
                    </div>
                   </div><!--end row-->
                </div>
              </li>
              <li class="nav-item dropdown dropdown-large">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                  <div class="messages">
                    <span class="notify-badge">5</span>
                    <i class="bi bi-chat-right-fill"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end p-0">
                  <div class="p-2 border-bottom m-2">
                      <h5 class="h5 mb-0">Messages</h5>
                  </div>
                 <div class="header-message-list p-2">
                     <a class="dropdown-item" href="#">
                       <div class="d-flex align-items-center">
                          <img src="https://via.placeholder.com/110X110" alt="" class="rounded-circle" width="50" height="50">
                          <div class="ms-3 flex-grow-1">
                            <h6 class="mb-0 dropdown-msg-user">Amelio Joly <span class="msg-time float-end text-secondary">1 m</span></h6>
                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">The standard chunk of lorem...</small>
                          </div>
                       </div>
                     </a>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex align-items-center">
                         <img src="https://via.placeholder.com/110X110" alt="" class="rounded-circle" width="50" height="50">
                         <div class="ms-3 flex-grow-1">
                           <h6 class="mb-0 dropdown-msg-user">Althea Cabardo <span class="msg-time float-end text-secondary">7 m</span></h6>
                           <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Many desktop publishing</small>
                         </div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex align-items-center">
                         <img src="https://via.placeholder.com/110X110" alt="" class="rounded-circle" width="50" height="50">
                         <div class="ms-3 flex-grow-1">
                           <h6 class="mb-0 dropdown-msg-user">Katherine Pechon <span class="msg-time float-end text-secondary">2 h</span></h6>
                           <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Making this the first true</small>
                         </div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex align-items-center">
                         <img src="https://via.placeholder.com/110X110" alt="" class="rounded-circle" width="50" height="50">
                         <div class="ms-3 flex-grow-1">
                           <h6 class="mb-0 dropdown-msg-user">Peter Costanzo <span class="msg-time float-end text-secondary">3 h</span></h6>
                           <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">It was popularised in the 1960</small>
                         </div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex align-items-center">
                         <img src="https://via.placeholder.com/110X110" alt="" class="rounded-circle" width="50" height="50">
                         <div class="ms-3 flex-grow-1">
                           <h6 class="mb-0 dropdown-msg-user">Thomas Wheeler <span class="msg-time float-end text-secondary">1 d</span></h6>
                           <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">If you are going to use a passage</small>
                         </div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex align-items-center">
                         <img src="https://via.placeholder.com/110X110" alt="" class="rounded-circle" width="50" height="50">
                         <div class="ms-3 flex-grow-1">
                           <h6 class="mb-0 dropdown-msg-user">Johnny Seitz <span class="msg-time float-end text-secondary">2 w</span></h6>
                           <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">All the Lorem Ipsum generators</small>
                         </div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex align-items-center">
                         <img src="https://via.placeholder.com/110X110" alt="" class="rounded-circle" width="50" height="50">
                         <div class="ms-3 flex-grow-1">
                           <h6 class="mb-0 dropdown-msg-user">Amelio Joly <span class="msg-time float-end text-secondary">1 m</span></h6>
                           <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">The standard chunk of lorem...</small>
                         </div>
                      </div>
                    </a>
                   <a class="dropdown-item" href="#">
                     <div class="d-flex align-items-center">
                        <img src="https://via.placeholder.com/110X110" alt="" class="rounded-circle" width="50" height="50">
                        <div class="ms-3 flex-grow-1">
                          <h6 class="mb-0 dropdown-msg-user">Althea Cabardo <span class="msg-time float-end text-secondary">7 m</span></h6>
                          <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Many desktop publishing</small>
                        </div>
                     </div>
                   </a>
                   <a class="dropdown-item" href="#">
                     <div class="d-flex align-items-center">
                        <img src="https://via.placeholder.com/110X110" alt="" class="rounded-circle" width="50" height="50">
                        <div class="ms-3 flex-grow-1">
                          <h6 class="mb-0 dropdown-msg-user">Katherine Pechon <span class="msg-time float-end text-secondary">2 h</span></h6>
                          <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Making this the first true</small>
                        </div>
                     </div>
                   </a>
                </div>
                <div class="p-2">
                  <div><hr class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                      <div class="text-center">View All Messages</div>
                    </a>
                </div>
               </div>
              </li>
              <li class="nav-item dropdown dropdown-large">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                  <div class="notifications">
                    <span class="notify-badge">8</span>
                    <i class="bi bi-bell-fill"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end p-0">
                  <div class="p-2 border-bottom m-2">
                      <h5 class="h5 mb-0">Notifications</h5>
                  </div>
                  <div class="header-notifications-list p-2">
                      <a class="dropdown-item" href="#">
                        <div class="d-flex align-items-center">
                           <div class="notification-box bg-light-primary text-primary"><i class="bi bi-basket2-fill"></i></div>
                           <div class="ms-3 flex-grow-1">
                             <h6 class="mb-0 dropdown-msg-user">New Orders <span class="msg-time float-end text-secondary">1 m</span></h6>
                             <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">You have recived new orders</small>
                           </div>
                        </div>
                      </a>
                     <a class="dropdown-item" href="#">
                       <div class="d-flex align-items-center">
                        <div class="notification-box bg-light-purple text-purple"><i class="bi bi-people-fill"></i></div>
                          <div class="ms-3 flex-grow-1">
                            <h6 class="mb-0 dropdown-msg-user">New Customers <span class="msg-time float-end text-secondary">7 m</span></h6>
                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">5 new user registered</small>
                          </div>
                       </div>
                     </a>
                     <a class="dropdown-item" href="#">
                       <div class="d-flex align-items-center">
                        <div class="notification-box bg-light-success text-success"><i class="bi bi-file-earmark-bar-graph-fill"></i></div>
                          <div class="ms-3 flex-grow-1">
                            <h6 class="mb-0 dropdown-msg-user">24 PDF File <span class="msg-time float-end text-secondary">2 h</span></h6>
                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">The pdf files generated</small>
                          </div>
                       </div>
                     </a>
                     <a class="dropdown-item" href="#">
                       <div class="d-flex align-items-center">
                        <div class="notification-box bg-light-orange text-orange"><i class="bi bi-collection-play-fill"></i></div>
                          <div class="ms-3 flex-grow-1">
                            <h6 class="mb-0 dropdown-msg-user">Time Response  <span class="msg-time float-end text-secondary">3 h</span></h6>
                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">5.1 min avarage time response</small>
                          </div>
                       </div>
                     </a>
                     <a class="dropdown-item" href="#">
                       <div class="d-flex align-items-center">
                        <div class="notification-box bg-light-info text-info"><i class="bi bi-cursor-fill"></i></div>
                          <div class="ms-3 flex-grow-1">
                            <h6 class="mb-0 dropdown-msg-user">New Product Approved  <span class="msg-time float-end text-secondary">1 d</span></h6>
                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Your new product has approved</small>
                          </div>
                       </div>
                     </a>
                     <a class="dropdown-item" href="#">
                       <div class="d-flex align-items-center">
                        <div class="notification-box bg-light-pink text-pink"><i class="bi bi-gift-fill"></i></div>
                          <div class="ms-3 flex-grow-1">
                            <h6 class="mb-0 dropdown-msg-user">New Comments <span class="msg-time float-end text-secondary">2 w</span></h6>
                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">New customer comments recived</small>
                          </div>
                       </div>
                     </a>
                     <a class="dropdown-item" href="#">
                       <div class="d-flex align-items-center">
                        <div class="notification-box bg-light-warning text-warning"><i class="bi bi-droplet-fill"></i></div>
                          <div class="ms-3 flex-grow-1">
                            <h6 class="mb-0 dropdown-msg-user">New 24 authors<span class="msg-time float-end text-secondary">1 m</span></h6>
                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">24 new authors joined last week</small>
                          </div>
                       </div>
                     </a>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex align-items-center">
                        <div class="notification-box bg-light-primary text-primary"><i class="bi bi-mic-fill"></i></div>
                         <div class="ms-3 flex-grow-1">
                           <h6 class="mb-0 dropdown-msg-user">Your item is shipped <span class="msg-time float-end text-secondary">7 m</span></h6>
                           <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Successfully shipped your item</small>
                         </div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex align-items-center">
                        <div class="notification-box bg-light-success text-success"><i class="bi bi-lightbulb-fill"></i></div>
                         <div class="ms-3 flex-grow-1">
                           <h6 class="mb-0 dropdown-msg-user">Defense Alerts <span class="msg-time float-end text-secondary">2 h</span></h6>
                           <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">45% less alerts last 4 weeks</small>
                         </div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex align-items-center">
                        <div class="notification-box bg-light-info text-info"><i class="bi bi-bookmark-heart-fill"></i></div>
                         <div class="ms-3 flex-grow-1">
                           <h6 class="mb-0 dropdown-msg-user">4 New Sign Up <span class="msg-time float-end text-secondary">2 w</span></h6>
                           <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">New 4 user registartions</small>
                         </div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex align-items-center">
                        <div class="notification-box bg-light-bronze text-bronze"><i class="bi bi-briefcase-fill"></i></div>
                         <div class="ms-3 flex-grow-1">
                           <h6 class="mb-0 dropdown-msg-user">All Documents Uploaded <span class="msg-time float-end text-secondary">1 mo</span></h6>
                           <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Sussessfully uploaded all files</small>
                         </div>
                      </div>
                    </a>
                 </div>
                 <div class="p-2">
                   <div><hr class="dropdown-divider"></div>
                     <a class="dropdown-item" href="#">
                       <div class="text-center">View All Notifications</div>
                     </a>
                 </div>
                </div>
              </li>
              </ul>
              </div>
        </nav>
      </header>
       <!--end top header-->

        <!--start sidebar -->
        <aside class="sidebar-wrapper" data-simplebar="true">
          <div class="sidebar-header">
            <div>
              <img src="/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
            </div>
            <div>
              <h4 class="logo-text">CargoTracker</h4>
            </div>
            <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
            </div>
          </div>
          <!--navigation-->
          <ul class="metismenu" id="menu">
            <li>
              <a href="{{ route('home') }}" >
              <i class="bi bi-house-fill"></i>
            
                <div class="menu-title">Dashboard</div>
              </a>
          
            </li>
        
            <li class="menu-label">Menu</li>
            @can('can-add-ship')
            <li>
              <a href="{{ route('new') }}">
                <div class="parent-icon"><i class="bi bi-droplet-fill"></i>
                </div>
                <div class="menu-title">Transactions</div>
              </a>
             
            </li>
            @endcan
            @can('can-index-ship')
            <li>
              <a href="{{ route('shippings') }}">
                <div class="parent-icon"><i class="bi bi-basket2-fill"></i>
                </div>
                <div class="menu-title">All Shipping</div>
              </a>
           
            </li>
            @endcan
            @can('can-restore-ship')
            <li>
              <a href="{{ route('restoreships') }}">
                <div class="parent-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-ccw"><polyline points="1 4 1 10 7 10"></polyline><polyline points="23 20 23 14 17 14"></polyline><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path></svg>
                </div>
                <div class="menu-title">Restore Shippement</div>
              </a>
             
            </li>
            @endcan
            @can('can-index-bus')
                
        
            <li>
              <a  href="{{ route('buses') }}">
                <div class="parent-icon"><i class="bi bi-award-fill"></i>
                </div>
                <div class="menu-title">Buses</div>
              </a>
    
            </li>
            @endcan
            @can('can-index-location')
            <li>
              <a href="{{ route('location') }}">
                <div class="parent-icon"><i class="bi bi-cloud-arrow-down-fill"></i>
                </div>
                <div class="menu-title">Location</div>
              </a>
             
            </li>
           
        @endcan
         
             
            <li>
              <a href="{{ route('busdocs.index') }}">
                <div class="parent-icon"><i class="bi bi-file-code-fill"></i>
                </div>
                <div class="menu-title">Documents</div>
              </a>
            </li>
            <li>
              <a href="pages-faq.html">
                <div class="parent-icon"><i class="bi bi-question-lg"></i>
                </div>
                <div class="menu-title">FAQ</div>
              </a>
            </li>
        
           
           
            <li class="menu-label">Others</li>
         
         
            <li>
              <a href="https://themeforest.net/user/codervent" target="_blank">
                <div class="parent-icon"><i class="bi bi-telephone-fill"></i>
                </div>
                <div class="menu-title">Support</div>
              </a>
            </li>
           
            @can('can-index-user')
            <li>

              <a href="{{ route('users.index') }}" >
                <div class="parent-icon"><i class="bi bi-people-fill"></i>
                </div>
                <div class="menu-title">Users</div>
              </a>
            </li>
            @endcan

            @can('can-index-role')
            <li>
              <a href="{{ route('role.index') }}">
                <div class="parent-icon"><i class="bi bi-diamond-fill"></i>
                </div>
                <div class="menu-title">Permissions</div>
              </a>
            </li>
            @endcan
          </ul>
          <!--end navigation-->
       </aside>
       <!--end sidebar -->

    <div id="app">
      

        <main class="py-4">
            @include('sweetalert::alert')

            @yield('content')
        </main>

    </div>
      <!-- Bootstrap bundle JS -->
  <script src="/assets/js/bootstrap.bundle.min.js"></script>
  <!--plugins-->
  <script src="/assets/js/jquery.min.js"></script>
  <script src="/assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="/assets/plugins/metismenu/js/metisMenu.min.js"></script>
  <script src="/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="/assets/js/pace.min.js"></script>
  <script src="/assets/plugins/chartjs/js/Chart.min.js"></script>
  <script src="/assets/plugins/chartjs/js/Chart.extension.js"></script>
  <script src="/assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
  <!--app-->
  <script src="/assets/js/app.js"></script>
  <script src="/assets/js/index.js"></script>
  <script>
    new PerfectScrollbar(".best-product")
 </script>

</body>
</html>
