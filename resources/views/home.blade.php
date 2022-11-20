@extends('layouts.app')

@section('title', 'Home')

@section('content')


<main class="page-content">
              
    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-4">
      <div class="col">
        <div class="card overflow-hidden radius-10">
            <div class="card-body p-2">
             <div class="d-flex align-items-stretch justify-content-between radius-10 overflow-hidden">
              <div class="w-50 p-3 bg-light-pink">
                <p>Total </p>
                <h4 class="text-pink">{{ $buses + $cargos + $transactions = DB::table('transactions')->where('status','=','shipped')->count()
      }} </h4>
              </div>
              <div class="w-50 bg-pink p-3">
                 <p class="mb-3 text-white"></p>
                 <div id="chart1"></div>
              </div>
            </div>
          </div>
        </div>
       </div>
       <div class="col">
        <div class="card overflow-hidden radius-10">
            <div class="card-body p-2">
             <div class="d-flex align-items-stretch justify-content-between radius-10 overflow-hidden">
              <div class="w-50 p-3 bg-light-purple">
                <p>Total Buses</p>
                <h4 class="text-purple">{{ $buses }}</h4>
              </div>
              <div class="w-50 bg-purple p-3">
                 <p class="mb-3 text-white"></p>
                 <div id="chart2"></div>
              </div>
            </div>
          </div>
        </div>
       </div>
       <div class="col">
        <div class="card overflow-hidden radius-10">
            <div class="card-body p-2">
             <div class="d-flex align-items-stretch justify-content-between radius-10 overflow-hidden">
              <div class="w-50 p-3 bg-light-success">
                <p>Shipping Now</p>
                <h4 class="text-success">@php
                    if ($transactions = DB::table('transactions')->where('status','=','shipped')->count()) {
              
              echo $transactions;
          }else{
              echo '0';
          }
                              @endphp</h4>
              </div>
              <div class="w-50 bg-success p-3">
                 <p class="mb-3 text-white"></p>
                 <div id="chart3"></div>
              </div>
            </div>
          </div>
        </div>
       </div>
       <div class="col">
        <div class="card overflow-hidden radius-10">
            <div class="card-body p-2">
             <div class="d-flex align-items-stretch justify-content-between radius-10 overflow-hidden">
              <div class="w-50 p-3 bg-light-orange">
                <p>Total Cargo Delivered</p>
                <h4 class="text-orange">{{ $cargos }}</h4>
              </div>
              <div class="w-50 bg-orange p-3">
                 <p class="mb-3 text-white"></p>
                 <div id="chart4"></div>
              </div>
            </div>
          </div>
        </div>
       </div>
    </div><!--end row-->


    <div class="row">
      <div class="col-12 col-lg-6 col-xl-6 col-xxl-4 d-flex">
        <div class="card radius-10 bg-transparent shadow-none w-100">
          <div class="card-body p-0">
            <div class="card radius-10">
              <div class="card-body">
                <div class="d-flex align-items-center">
                   <h6 class="mb-0">Total By circle</h6>
                   <div class="fs-5 ms-auto dropdown">
                      <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li><a class="dropdown-item" href="#">Another action</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2 mt-3 g-3">
                  <div class="col">
                    <div class="by-device-container">
                      <canvas id="chart5"></canvas>
                    </div>
                  </div>
                  <div class="col">
                    <div class="">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex align-items-center justify-content-between border-0">
                          <i class="bi bi-tablet-landscape-fill me-2 text-orange"></i> <span>Bus - </span> <span>{{$buses}}</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center justify-content-between border-0">
                          <i class="bi bi-phone-fill me-2 text-success"></i> <span>Shipping Now - </span> <span>@php
                            if ($transactions = DB::table('transactions')->where('status','=','shipped')->count()) {
                      
                      echo $transactions;
                  }else{
                      echo '0';
                  }
                                      @endphp</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center justify-content-between border-0">
                          <i class="bi bi-display-fill me-2 text-primary"></i> <span>Cargo - </span> <span>{{ $cargos }}</span>
                        </li>
                      </ul>
                     </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card radius-10 w-100 mb-0 overflow-hidden">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <h6 class="mb-0">Key Totality</h6>
                  <div class="fs-5 ms-auto">
                    <div class="d-flex align-items-center justify-content-sm-end gap-3 cursor-pointer">
                      <div class="font-13"><i class="bi bi-circle-fill text-orange"></i><span class="ms-2">Buses</span></div>
                      <div class="font-13"><i class="bi bi-circle-fill text-success"></i><span class="ms-2">Shippings</span></div>
                      <div class="font-13"><i class="bi bi-circle-fill text-primary opacity-50"></i><span class="ms-2">Cargos</span></div>
                    </div>
                   </div>
               </div>
              </div>
             
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6 col-xl-6 col-xxl-4 d-flex">
        <div class="card radius-10 w-100 overflow-hidden">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <h6 class="mb-0">Orders</h6>
              <div class="fs-5 ms-auto dropdown">
                 <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                   <ul class="dropdown-menu">
                     <li><a class="dropdown-item" href="#">Action</a></li>
                     <li><a class="dropdown-item" href="#">Another action</a></li>
                     <li><hr class="dropdown-divider"></li>
                     <li><a class="dropdown-item" href="#">Something else here</a></li>
                   </ul>
               </div>
             </div>
            <div id="chart7"></div>
            <div class="d-flex align-items-center gap-5 justify-content-center mt-4 p-3 bg-light radius-10 border"> 
              <div class="text-center">
                <h2 class="mb-3 text-success">{{ $buses + $cargos + $transactions = DB::table('transactions')->where('status','=','shipped')->count()
                }}</h2>
                <p>Total <br> </p>
              </div>
              <div class="border-end sepration"></div>
              <div class="text-center">
               <h2 class="mb-3">{{ $buses + $cargos + $transactions = DB::table('transactions')->where('cargo_name')->count()
            }}</h2>
               <p>AVG per <br> Shipping</p>
             </div>
           </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-12 col-xl-12 col-xxl-4 d-flex">
        <div class="w-100">
        <div class="card radius-10">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <h6 class="mb-0">Traffic</h6>
              <div class="fs-5 ms-auto">
                <div class="d-flex align-items-center justify-content-sm-end gap-3 cursor-pointer">
                  <div class="font-13"><i class="bi bi-circle-fill text-pink"></i><span class="ms-2">Referral</span></div>
                  <div class="font-13"><i class="bi bi-circle-fill text-pink opacity-50"></i><span class="ms-2">Search</span></div>
                </div>
               </div>
             </div>
             <div id="chart8"></div>
          </div>
        </div>
        <div class="card radius-10">
        
        </div>
      </div>
    </div><!--end row-->


    <div class="row">
      <div class="col-12 col-lg-12 col-xl-8 d-flex">
        <div class="card radius-10 w-100">
          <div class="card-header bg-transparent">
            <div class="row g-3 align-items-center">
              <div class="col">
                <h5 class="mb-0">Shipping Summary</h5>
              </div>
              <div class="col">
                <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                  <div class="dropdown">
                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="javascript:;">Action</a>
                      </li>
                      <li><a class="dropdown-item" href="javascript:;">Another action</a>
                      </li>
                      <li>
                        <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
             </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table align-middle mb-0">
                <thead class="table-light">
                  <tr>
                  
               
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Received Cargo</td>
                    <td>
                      <div class="d-flex align-items-center gap-3">
                     
                        <div class="product-info">
                          <h6 class="product-name mb-1">{{ $received }}</h6>
                        </div>
                      </div>
                    </td>
             
                  </tr>
                  <tr>
                    <td>Ready to Pick Cargo</td>
                    <td>
                      <div class="d-flex align-items-center gap-3">
                    
                        <div class="product-info">
                          <h6 class="product-name mb-1">{{ $reached }}</h6>
                        </div>
                      </div>
                    </td>
                
                  </tr>
                  <tr>
                    <td>Shipping Cargo</td>
                    <td>
                      <div class="d-flex align-items-center gap-3">
                      
                        <div class="product-info">
                          <h6 class="product-name mb-1">@php
                            if ($transactions = DB::table('transactions')->where('status','=','shipped')->count()) {
                      
                      echo $transactions;
                  }else{
                      echo '0';
                  }
                                      @endphp</h6>
                        </div>
                      </div>
                    </td>
                 
                  </tr>
                  <tr>
                    <td>Picked Cargo</td>
                    <td>
                      <div class="d-flex align-items-center gap-3">
                    
                        <div class="product-info">
                          <h6 class="product-name mb-1">{{$cargos}}</h6>
                        </div>
                      </div>
                    </td>
                 
                  </tr>
              
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-12 col-xl-4 d-flex">
        <div class="card radius-10 w-100">
          <div class="card-header bg-transparent border-0">
            <div class="row g-3 align-items-center">
              <div class="col">
                <h6 class="mb-0">Mouvement By Location</h6>
              </div>
              <div class="col">
                <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                  <div class="dropdown">
                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="javascript:;">Action</a>
                      </li>
                      <li><a class="dropdown-item" href="javascript:;">Another action</a>
                      </li>
                      <li>
                        <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
             </div>
          </div>
          <div class="card-body p-0">
             <div class="best-product p-2 mb-3">
               
                <table class="table table-hover">
                    @if ($location->count() >0)
                        @foreach ($location as $item)
                            <tr>
                                <td>{{ $item->location }}</td>
                                <td>
                                    @php
                                        $movement = App\Models\Shipping::where('destination', $item->id)->where('status', 'shipping');
                                        echo $movement->count()
                                    @endphp
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr><td colspan="2">No Items currently added</td></tr>
                    @endif
                </table>

        
             </div>
          </div>
        </div>

      </div>
    </div><!--end row-->


  </main>
<!--end page main-->

<!--start overlay-->
<div class="overlay nav-toggle-icon"></div>
<!--end overlay-->

<!--Start Back To Top Button-->
     <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->

<!--start switcher-->
<div class="switcher-body">
<button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="bi bi-paint-bucket me-0"></i></button>
<div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling">
  <div class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <h6 class="mb-0">Theme Variation</h6>
    <hr>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1" checked>
      <label class="form-check-label" for="LightTheme">Light</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme" value="option2">
      <label class="form-check-label" for="DarkTheme">Dark</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDarkTheme" value="option3">
      <label class="form-check-label" for="SemiDarkTheme">Semi Dark</label>
    </div>
    <hr>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="MinimalTheme" value="option3">
      <label class="form-check-label" for="MinimalTheme">Minimal Theme</label>
    </div>
    <hr/>
    <h6 class="mb-0">Header Colors</h6>
    <hr/>
    <div class="header-colors-indigators">
      <div class="row row-cols-auto g-3">
        <div class="col">
          <div class="indigator headercolor1" id="headercolor1"></div>
        </div>
        <div class="col">
          <div class="indigator headercolor2" id="headercolor2"></div>
        </div>
        <div class="col">
          <div class="indigator headercolor3" id="headercolor3"></div>
        </div>
        <div class="col">
          <div class="indigator headercolor4" id="headercolor4"></div>
        </div>
        <div class="col">
          <div class="indigator headercolor5" id="headercolor5"></div>
        </div>
        <div class="col">
          <div class="indigator headercolor6" id="headercolor6"></div>
        </div>
        <div class="col">
          <div class="indigator headercolor7" id="headercolor7"></div>
        </div>
        <div class="col">
          <div class="indigator headercolor8" id="headercolor8"></div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!--end switcher-->

</div>




@endsection
