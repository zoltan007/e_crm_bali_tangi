@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h4 class="card-title">Pengaturan Kupon</h4>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">{{ $title }}</h4>
                  @if(Session::has('error_message'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error: </strong> {{ Session::get('error_message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  @endif

                  @if(Session::has('success_message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success: </strong> {{ Session::get('success_message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif

                  @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
                  
                  <form class="forms-sample" @if(empty($coupon['id'])) action="{{ url('admin/add-edit-coupon') }}" @else action="{{ url('admin/add-edit-coupon/'.$coupon['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                    @if(empty($coupon['coupon_code']))
                    <div class="form-group">
                      <label for="coupon_option">Opsi Kupon</label><br>
                      <span><input id="AutomaticCoupon" type="radio" name="coupon_option" value="Automatic" checked="">&nbsp;Otomatis&nbsp;&nbsp;
                      <span><input id="ManualCoupon" type="radio" name="coupon_option" value="Manual">&nbsp;Manual&nbsp;&nbsp;
                    </div>
                    <div class="form-group" style="display: none;" id="couponField">
                      <label for="coupon_code">Kode Kupon</label>
                      <input type="text" class="form-control" name="coupon_code" placeholder="Masukkan Kode Kupon" name="coupon_name">
                    </div>
                    @else
                        <input type="hidden" name="coupon_option" value="{{ $coupon['coupon_option'] }}">
                        <input type="hidden" name="coupon_code" value="{{ $coupon['coupon_code'] }}">
                        <div class="form-group">
                          <label for="coupon_code">Kode Kupon:</label>
                          <span>{{ $coupon['coupon_code']}}</span>
                        </div>
                    @endif
                    <div class="form-group">
                      <label for="coupon_type">Tipe Kupon</label><br>
                      <span><input type="radio" name="coupon_type" value="Beberapa Kali Pakai"  @if(isset($coupon['coupon_type'])&&$coupon['coupon_type']=="Multiple Times") checked="" @endif>&nbsp;Beberapa Kali Pakai&nbsp;&nbsp;
                      <span><input type="radio" name="coupon_type" value="Sekali Pakai" @if(isset($coupon['coupon_type'])&&$coupon['coupon_type']=="Single Time") checked="" @endif>&nbsp;Sekali Pakai&nbsp;&nbsp;
                    </div>
                    <div class="form-group">
                      <label for="amount_type">Tipe Jumlah</label><br>
                      <span><input type="radio" name="amount_type" value="Percentage" @if(isset($coupon['amount_type'])&&$coupon['amount_type']=="Percentage") checked="" @endif>&nbsp;Persentase&nbsp;(dalam %)&nbsp;
                      <span><input type="radio" name="amount_type" value="Fixed" @if(isset($coupon['amount_type'])&&$coupon['amount_type']=="Fixed") checked="" @endif>&nbsp;Harga Tetap&nbsp;
                    </div>
                    <div class="form-group">
                      <label for="amount">Amount</label>
                      <input type="text" class="form-control" id="amount" placeholder="Masukkan Amount" name="amount" @if(isset($coupon['amount'])) value="{{ $coupon['amount'] }}" @else value="{{ old('amount') }}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="categories">Pilih Kategori</label>
                      <select name="categories[]" class="form-control text-dark" multiple="" >
                            @foreach($categories as $category)
                           <option value="{{ $category['id'] }}" @if(in_array($category['id'],$selCats)) selected="" @endif>{{ $category['category_name'] }}</option>
                          @endforeach
                      </select>
                    </div>                    
                    <div class="form-group">
                      <label for="users">Pilih User</label>
                      <select name="users[]" class="form-control text-dark" multiple="">
                          @foreach($users as $user)
                           <option value="{{ $user['email'] }}" @if(in_array($user['email'],$selUsers)) selected="" @endif>{{ $user['email'] }}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="expiry_date">Tanggal Berakhir Kupon</label>
                      <input type="date" class="form-control" id="expiry_date" placeholder="Masukkan tanggal berakhir kupon" name="expiry_date" @if(isset($coupon['expiry_date'])) value="{{ $coupon['expiry_date'] }}" @else value="{{ old('expiry_date') }}" @endif>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
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