<?php use App\Models\Product; ?>
@extends('front.layout.layout')
@section('content')
<div class="page-style-a">
        <div class="container">
                    <div class="page-intro">
                        <h2>Katalog Produk</h2>                
                    </div>
        </div>
    </div>
    <!-- Shop-Page -->
    <div class="page-shop u-s-p-t-80">
        <div class="container">
            <div class="row">
                <!-- Shop-Left-Side-Bar-Wrapper -->
                @include ('front.products.filters')
                <!-- Shop-Left-Side-Bar-Wrapper /- -->
                <!-- Shop-Right-Wrapper -->
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <!-- Page-Bar -->                   
                    <div class="page-bar clearfix">                        
                        <!-- Toolbar Sorter 1  -->                        
                        <!-- //end Toolbar Sorter 1  -->
                        <!-- Toolbar Sorter 2  -->
                        <div class="toolbar-sorter-2">
                            <div class="select-box-wrapper">
                                <label class="sr-only" for="show-records">Show Records Per Page</label>
                                <select class="select-box" id="show-records">
                                    <option selected="selected" value="">Show: 8</option>
                                    <option value="">Show: 16</option>
                                    <option value="">Show: 28</option>
                                </select>
                            </div>
                        </div>
                        <!-- //end Toolbar Sorter 2  -->
                    </div>
                    <!-- Page-Bar /- -->
                    <!-- Row-of-Product-Container -->
                    <div class="row product-container list-style">
                        @foreach($productsListing as $product)
                        <div class="product-item col-lg-4 col-md-6 col-sm-6">
                            <div class="item">
                                <div class="image-container">
                                    <a class="item-img-wrapper-link" href="{{ url('produk/'.$product['id']) }}">
                                        <?php $product_image_path = 'front/images/product_images/small/'.$product['product_image']; ?>
                                        @if(!empty($product['product_image']) && file_exists($product_image_path))
                                        <img class="img-fluid" src="{{ asset($product_image_path) }}" alt="Product">
                                        @else
                                        <img class="img-fluid" src="{{ asset('front/images/product_images/small/no-image.png') }}" alt="Product">
                                        @endif
                                    </a>                               
                                </div>
                                <div class="item-content">
                                    <div class="what-product-is">
                                        <ul class="bread-crumb">                                        
                                            <li>
                                                <a href="listing.html">{{ $product['category'] ['category_name'] }}</a>
                                            </li>
                                        </ul>
                                        <h6 class="item-title">
                                            <a href="{{ url('produk/'.$product['id']) }}" class="item-name">{{ $product['product_name'] }}</a>
                                        </h6>
                                        <div class="item-description">
                                            <p>
                                            {{ $product['description'] }}    
                                            </p>
                                        </div>
                                        <div class="item-stars">
                                            <div class="star" title=" out of 0 - based on Reviews">
                                            </div>
                                            <span>(0)</span>
                                        </div>
                                    </div>
                                    <?php $getDiscountAttributePrice = Product::getDiscountAttributePrice($product['id']); ?>
                                    @foreach($product['attributes'] as $attribute)
                                    @if($getDiscountAttributePrice['discount']>0)
                                    <div class="price-template">
                                         <div class="item-new-price">
                                            {{ formatRupiah($getDiscountAttributePrice['final_price']) }}                                         </div>
                                        <div class="item-old-price" style="color:red">
                                            {{ formatRupiah($attribute['price']) }}
                                        </div>
                                    </div>
                                    @else
                                    <div class="price-template">
                                            <div class="item-new-price">
                                            {{ formatRupiah($attribute['price']) }}
                                            </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>                                
                            </div>
                        </div>
                       @endforeach
                    </div>                    
                </div>
                <!-- Shop-Right-Wrapper /- -->
                <!-- Shop-Pagination -->          
            </div>
        </div>
    </div>
    <!-- Shop-Page /- -->
@endsection
