@extends('layouts.app')

@section('title', 'Create Events')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Create Map
            </h5>
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif --}}
            <hr>
            <!-- Horizontal Form -->

            @if (session('message'))
                <h6 class="alert alert-success">{{ session('message') }} </h6>
            @endif
            <form class="form-sample" action="" method="POST" enctype="multipart/form-data">
                @csrf


                <div class="row mb-3">
                    <label for="latitude" class="col-sm-2 col-form-label">Latitude<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" name="latitude" class="form-control" id="latitude" placeholder="Latitude"
                            value="{{ old('latitude') }}">
                    </div>
                    @error('latitude')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="longitude" class="col-sm-2 col-form-label">Longitude<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" name="longitude" class="form-control" id="longitude" placeholder="Longitude"
                            value="{{ old('longitude') }}">
                    </div>
                    @error('longitude')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="zoom" class="col-sm-2 col-form-label">Zoom<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" name="zoom" class="form-control" id="zoom" placeholder="zoom"
                            value="{{ old('zoom') }}">
                    </div>
                    @error('zoom')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>




                <div class="col-md-3 mb-3">
                    <button type="submit" id="submit_form" class="btn btn-primary btn-fw">Submit</button>

                </div>

            </form>
        </div>

        <!-- End Horizontal Form -->
    </div>
@endsection

@section('scripts')
