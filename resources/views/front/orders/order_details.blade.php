<?php use App\Models\Product; ?>
@extends('front.layout.layout')
@section('content')
<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>Detail Pesanan #{{ $orderDetails['id'] }} </h2>                
        </div>
    </div>
</div>
<div class="page-cart u-s-p-t-80">
    <div class="container">
        <div class="row">
            <table class="table table-striped table-borderless">
                <tr class="table-secondary"><td colspan="2"><strong>Detail Pesanan</strong></td></tr>
                <tr><td>Tanggal Pemesanan</td><td>{{ date('Y-m-d h:i:s', strtotime($orderDetails['created_at'])); }}</td></tr>
                <tr><td>Status Pesanan</td><td>{{ $orderDetails['order_status']}}</td></tr>
                <tr><td>Total Pesanan</td><td>{{ $orderDetails['order_status']}}</td></tr>
                <tr><td>Biaya Pengiriman</td><td>{{ $orderDetails['shipping_charges']}}</td></tr>
                @if($orderDetails['coupon_code']!="")
                <tr><td>Kode Kupon</td><td>{{ $orderDetails['coupon_code']}}</td></tr>
                <tr><td>Potongan Kupon</td><td>{{ $orderDetails['coupon_amount']}}</td></tr>
                @endif
              
            
                <tr><td>Metode Pembayaran</td><td>{{ $orderDetails['payment_method']}}</td></tr>
            </table>
            <table class="table table-striped table-borderless">
                <tr class="table-secondary">
                    <th>Gambar Produk</th>
                    <th>Nama Produk</th>
                    <th>Ukuran Produk</th>
                    <th>Jumlah Produk</th>
                </tr>
                @foreach($orderDetails['orders_detail'] as $product)
                    <tr>
                        <td>
                            @php $getProductImage = Product::getProductImage($product['product_id']) @endphp
                            <a target="_blank" href="{{ url('product/'.$product['product_id']) }}"><img style="width:80px" src="{{ asset('front/images/product_images/small/'.$getProductImage) }}"></a>
                        </td>
                        <td>{{ $product['product_name'] }}</td>
                        <td>{{ $product['product_size'] }}</td>
                        <td>{{ $product['product_qty'] }}</td>
                    </tr>
                
                @endforeach   
            </table>
            <table class="table table-striped table-borderless">
                <tr class="table-secondary"><td colspan="2"><strong>Alamat Pengiriman</strong></td></tr>
                <tr><td>Nama</td><td>{{ $orderDetails['name']}}</td></tr>
                <tr><td>Alamat</td><td>{{ $orderDetails['address']}}</td></tr>
                <tr><td>Nomor Telepon</td><td>{{ $orderDetails['mobile']}}</td></tr>
            </table>
        </div>
    </div>
</div>
@endsection