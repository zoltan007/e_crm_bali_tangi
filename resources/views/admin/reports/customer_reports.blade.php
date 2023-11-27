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
                                            Tanggal Lahir
                                        </th>
                                        <th class="text-center">
                                            Jumlah 
                                            <br>
                                            Transaksi
                                        </th>
                                        <th class="text-center">
                                            Tanggal<br>
                                            Pembelian Terakhir
                                        </th>
                                        <th class="text-center">
                                            Total<br>
                                            pengeluaran
                                        </th>                                        
                                    </tr>
                                </thead>
                                <tbody>                                                                    
                                    <tr>
                                        <td>
                                            
                                        </td>
                                        <td>
                                          
                                        </td>                                        
                                        <td>
                                                                                                                            
                                        </td>
                                        <td>
                                            
                                        </td>
                                        <td>
                                            
                                        </td>
                                        <td>
                                            
                                        </td>
                                        <td>
                                           
                                        </td>
                                        <td>
                                           
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