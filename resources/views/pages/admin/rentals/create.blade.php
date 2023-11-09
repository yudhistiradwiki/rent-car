@extends('layouts.layout_admin')

@section('title')
    Create Rentals
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="mb-4 card">
                <h5 class="card-header">Create Rentals</h5>

                <hr class="my-0" />
                <div class="card-body">
                    <form action="{{ route('admin.rentals.store') }}" id="formAccountSettings" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <input type="hidden" value="<?php echo Auth::user()->id ?>" name="user_id">

                            <div class="mb-3 col-md-12">
                                <label for="car_id" class="form-label">Mobil</label>
                                <select class="form-control" name="car_id" id="car_id">
                                    @foreach ($cars as $car)
                                        <option value="{{ $car->id }}">{{ $car->brand }} {{ $car->model }}</option>
                                    @endforeach
                                </select>

                                @error('car_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                            <div class="mb-3 col-md-6">
                                <label for="start_date" class="form-label">start_date</label>
                                <input class="form-control  @error('start_date') is-invalid @enderror" type="date"
                                    id="start_date" name="start_date" value="{{ old('start_date') }}" autofocus />
                                @error('start_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="end_date" class="form-label">end_date</label>
                                <input class="form-control  @error('end_date') is-invalid @enderror" type="date"
                                    id="end_date" name="end_date" value="{{ old('end_date') }}" autofocus />
                                @error('end_date')
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
