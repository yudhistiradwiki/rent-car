@extends('layouts.layout_admin')

@section('title')
Create Cars
@endsection

@section('content')
<a href="{{ route('admin.cars.index') }}" type="button" class="mb-3 btn btn-primary ">
    Kembali
</a>

<div class="row">
    <div class="col-md-12">
        <div class="mb-4 card">
            <h5 class="card-header">Create Cars</h5>

            <hr class="my-0" />
            <div class="card-body">
                <form action="{{ route('admin.cars.store') }}" id="formAccountSettings" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="brand" class="form-label">Brand</label>
                            <input class="form-control  @error('brand') is-invalid @enderror" type="text" id="brand"
                                name="brand" value="{{ old('brand') }}" autofocus />
                            @error('brand')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="model" class="form-label">Model</label>
                            <input class="form-control  @error('model') is-invalid @enderror" type="text" id="model"
                                name="model" value="{{ old('model') }}" autofocus />
                            @error('model')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="license_plate" class="form-label">License Plate</label>
                            <input class="form-control  @error('license_plate') is-invalid @enderror" type="text" id="license_plate"
                                name="license_plate" value="{{ old('license_plate') }}" autofocus />
                            @error('license_plate')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="daily_rate" class="form-label">License Plate</label>
                            <input class="form-control  @error('daily_rate') is-invalid @enderror" type="number" id="daily_rate"
                                name="daily_rate" value="{{ old('daily_rate') }}" autofocus />
                            @error('daily_rate')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-12">
                            <label for="" class="form-label">Upload Foto</label>
                            <input class="form-control" type="file" id="formFile" name="file" value="{{ old('file') }}"/>
                            {{-- <input type="file" name="file"> --}}
                            @error('file')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Simpan</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>
@endsection
