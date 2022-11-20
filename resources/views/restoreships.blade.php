@extends('layouts.app')

@section('title', 'All Shippings')

@section('content')

<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">eCommerce</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Products List</li>
          </ol>
        </nav>
      </div>
      <div class="ms-auto">
        <div class="btn-group">
          <button type="button" class="btn btn-primary">Settings</button>
          <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
          </button>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
            <a class="dropdown-item" href="javascript:;">Another action</a>
            <a class="dropdown-item" href="javascript:;">Something else here</a>
            <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
          </div>
        </div>
      </div>
    </div>
    <!--end breadcrumb-->

      <div class="card">
        <div class="card-header py-3">
          <div class="row align-items-center m-0">
            <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                <select class="form-select">
                    <option>All category</option>
                    <option>Fashion</option>
                    <option>Electronics</option>
                    <option>Furniture</option>
                    <option>Sports</option>
                </select>
            </div>
            <div class="col-md-2 col-6">
                <input type="date" class="form-control">
            </div>
            <div class="col-md-2 col-6">
                <select class="form-select">
                    <option>Status</option>
                    <option>Active</option>
                    <option>Disabled</option>
                    <option>Show all</option>
                </select>
            </div>
         </div>
        </div>
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

          <div class="table-responsive">
            <table id="myTable" class="table table-striped table-inverse table-responsive-sm">
                <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th>Cargo ID</th>
                        <th>Cargo Name</th>
                        <th>Sender</th>
                        <th>Receiver</th>
                      
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($shippings as $key => $shipping)
                        @if ($shipping->deleted_at !=null )
                            
                     
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $shipping->cargo_id }}</td>
                            <td>{{ $shipping->cargo_name }}</td>
                            <td>{{ $shipping->sender_name }}</td>
                            <td>{{ $shipping->receiver_name }}</td>
                           
                            <td>
                                <a href="{{ route('show', $shipping->txn_id) }}"  class="btn">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <a href="{{ route('restoreships.restore',$shipping->txn_id) }}" class="btn " onclick="return confirm('voulez-vous vraiment restaurer cet utilisateur?');">      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-repeat"><polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path></svg>
                                </a>

                                {{--  Edit status modal  --}}
                            
                                {{--  Delete modal and form  --}}
                              
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
            </table>

            
          </div>

    <nav class="float-end mt-4" aria-label="Page navigation">
      <ul class="pagination">
        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </nav>

</div>
</div>

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

</div>
@endsection
