@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h4 class="card-title">Kirim Newsletter</h4>
                    </div>                 
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Kelola Newsletter</h4>                
                <p>  Kelola dan kirim newsletter kepada subscriber menggunakan Mailchimp. Kirimkan promosi, kabar terbaru serta penawaran khusus untuk pelanggan Anda melalui e-mail. Silahkan log in dengan e-mail dan password yang sudah didaftarkan. </p>
                 <br>           
                 <a class="btn btn-warning" href="https://login.mailchimp.com/" target="_blank">Kunjungi dashboard Mailchimp</a>                 
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