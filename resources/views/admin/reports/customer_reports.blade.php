@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Laporan Pelanggan</h4>                     
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
                                            No. Telepon
                                        </th>
                                        <th>
                                            Alamat
                                        </th>
                                        <th>
                                            Tanggal Lahir
                                        </th>
                                        <th>
                                            Jumlah Transaksi
                                        </th>
                                        <th>
                                            Tanggal Pembelian Terakhir
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
                                            0817418374203874
                                        </td>
                                        <td>
                                            Pasraman Unud B.73
                                        </td>
                                        <td>
                                            19 Juli 1999
                                        </td>
                                        <td>
                                            7
                                        </td>
                                        <td>
                                            24-05-2023
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