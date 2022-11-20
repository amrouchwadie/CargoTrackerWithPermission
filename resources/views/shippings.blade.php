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
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($shippings as $key => $shipping)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $shipping->cargo_id }}</td>
                            <td>{{ $shipping->cargo_name }}</td>
                            <td>{{ $shipping->sender_name }}</td>
                            <td>{{ $shipping->receiver_name }}</td>
                            <td>
                                <span class="badge rounded-pill alert-success">{{ Str::ucfirst($shipping->status) }}</span>
                            </td>
                            <td>
                                <a href="{{ route('show', $shipping->txn_id) }}"  class="btn">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <button type="button"  class="btn" data-bs-toggle="modal" data-bs-target="#modal{{ $shipping->txn_id }}">
                                    <i class="bi bi-pencil-fill"></i>
                                </button>
                                <button type="button"  class="btn"  data-bs-toggle="modal" data-bs-target="#modalDelete{{ $shipping->txn_id }}">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                                {{--  Edit status modal  --}}
                                <div id="modal{{ $shipping->txn_id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Change Status</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('edit') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="txn_id" value="{{ $shipping->txn_id }}">
                                                    <div class="form-group">
                                                      <label for="status">Status</label>
                                                      <select class="form-control" name="status" id="status">
                                                        <option @if($shipping->status == 'received') selected @endif value="received">Received</option>
                                                        <option @if($shipping->status == 'shipping') selected @endif value="shipped">Shipping</option>
                                                        <option @if($shipping->status == 'reached') selected @endif value="reached">Reached</option>
                                                        <option @if($shipping->status == 'picked') selected @endif value="picked">Picked</option>
                                                      </select>
                                                    </div>

                                                    <br>
                                                        <button data-dismiss="modal" class="btn btn-secondary">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                   
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--  Delete modal and form  --}}
                                <div id="modalDelete{{ $shipping->txn_id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Delete Transactions</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete this transaction?</p>
                                                <form action="{{ route('delete') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="txn_id" value="{{ $shipping->txn_id }}">

                                                    <div class="row justify-content-between m-auto">
                                                        <button type="submit" class="btn btn-danger">Yes</button>
                                                        <button data-dismiss="modal" class="btn btn-secondary">No, Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>

                {{ $shippings->links() }}
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
