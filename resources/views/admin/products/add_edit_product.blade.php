@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h4 class="card-title">Produk</h4>
                    </div>                 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tambah atau Edit Produk</h4>
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
                    <strong>Berhasil: </strong> {{ Session::get('success_message')}}
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
                  
                  <form class="forms-sample" @if(empty($product['id'])) action="{{ url('admin/add-edit-product') }}" @else action="{{ url('admin/add-edit-product/'.$product['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                    <div class="form-group">
                      <label for="category_id">Pilih Kategori</label>
                      <select name="category_id" id="category_id" class="form-control text-dark" >
                          <option value="">Select</option>
                          @foreach($categories as $category)
                           <option value="{{ $category['id'] }}" @if(!empty($product['category_id']==$category['id'])) selected="" @endif>{{ $category['category_name'] }}</option>
                          @endforeach
                      </select>
                    </div>
                   
                    <div class="form-group">
                      <label for="product_name">Nama Produk</label>
                      <input type="text" class="form-control" id="product_name" placeholder="Masukkan nama produk" name="product_name" @if(!empty($product['product_name'])) value="{{ $product['product_name'] }}" @else value="{{ old('product_name') }}" @endif>
                    </div>                    
                    <div class="form-group">
                      <label for="product_discount">Diskon Produk (%)</label>
                      <input type="text" class="form-control" id="product_discount" placeholder="Masukkan diskon produk" name="product_discount" @if(!empty($product['product_discount'])) value="{{ $product['product_discount'] }}" @else value="{{ old('product_discount') }}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="product_weight">Berat Produk</label>
                      <input type="text" class="form-control" id="product_weight" placeholder="Masukkan berat produk" name="product_weight" @if(!empty($product['product_weight'])) value="{{ $product['product_weight'] }}" @else value="{{ old('product_weight') }}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="product_weight">Stock Produk</label>
                      <input type="text" class="form-control" id="stock" placeholder="Masukkan stock produk" name="stock" @if(!empty($product['stock'])) value="{{ $product['stock'] }}" @else value="{{ old('stock') }}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="product_image">Gambar Produk (Recommend Size: 1000x1000)</label>
                      <input type="file" class="form-control" id="product_image" name="product_image">
                      @if(!empty($product['product_image']))
                        <a target="_blank" href="{{ url('front/images/product_images/large/'.$product['product_image']) }}">Tampilkan Gambar</a>&nbsp;|&nbsp;
                        <a href="javascript:void(0)" class="confirmDelete" module="product-image" moduleid="{{ $product['id'] }}">Hapus Gambar</a>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="description">Deskripsi Produk</label>
                      <textarea name="description" id="description" class="form-control" rows="3">{{ $product['description'] }}</textarea>
                    </div>    
                    <div class="form-group">
                      <label for="best-selling">Produk Terlaris</label>
                      <input type="checkbox" name="is_bestseller" id="is_bestseller" value="Yes" @if(!empty($product['is_bestseller']) && $product['is_bestseller']=="Yes") checked="" @endif>
                    </div>                
                    <div class="form-group">
                      <label for="is_featured">Produk Pilihan</label>
                      <input type="checkbox" name="is_featured" id="is_featured" value="Yes" @if(!empty($product['is_featured']) && $product['is_featured']=="Yes") checked="" @endif>
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
    <!-- partial:partials/_footer.html -->
    @include('admin.layout.footer')
    <!-- partial -->
</div>
@endsection