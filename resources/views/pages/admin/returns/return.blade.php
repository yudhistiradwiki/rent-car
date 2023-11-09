@extends('layouts.layout_admin')

@section('title')
    Car Returns
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="mb-4 card">
                <h5 class="card-header">Pengembalian Mobil</h5>

                <hr class="my-0" />
                <div class="card-body">
                    <form action="{{ route('admin.return') }}" id="formAccountSettings" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="mb-3 col-md-12">
                                <label for="license_plate" class="form-label">License Plate</label>
                                <select name="license_plate" id="license_plate" class="form-control" required>
                                    @foreach(Auth::user()->rentals as $rental)
                                        <option value="{{ $rental->car->license_plate }}">{{ $rental->car->brand }} {{ $rental->car->model }} - {{ $rental->car->license_plate }}</option>
                                    @endforeach
                                </select>
                                @error('license_plate')
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
