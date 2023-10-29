<?php use App\Models\Product; ?>
@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      @if(Session::has('success_message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success: </strong> {{ Session::get('success_message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Detail Pesanan #{{ $orderDetails['id'] }}</h3>
                        <h6 class="font-weight-normal mb-0"><a href="{{ url('admin/orders') }}">Kembali ke Daftar Transaksi</a></h6>
                    </div>                    
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Detail Pesanan</h4>
                  
                    <div class="form-group" style="height: 15px;">
                      <label style="font-weight: 550;">ID Pesanan: </label>
                      <label>#{{ $orderDetails['id'] }}</label>
                    </div>
                    <div class="form-group" style="height: 15px;">
                      <label style="font-weight: 550;">Tanggal Pemesanan: </label>
                      <label>{{ date('d-m-Y', strtotime($orderDetails['created_at'])); }}</label>
                    </div>
                    <div class="form-group" style="height: 15px;">
                      <label style="font-weight: 550;">Status Pesanan: </label>
                      <label>{{ $orderDetails['order_status'] }}</label>
                    </div>
                    <div class="form-group" style="height: 15px;">
                      <label style="font-weight: 550;">Total Pesanan: </label>
                      <label>{{ formatRupiah($orderDetails['grand_total']) }}</label>
                    </div>
                    <div class="form-group" style="height: 15px;">
                      <label style="font-weight: 550;">Biaya Pengiriman: </label>
                      <label>{{ formatRupiah($orderDetails['shipping_charges']) }}</label>
                    </div>
                    @if(!empty($orderDetails['coupon_code']))
                      <div class="form-group" style="height: 15px;">
                        <label style="font-weight: 550;">Kode Kupon: </label>
                        <label>{{ $orderDetails['coupon_code'] }}</label>
                      </div>
                      <div class="form-group" style="height: 15px;">
                        <label style="font-weight: 550;">Potongan Kupon: </label>
                        <label>{{ formatRupiah($orderDetails['coupon_amount']) }}</label>
                      </div>
                    @endif
                    <div class="form-group" style="height: 15px;">
                      <label style="font-weight: 550;">Metode Pembayaran: </label>
                      <label>{{ $orderDetails['payment_method'] }}</label>
                    </div>                    
                </div>
              </div>
            </div>
            
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Detail Pembeli</h4>
                  
                    <div class="form-group" style="height: 15px;">
                      <label style="font-weight: 550;">Nama: </label>
                      <label>{{ $userDetails['name'] }}</label>
                    </div>
                    <div class="form-group" style="height: 15px;">
                      <label style="font-weight: 550;">Alamat: {{ $userDetails['address'] }} </label>                     
                    </div>
                    &nbsp;
                    <br>                  
                    <div class="form-group" style="height: 15px;">
                      <label style="font-weight: 550;">Nomor Telepon: </label>
                      <label>{{ $userDetails['mobile'] }}</label>
                    </div>
                    <div class="form-group" style="height: 15px;">
                      <label style="font-weight: 550;">E-mail: </label>
                      <label>{{ $userDetails['email'] }}</label>
                    </div>                                      
                </div>
              </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Perbarui Status Pesanan</h4>
                  <form action="{{ url('admin/update-order-status') }}" method="post" >@csrf
                    <input type="hidden" name="order_id" value="{{ $orderDetails['id'] }}">
                    <select name="order_status" id="order_status" required="">
                      <option value="" selected="">Select</option>
                      @foreach($orderStatuses as $status)
                        <option value="{{ $status['name'] }}" @if(!empty($orderDetails['order_status']) && $orderDetails['order_status']==$status['name']) selected="" @endif>{{ $status['name'] }}</option>
                      @endforeach
                    </select>
                    <input type="text" name="courier_name" id="courier_name" placeholder="Courier Name">
                    <button type="submit">Update</button>
                   </form>
                   <br>                 
                </div>
              </div>
            </div>

            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Produk Pesanan</h4>
                  
                    <table class="table table-striped table-borderless">
                <tr class="table-danger">
                    <th>Gambar Produk</th>
                    <th>Nama Produk</th>
                    <th>Ukuran Produk</th>
                    <th>Jumlah Produk</th>
                </tr>
                
                @foreach($orderDetails['orders_detail'] as $product)
                    <tr>
                        <td>
                            @php $getProductImage = Product::getProductImage($product['product_id']) @endphp
                            <a target="_blank" href="{{ url('product/'.$product['product_id']) }}"><img src="{{ asset('front/images/product_images/small/'.$getProductImage) }}"></a>
                        </td>
                        <td>{{ $product['product_name'] }}</td>
                        <td>{{ $product['product_size'] }}</td>
                        <td>{{ $product['product_qty'] }}</td>                
                    </tr>
                @endforeach   
            </table>                   
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