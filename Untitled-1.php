<?php use App\Models\ProductsFilter; ?>

<div class="col-lg-3 col-md-3 col-sm-12">
    <!-- Filter-Brand -->
    # <?php $getCategories = ProductsFilter::getCategories(); ?> 

    <!-- Filter-Brand /- -->
    <!-- <div class="facet-filter-associates">
                        <h3 class="title-name">Pilih Kategori Produk</h3>
                        <form class="facet-form" action="#" method="post">
                            <div class="associate-wrapper">
                                @foreach($getCategories as $key => $category)
                                <input type="checkbox" class="check-box category" name="category[]" id="category{{ $key }}" value="{{ $category['id'] }}">
                                <label class="label-text" for="cbs-21"> {{ $category['category_name'] }}
                                   <span class="total-fetch-items">(0)</span> 
                                </label>
                                @endforeach
                            </div>
                        </form>
                    </div>  -->
                    <!-- Filter-Brand /- -->