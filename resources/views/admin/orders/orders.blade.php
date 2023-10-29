@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Kelola Transaksi</h4>
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
                            <table id="orders" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Tanggal
                                        </th>                                    
                                        <th>
                                            Nama
                                        </th>
                                        <th>
                                            E-mail
                                        </th>
                                        <th>
                                            Produk 
                                            <br>
                                            Pesanan
                                        </th>
                                        <th>
                                            Grand
                                            <br>
                                            Total
                                        </th>
                                        <th>
                                            Status
                                            <br>Pesanan
                                        </th>
                                        <th>
                                            Metode
                                            <br>
                                            Pembayaran
                                        </th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($orders as $order)
                                  @if($order['orders_detail'])                                    
                                <tr>
                                    <td>
                                        {{ $order['id'] }} 
                                    </td>
                                    <td>
                                        {{ date("d-m-Y", strtotime($order['created_at'])) }} 
                                    </td>                                        
                                    <td>
                                        {{ $order['name'] }} 
                                    </td>
                                    <td>
                                        {{ $order['email'] }} 
                                    </td>

                                    <td>
                                        @foreach($order['orders_detail'] as $product)
                                            {{ $product['product_name'] }} ({{ $product['product_qty']}}) <br> 
                                        @endforeach
                                    </td>
                                    <td>
                                        {{ formatRupiah($order['grand_total']) }} 
                                    </td>
                                    <td>
                                        {{ $order['order_status'] }} 
                                    </td>
                                    <td>
                                        {{ $order['payment_method'] }} 
                                    </td>                                          
                                    <td>
                                        <a title="Tampilkan Detail Transaksi" href="{{ url('admin/orders/'.$order['id']) }}"><i style="font-size:25px;" class="mdi mdi-file-document"></i></a>
                                        &nbsp;
                                        &nbsp;
                                        
                                        <a target="_blank" title="Tampilkan Invoice Transaksi" href="{{ url('admin/orders/invoice/'.$order['id']) }}"><i style="font-size:25px;" class="mdi mdi-printer"></i></a>
                                    </td>
                                </tr>
                                    @endif
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