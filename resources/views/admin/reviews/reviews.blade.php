@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ulasan Pembeli</h4>
                        <!-- <p class="card-description">
                            Add class <code>.table-bordered</code>
                        </p> -->
                        @if(Session::has('success_message'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success: </strong> {{ Session::get('success_message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        @endif
                        <div class="table-responsive pt-3">
                            <table id="users" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Nama Produk
                                        </th>                                    
                                        <th>
                                            E-mail
                                        </th>
                                        <th>
                                            Judul
                                        </th>
                                        <th>
                                            Isi Ulasan
                                        </th>
                                        <th>
                                            Rating
                                        </th>                                      
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($reviews as $review)                                    
                                    <tr>
                                        <td>
                                            {{ $review['id'] }}
                                        </td>
                                        <td>
                                            {{ $review['product'] ['product_name'] }}
                                        </td>                                        
                                        <td>
                                            {{ $review['user'] ['email'] }}
                                        </td>
                                        <td>
                                            {{ $review['title'] }}
                                        </td>
                                        <td>
                                            {{ $review['review'] }}
                                        </td>
                                        <td>
                                            {{ $review['rating'] }}
                                        </td>                                        
                                        <td>
                                        @if($review['status']==1)
                                            <a class="updateReviewStatus" id="review-{{ $review['id'] }}" review_id="{{ $review['id'] }}" href="javascript:void(0)"><i style="font-size:25px;" class="mdi mdi-bookmark-check" status="Active"></i></a>
                                        @else
                                            <a class="updateReviewStatus" id="review-{{ $review['id'] }}" review_id="{{ $review['id'] }}" href="javascript:void(0)"><i style="font-size:25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i></a>
                                        @endif                                        
                                        </td>
                                    </tr>
                                   @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    @include('admin.layout.footer')
    <!-- partial -->
</div>
@endsection