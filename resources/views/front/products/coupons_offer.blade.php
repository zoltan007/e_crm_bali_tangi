<?php use App\Models\Product; ?>
@extends('front.layout.layout')
@section('content')
<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>Penawaran Kupon</h2>                
        </div>
    </div>
</div>
    <!-- Cart-Page -->
    <div class="page-cart u-s-p-t-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="appendCartItems">
                <!-- Products-List-Wrapper -->
                <div class="table-wrapper u-s-m-b-60">
                    <table>
                        <thead>
                            <tr>
                                <th>Kode Kupon</th>
                                <th>Jenis Kupon</th>
                                <th>Potongan Kupon</th>
                                <th>Tanggal Berakhir</th>
                            </tr>
                        </thead>
                        @foreach($getCouponItems as $coupon)
                            <tr>
                                <td>
                                <div class="cart-price">
                                    {{ $coupon['coupon_code'] }}    
                                </div>
                                </td>
                                <td>
                                <div class="item-description">
                                    {{ $coupon['coupon_type'] }}    
                                </div>                                            
                                </td>
                                <td>
                                <div class="item-descriptione">
                                    {{ $coupon['amount'] }}%    
                                </div>
                                </td>
                                <td>
                                <div class="item-description">
                                    {{ $coupon['expiry_date'] }}    
                                </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Products-List-Wrapper /- -->
                </div>                          
            </div>
        </div>
    </div>
</div>
<!-- Cart-Page /- -->
@endsection