@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h4 class="card-title">Live Chat</h4>
                    </div>                 
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Kelola Live Chat</h4>                
                <p>  Kelola Live Chat yang dikirimkan oleh pengunjung situs Anda melalui dashboard tawk.to. Tingkatkan hubungan antar pelanggan dengan Anda. Silahkan log in dengan e-mail dan password yang sudah didaftarkan. </p>
                 <br>           
                <a class="btn btn-success" href="https://dashboard.tawk.to/login" target="_blank">Kunjungi dashboard tawk.to</a>
                </div>                  
            </div>                                    
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