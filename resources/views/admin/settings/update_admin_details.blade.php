@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Perbarui Data Admin</h3>
                        <!-- <h6 class="font-weight-normal mb-0">Update Admin Password</h6> -->
                    </div>                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Perbarui Data Admin</h4>
                  @if(Session::has('error_message'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error: </strong> {{ Session::get('error_message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  @endif

                  @if(Session::has('success_message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil </strong> {{ Session::get('success_message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif

                  @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
                  
                  <form class="forms-sample" action="{{ url('admin/update-admin-details') }}" method="post" enctype="multipart/form-data">@csrf
                    <div class="form-group">
                      <label>E-mail Admin</label>
                      <input class="form-control" value="{{ Auth::guard('admin')->user()->email }}" name="email">
                    </div>
                    <div class="form-group">
                      <label>Role Admin</label>
                      <input class="form-control" value="{{ Auth::guard('admin')->user()->type }}" name="type" readonly="">
                    </div>
                    <div class="form-group">
                      <label for="admin_name">Nama</label>
                      <input type="text" class="form-control" id="admin_name" placeholder="Masukkan Nama" name="admin_name" value="{{ Auth::guard('admin')->user()->name }}">
                    </div>
                    <div class="form-group">
                      <label for="admin_mobile">Nomor Telepon</label>
                      <input type="text" class="form-control" id="admin_mobile" placeholder="Masukkan Nomor Telepon" name="admin_mobile" value="{{ Auth::guard('admin')->user()->mobile }}" required="" maxlength="20" minlength="12">
                    </div>               
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            
          </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include('admin.layout.footer')
    <!-- partial -->
</div>
@endsection