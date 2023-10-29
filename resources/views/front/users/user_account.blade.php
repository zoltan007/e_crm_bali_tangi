@extends('front.layout.layout')
@section('content')  
    <!-- Account-Page -->
    <div class="page-account u-s-p-t-80">
        <div class="container">
            <div class="row">
                <!-- Update account details -->
                <div class="col-lg-6">
                    <div class="login-wrapper">
                        <h2 class="account-h2 u-s-m-b-20" style="font-size:24px;">Perbarui Data Akun</h2>
                        <p id="account-error"></p>
                        <p id="account-success"></p>
                        <form id="accountForm" action="javascript:;" method="post">@csrf
                            <div class="u-s-m-b-30">
                                <label for="users-email">E-mail
                                </label>
                                <input class="text-field" id="users-email" name="email" value="{{ Auth::user()->email }}">
                                <p id="account-email"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="users-name">Nama
                                </label>
                                <input class="text-field" type="text" id="users-name" name="name" value="{{ Auth::user()->name }}">
                                <p id="account-name"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="users-mobile">Tanggal Lahir
                                </label>
                            <input class="text-field" type="date" id="users-birthdate" name="birthdate" value="{{ Auth::user()->birthdate }}">
                                <p id="account-birthdate"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="users-address">Alamat Lengkap
                                </label>
                                <input class="text-field" type="text" id="users-address" name="address" value="{{ Auth::user()->address }}">
                                <p id="account-address"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="users-address">Agama
                                </label>
                                <select class="text-field select-box" name="religion" id="religion" required="">
                                    <option value="" selected="">{{ Auth::user()->religion }}</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                    <option value="Kong Hu Chu">Kong Hu Chu</option>
                                </select>
                                <p id="account-religion"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="users-mobile">Nomor Telepon
                                </label>
                            <input class="text-field" type="text" id="users-mobile" name="mobile" value="{{ Auth::user()->mobile }}">
                                <p id="account-mobile"></p>
                            </div>                                                                                                        
                            <div class="m-b-45">
                                <button class="button button-primary w-100">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Update Account Details /- -->
                <!-- Update Password -->
                <div class="col-lg-6">
                    <div class="reg-wrapper">
                        <h2 class="account-h2 u-s-m-b-20" style="font-size:24px;">Ganti Password</h2>
                        <p id="password-success"></p>
                        <p id="password-error"></p>
                        <form id="passwordForm" action="javascript:;" method="post">@csrf 
                            <div class="u-s-m-b-30">
                                <label for="current-password">Password Sekarang
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="current-password" name="current_password" class="text-field" placeholder="Masukkan password saat ini">
                                <p id="password-current_password"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="usermobile">Password Baru
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="new-password" name="new_password" class="text-field" placeholder="Masukkan password baru">
                                <p id="password-new_password"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="useremail">Konfirmasi Password Baru
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="confirm-password" name="confirm_password" class="text-field" placeholder="Masukkan ulang password baru">
                                <p id="password-confirm_password"></p>
                            </div>
                           
                            <div class="u-s-m-b-45">
                                <button class="button button-primary w-100">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Update Password /- -->
            </div>
        </div>
    </div>
    <!-- Account-Page /- -->
@endsection