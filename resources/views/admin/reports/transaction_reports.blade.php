@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Laporan Transaksi</h4>                   
                        <div class="table-responsive pt-3">
                            <table id="reports" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Nama
                                        </th>                                    
                                        <th>
                                            E-mail
                                        </th>
                                        <th>
                                            Nama Produk
                                        </th>
                                        <th>
                                            Jumlah Pembelian
                                        </th>
                                        <th>
                                            Metode Pembayaran
                                        </th>
                                        <th>
                                            Tanggal Transaksi
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        
                                    </tr>
                                </thead>
                                <tbody>                                                                    
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            Daniel Zoltan
                                        </td>                                        
                                        <td>
                                            danielsyahreza@gmail.com
                                        </td>
                                        <td>
                                            Rempah Wangi Scrub
                                        </td>
                                        <td>
                                            3
                                        </td>
                                        <td>
                                            Transfer Bank
                                        </td>
                                        <td>
                                            24-05-2023
                                        </td>
                                        <td>
                                            Sudah Dibayar
                                        </td>                                          
                                    </tr>
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