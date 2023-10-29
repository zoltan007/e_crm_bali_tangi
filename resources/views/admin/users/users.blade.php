@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">User Terdaftar</h4>
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
                            <table id="users" class="table table-bordered">
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
                                            Agama
                                        </th>
                                        <th>
                                            Alamat
                                        </th>
                                        <th>
                                            Nomor Telepon
                                        </th>
                                        <th>
                                            Tanggal Terdaftar
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($users as $user)
                                    
                                    <tr>
                                        <td>
                                            {{ $user['id'] }}
                                        </td>
                                        <td>
                                            {{ $user['name'] }}
                                        </td>                                        
                                        <td>
                                            {{ $user['email'] }}
                                        </td>
                                        <td>
                                            {{ $user['religion'] }}
                                        </td>
                                        <td>
                                            {{ $user['address'] }}
                                        </td>
                                        <td>
                                            {{ $user['mobile'] }}
                                        </td>
                                        <td>
                                            {{ date('Y-m-d h:i:s', strtotime($user['created_at'])); }}
                                        </td>   
                                        <td>
                                            @if($user['status']==1)
                                              <a class="updateUserStatus" id="user-{{ $user['id'] }}" user_id="{{ $user['id'] }}" href="javascript:void(0)"><i style="font-size:25px;" class="mdi mdi-bookmark-check" status="Aktif"></i></a>
                                            @else
                                              <a class="updateUserStatus" id="user-{{ $user['id'] }}" user_id="{{ $user['id'] }}" href="javascript:void(0)"><i style="font-size:25px;" class="mdi mdi-bookmark-outline" status="Non-aktif"></i></a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="confirmDelete" module="user" moduleid="{{ $user['id'] }}"><i style="font-size:25px;" class="mdi mdi-file-excel-box"></i></a>
                                        </td>
                                    </tr>
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