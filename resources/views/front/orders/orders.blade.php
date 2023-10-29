@extends('front.layout.layout')
@section('content')
<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>Daftar Pesanan</h2>                
        </div>
    </div>
</div>
<div class="page-cart u-s-p-t-80">
    <div class="container">
        <div class="row">
            <table class="table table-striped table-borderless">
                <tr class="table-secondary">
                    <th>Produk yang Dipesan</th>
                    <th>Metode Pembayaran</th>
                    <th>Grand Total</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Status Pesanan</th>
                    <th>Aksi</th>
                </tr>
                @foreach($orders as $order)
                <tr>
                <td>
                        @foreach($order['orders_detail'] as $product)
                            {{ $product['product_name'] }}<br>
                        @endforeach
                </td>
                <td>{{$order['payment_method']}}</td>
                <td>{{ formatRupiah($order['grand_total']) }}</td>
                <td>{{ date('d-m-Y', strtotime($order['created_at'])); }}</td>
                <td>{{ $order['order_status'] }}</td> 
                <td><a title="Tampilkan Detail Transaksi" href="{{ url('user/orders/'.$order['id']) }}"><i style="color:purple;" class="fas fa-file-alt"></i></i></a>                
                </td>                  
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection