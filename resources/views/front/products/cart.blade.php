<?php use App\Models\Product; ?>
@extends('front.layout.layout')
@section('content')
<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>Keranjang Belanja</h2>                
        </div>
    </div>
</div>
    <!-- Cart-Page -->
    <div class="page-cart u-s-p-t-80">
    <div class="container">
        <div class="row">
                @if(Session::has('error_message'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo Session::get('error_message'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  @endif

                  @if(Session::has('success_message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo Session::get('success_message'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
            <div class="col-lg-12">
                <div id="appendCartItems">
                    @include('front.products.cart_items')
                </div>
                <!-- Coupon -->
                <div class="coupon-continue-checkout u-s-m-b-60">
                    <div class="coupon-area">
                        <h6 style="color=purple">Pilih kode kupon untuk digunakan bila ada. Lihat daftar kupon <a href="{{ url('/coupons') }}" target="_blank" class="item-name"><b><u>disini</u></b></a></h6>
                        <div class="coupon-field">
                        <form id="ApplyCoupon" method="post" action="javascript:void(0);" @if(Auth::check()) user="1" @endif>@csrf
                            <label class="sr-only" for="coupon-code">Apply Coupon</label>
                            <select name="code" id="code" class="text-field-coupon" placeholder="Masukkan Kode Kupon">
                                <option value="">Pilih Kode Kupon</option>
                                @foreach($getCouponItems as $coupon)
                                <option value="{{ $coupon['coupon_code'] }}">{{ $coupon['coupon_code'] }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="button">Apply</button>
                        </div>
                        </form>                        
                    </div>
                    <div class="button-area">
                        <a href="{{ url('/produk') }}" class="continue">Lanjutkan Belanja</a>
                        <a href="{{ url('/checkout') }}" class="button button-primary">Checkout</a>
                    </div>
                </div>
            <!-- Coupon /- -->                
            </div>
        </div>
    </div>
</div>
<!-- Cart-Page /- -->
@endsection