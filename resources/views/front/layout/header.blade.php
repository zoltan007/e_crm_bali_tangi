        <!-- Top-Header -->
        <div class="full-layer-mid-header">
            <div class="container">
                <div class="row clearfix align-items-center">
                    <div class="col-lg-3 col-md-9 col-sm-6">
                        <div class="brand-logo text-lg-center">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('front/images/main-logo/logo.png') }}" alt="Bali Tangi" class="app-brand-logo">
                            </a>
                        </div>
                    </div>
                    <div>
                    <ul class="bottom-nav g-nav u-d-none-lg">
                            <li>
                                <a href="{{ url('/') }}">Home
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/about-us') }}">Tentang Kami
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/produk') }}">Katalog Produk
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/contact-us') }}">Kontak
                                </a>
                            </li>                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top-Header /- -->
            <!-- Header -->
    <header>
        <!-- Mid-Header -->
        <div class="full-layer-outer-header">
            <div class="container clearfix">
                <nav>
                    <ul class="primary-nav g-nav">
                        <li>
                            <a href="tel:+111222333">
                                <i class="fas fa-phone u-c-brand u-s-m-r-9"></i>
                                Nomor Telepon: +62 81-353-451-888</a>
                        </li>
                        <li>
                            <a href="mailto:balitangi168@yahoo.com">
                                <i class="fas fa-envelope u-c-brand u-s-m-r-9"></i>
                                E-mail: balitangi168@yahoo.com
                            </a>
                        </li>
                    </ul>
                </nav>
                <nav>
                    <ul class="secondary-nav g-nav">
                        <li>                                                       
                            <a href="">@if(Auth::check()) Akun Saya @else Register/Login @endif
                                <i class="fas fa-chevron-down u-s-m-l-9"></i>
                            </a>
                            <ul class="g-dropdown" style="width:200px">   
                            @if(Auth::check())                                                      
                            <li class="dropdown-account">
                                <a href="{{ url('user/account') }}">
                                <i class="fas fa-cog u-s-m-r-9"></i>
                                Pengaturan Akun</a>
                            </li>
                            <li class="dropdown-account">
                                <a href="{{ url('user/orders') }}">
                                <i class="fas fa-th-list u-s-m-r-9"></i>
                                Daftar Pesanan</a>
                            </li>
                            <li class="dropdown-account">
                                <a href="{{ url('user/logout') }}">
                                <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                Logout</a>
                            </li>                        
                            @else
                            <li class="dropdown-account">
                                <a href="{{ url('user/login-or-register') }}">
                                <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                Register/Login</a>
                             </li>                          
                            @endif
                            </ul>
                        </li>      
                        <li class="u-d-none-lg">
                            <a href="{{ url('/coupons') }}">
                                <i class="fas fa-ticket-alt" title="Kupon"></i>
                            </a>                                            
                        </li>                      
                        <li class="u-d-none-lg">
                            <a href="{{ url('/wishlist') }}">
                                <i class="fas fa-heart" title="Wishlist"></i>
                            </a>
                        </li>
                        <li class="u-d-none-lg">
                            <a href="{{ url('/cart') }}">
                                <i class="fas fa-shopping-cart" title="Keranjang Belanja"></i>
                            </a>                                            
                        </li>
                                                                         
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Mid-Header /- -->
     
        <!-- 
        <div class="full-layer-bottom-header">
            <div class="container">
                <div class="bottom-nav g-nav u-d-none-lg">
                    <div class="col-lg-3">                        
                    </div>
                    <div class="col-lg-9">
                    <div class="col-lg-6 u-d-none-lg">
                        <form class="form-searchbox">
                            <label class="sr-only" for="search-landscape">Search</label>
                            <input id="search-landscape" type="text" class="text-field" placeholder="Cari produk">                            
                            <button id="btn-search" type="submit" class="button button-primary fas fa-search"></button>
                        </form>
                    </div>                     
                    </div>
                </div>
            </div>
        </div>
         -->
    </header>
    <!-- Header /- -->