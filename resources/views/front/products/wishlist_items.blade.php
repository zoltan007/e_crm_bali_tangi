<?php use App\Models\Product; ?>  
  
  <!-- Products-List-Wrapper -->
  <div class="table-wrapper u-s-m-b-60">
            <table>
                <thead>
                    <tr>
                        <th class="text-left">Produk</th>
                        <th class="text-left">Harga Unit</th>
                        <th class="text-left">Status Ketersediaan</th>
                        <th class="text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total_price = 0 @endphp
                    @foreach($getWishlistItems as $item)
                    <?php $getDiscountAttributePrice = Product::getDiscountAttributePrice($item['product_id'],$item['size']);
                    ?>
                    <tr>
                        <td class="text-left">
                            <div class="cart-anchor-image">
                                <a href="{{ url('produk/'.$item['product_id'])}}">
                                    <img src="{{ asset('front/images/product_images/small/'.$item['product']['product_image']) }}" alt="Product">
                                    <h6>
                                        <b>{{ $item['product']['product_name'] }}</b> <br>
                                        Ukuran: {{ $item['size'] }}
                                    </h6>
                                </a>
                            </div>
                        </td>                     
                        <td class="text-left">
                                <div class="cart-price">
                                @if($getDiscountAttributePrice['discount']>0)
                                <div class="price-template">
                                    <div class="item-new-price">
                                        {{ formatRupiah($getDiscountAttributePrice['final_price']) }}
                                    </div>
                                    <div class="item-old-price" style="margin-left:-40px;">
                                        {{ formatRupiah($getDiscountAttributePrice['product_price']) }}
                                    </div>
                                </div>
                                @else
                                <div class="price-template">
                                    <div class="item-new-price">
                                        {{ formatRupiah($getDiscountAttributePrice['final_price']) }}
                                    </div>
                                </div>
                            @endif
                            </div>
                        </td>
                        <td>
                        </td>    
                        <td class="text-right">
                            <div class="action-wrapper">
                                <form action="{{ url('cart/add') }}" class="post-form" method="Post">@csrf
                                   
                                    <button class="button button-primary" type="submit">Add to cart</button>
                                </form>                                             
                            </div>
                        </td>
                        <td class="text-left">
                        <div class="action-wrapper">
                            <button class="button button-outline-secondary fas fa-trash deleteWishlistItem" data-wishlistid="{{ $item['id'] }}"></button>                                    
                        </div>
                        </td>   
                    </tr> 
                    @endforeach                   
                </tbody>
            </table>
        </div>
        <!-- Products-List-Wrapper /- -->