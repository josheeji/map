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


                <div class="row mb-2">
                    <label for="latitude" class="col-sm-2 col-form-label">Latitude<span class="text-danger">*</span></label>
                    <div class="col-sm-4">

                        <input type="text" name="latitude" class="form-control" id="latitude" placeholder="Latitude"
                            value="{{ old('latitude') }}">
                        @error('latitude')
                            <span class='text-danger'>{{ $message }}</span>
                        @enderror
                    </div>


                    <label for="longitude" class="col-sm-2 col-form-label">Longitude<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-4">

                        <input type="text" name="longitude" class="form-control" id="longitude" placeholder="Longitude"
                            value="{{ old('longitude') }}">
                        @error('longitude')
                            <span class='text-danger'>{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="zoom" class="col-sm-2 col-form-label">Zoom<span class="text-danger">*</span></label>

                    <div class="col-sm-4">

                        <input type="text" name="zoom" class="form-control" id="zoom" placeholder="zoom"
                            value="{{ old('zoom') }}">
                        @error('zoom')
                            <span class='text-danger'>{{ $message }}</span>
                        @enderror
                    </div>


                    <label for="height" class="col-sm-2 col-form-label">Height<span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input type="text" name="height" class="form-control" id="height" placeholder="height"
                            value="{{ old('height') }}">
                        @error('height')
                            <span class='text-danger'>{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="row mb-3">
                    <label for="width" class="col-sm-2 col-form-label">Width<span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input type="text" name="width" class="form-control" id="width" placeholder="width"
                            value="{{ old('width') }}">
                        @error('width')
                            <span class='text-danger'>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <button type="submit" id="submit_form" class="btn btn-primary btn-fw">Submit</button>

                    </div>
                </div>







            </form>
        </div>

        <!-- End Horizontal Form -->
    </div>
    {{-- map List --}}
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">List Map
            </h5>

            <hr>
            <!-- Horizontal Form -->

            @if (session('message'))
                <h6 class="alert alert-success">{{ session('message') }} </h6>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>

                        <th scope="col" width="10%">S.No.</th>

                        <th scope="col">Latitude</th>
                        <th scope="col">Longitude</th>
                        <th scope="col">Image</th>
                        {{-- <th scope="col">Image</th>
                        <th scope="col">Image</th> --}}

                    </tr>
                </thead>
                <tbody>
                    @php $i=1 @endphp
                    @foreach ($maps as $map)
                        <tr>
                            <td>{{ $i++ }} </td>
                            <td>{{ $map->latitude }} </td>
                            <td>{{ $map->longitude }} </td>

                            <td>
                                <img src="{{ asset($map->image) }}" alt="Map" width="70px" height="70px">

                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <!-- End Horizontal Form -->
    </div>
@endsection
