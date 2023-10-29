<?php use App\Models\Product; ?>
@extends('front.layout.layout')
@section('content')
<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>Checkout</h2>                
        </div>
</div>
</div>
<!-- Checkout-Page -->
<div class="page-checkout u-s-p-t-80">
    <div class="container">
        @if(Session::has('error_message'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error: </strong> <?php echo Session::get('error_message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        <form name="checkoutForm" id="checkoutForm" action="{{ url('/checkout') }}" method="post">@csrf
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <!-- Billing-&-Shipping-Details -->
                        <div class="col-lg-6" id="deliveryAddresses">
                            <h4 class="section-h4">Alamat Pengiriman</h4>
                                <div><label class="control-label">{{ Auth::user()->name }}, {{ Auth::user()->address }} ({{ Auth::user()->mobile }}) </label>
                                </div>
                                <br>
                                <br>
                                <br>
                                <h4 class="section-h4 deliveryText">Cek Biaya Pengiriman</h4>
                               
                                <div id="showdifferent">
                                    <!-- Form-Fields -->                                  
                                        <input type="hidden" name="delivery_id">
                                        <div class="group-inline u-s-m-b-13">
                                        <div class="group-1 u-s-p-r-16">
                                                <label for="destination">Provinsi
                                                </label>
                                                <div class="select-box-wrapper">
                                                <select class="select-box" id="destination" name="destination">
                                                    <option value="">Pilih Provinsi</option>                                                                                       
                                                    <option value=""></option>
                                                </select>  
                                                </div>                                          
                                            </div>
                                            <div class="group-1 u-s-p-r-16">
                                                <label for="destination">Kota
                                                </label>
                                                <div class="select-box-wrapper">
                                                <select class="select-box" id="destination" name="destination">
                                                    <option value="" selected disabled>Pilih Kota</option>                                                                                       
                                                </select>  
                                                </div>                                          
                                            </div>                                                                                     
                                        </div>
                                        <div class="group-inline u-s-m-b-13">
                                            <div class="group-1 u-s-p-r-16">
                                                <label for="weight">Berat (gr)
                                                </label>
                                                <div class="first-name-extra">
                                                <input type="text" name="weight" id="weight" class="text-field" value="" readonly="">
                                                </div>                                            
                                            </div>   
                                            <div class="group-1 u-s-p-r-16">
                                                <label for="courier">Kurir
                                                </label>
                                                <div class="select-box-wrapper">
                                                    <select class="select-box" id="courier" name="courier">
                                                        <option value="">Pilih Kurir</option>                                               
                                                        <option value="jne">JNE</option>
                                                        <option value="Jnt">J&T</option>                                                                                                
                                                    </select>
                                                </div>                                            
                                            </div>                                                                                     
                                        </div>
                                        <div class="group-inline u-s-m-b-13">
                                        <div class="group-2">
                                                <label for="last-name-extra">Jenis Pengiriman
                                                </label>
                                                <div class="select-box-wrapper">
                                                    <select class="select-box" id="shipping_method" name="shipping_method">
                                                        <option value="">Pilih Jenis Pengiriman</option>                                               
                                                    <option value=""></option>                                                
                                                    </select>
                                                    <p id="delivery-delivery_country"></p>
                                                </div>
                                        </div>
                                        </div>                                                                                                                                                                                                                                                
                                        <div class="u-s-m-b-13">
                                            <button style="width:100%;" type="submit" name="cekOngkir" class="button button-outline-secondary">Cek Biaya Kirim</button>
                                        </div>
                                    <!-- Form-Fields /- -->
                                </div>
                                &nbsp;
                                &nbsp;
                                <div>
                                    <label for="order-notes">Catatan Pemesanan</label>
                                    <textarea class="text-area" id="order-notes" placeholder="Catatan untuk pemesanan Anda"></textarea>
                                </div>
                        </div>
                        <!-- Billing-&-Shipping-Details /- -->
                        <!-- Checkout -->
                        <div class="col-lg-6">
                            <h4 class="section-h4">Pesanan Anda</h4>
                            <div class="order-table">
                                <table class="u-s-m-b-13">
                                    <thead>
                                        <tr>
                                            <th>Produk</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total_price = 0 @endphp
                                        @foreach($getCartItems as $item)
                                        <?php $getDiscountAttributePrice = Product::getDiscountAttributePrice($item['product_id'],$item['size']);
                                        ?>
                                        <tr>
                                            <td>
                                                <a href="{{ url('produk/'.$item['product_id'])}}"><img width="50" src="{{ asset('front/images/product_images/small/'.$item['product']['product_image']) }}" alt="Product">
                                                <h6 class="order-h6">{{ $item['product']['product_name'] }}<br>{{ $item['size'] }} × {{ $item['quantity'] }}</h6></a>
                                            </td>
                                            <td>
                                                <h6 class="order-h6">{{ formatRupiah($getDiscountAttributePrice['final_price'] * $item['quantity']) }}</h6>
                                            </td>
                                        </tr>
                                        @php $total_price = $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity']) @endphp
                                        @endforeach
                                        <tr>
                                            <td>
                                                <h3 class="order-h3">Subtotal</h3>
                                            </td>
                                            <td>
                                                <h3 class="order-h3">{{ formatRupiah($total_price) }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6 class="order-h6">Biaya Pengiriman</h6>
                                            </td>
                                            <td>
                                                <h6 class="order-h6" id="text-cost">Rp0</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6 class="order-h6">Diskon Kupon</h6>
                                            </td>
                                            <td>
                                                <h6 class="order-h6">@if(Session::has('couponAmount'))
                                                    -{{ formatRupiah(Session::get('couponAmount')) }}
                                                @else
                                                    Rp0
                                                @endif</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h3 class="order-h3">Grand Total</h3>
                                            </td>
                                            <td>
                                                <h3 class="order-h3">{{ formatRupiah($total_price - Session::get('couponAmount')) }}</h3>
                                                <input type="hidden" name="shipping_cost" id="shipping_cost" >
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>                                
                                &nbsp;                                          
                                <button type="submit" class="button button-primary">Lanjutkan ke Pembayaran</button>
                            </div>
                        </div>
                        <!-- Checkout /- -->
                    </div>
                </div>
            </div>
        </form>  
    </div>
</div>
<!-- Checkout-Page /- -->

@endsection