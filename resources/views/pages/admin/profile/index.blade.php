@extends('layouts.layout_admin')

@section('title')
Update Profile
@endsection

@section('content')
<h4 class="py-3 mb-4 fw-bold"><span class="text-muted fw-light">Update Profile</h4>


<div class="row">
    <div class="col-md-12">
        <div class="mb-4 card">
            <h5 class="card-header">Profile Details</h5>
            <!-- Account -->
            <div class="card-body">
                <div class="gap-4 d-flex align-items-start align-items-sm-center">
                    {{-- <img src="{{ asset('assetsAdmin/img/avatars/1.png') }}" alt="user-avatar" class="rounded d-block" height="100" width="100" id="uploadedAvatar" />
                    <div class="button-wrapper">
                        <input type="file" name="" id="" class="form-control">
                        <p class="mb-0 text-muted">Allowed JPG, GIF or PNG. Max size of 800K</p>
                    </div> --}}
                </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">
                <form action="{{ route('profile.update') }}" id="formAccountSettings" method="POST">
                    @csrf
                    @method('patch')

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Nama</label>
                            <input class="form-control  @error('name') is-invalid @enderror" type="text" id="firstName" name="name" value="{{ old('name', $user->name) }}" autofocus />
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input class="form-control  @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{ old('email', $user->email) }}" placeholder="" />
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">Alamat</label>
                            <input class="form-control  @error('address') is-invalid @enderror" type="text" id="address" name="address" value="{{ old('address', $user->address) }}" autofocus />
                            @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="phone" class="form-label">No HP</label>
                            <input class="form-control  @error('phone') is-invalid @enderror" type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" autofocus />
                            @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-12">
                            <label for="license_number" class="form-label">No SIM</label>
                            <input class="form-control  @error('license_number') is-invalid @enderror" type="text" id="license_number" name="license_number" value="{{ old('license_number', $user->license_number) }}" autofocus />
                            @error('license_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /Account -->
        </div>

        <div class="mb-4 card">
            <h5 class="card-header">Update Password</h5>
            <div class="card-body">
                <form method="post" action="{{ route('password.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Password Lama</label>
                            <input class="form-control  @error('current_password') is-invalid @enderror" type="password" name="current_password" />
                            @error('current_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Password Baru</label>
                            <input class="form-control  @error('password') is-invalid @enderror" type="password" name="password" />
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="" class="form-label">Confirm Password</label>
                            <input class="form-control" type="password" name="password_confirmation" />

                            @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


@endsection
