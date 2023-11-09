@extends('layouts.layout_auth')

@section('title')
    Daftar Akun
@endsection

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="py-5 card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="/" class="gap-2 app-brand-link">
                                <img src="{{ asset('assetsLanding/img/favicon.png') }}" alt="logos"
                                    class="app-brand-logo demo" width="90">


                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-4">Selamat Datang! 👋</h4>

                        <form action="/register" id="formAccountSettings" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="firstName" class="form-label">Nama</label>
                                <input class="form-control  @error('name') is-invalid @enderror" type="text"
                                    id="firstName" name="name" value="{{ old('name') }}" autofocus />
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input class="form-control  @error('address') is-invalid @enderror" type="text"
                                    id="address" name="address" value="{{ old('address') }}" autofocus />
                                @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input class="form-control  @error('email') is-invalid @enderror" type="email"
                                    id="email" name="email" value="{{ old('email') }}" placeholder="" />
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                            <div class="mb-3">
                                <label for="phone" class="form-label">No HP</label>
                                <input class="form-control  @error('phone') is-invalid @enderror" type="text"
                                    id="phone" name="phone" value="{{ old('phone') }}" placeholder="" />
                                @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="license_number" class="form-label">SIM</label>
                                <input class="form-control  @error('license_number') is-invalid @enderror" type="text"
                                    id="license_number" name="license_number" value="{{ old('license_number') }}"
                                    placeholder="" />
                                @error('license_number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-control" name="role" id="role">
                                    <option disabled selected></option>
                                    <option value="Admin">Admin</option>
                                    <option value="Pengguna">Pengguna</option>
                                </select>

                                @error('role')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password Baru</label>
                                <input class="form-control  @error('password') is-invalid @enderror" type="password"
                                    name="password" />
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input class="form-control" type="password" name="password_confirmation" />

                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Daftar</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
