@extends('home')

@section('user_content')
    <div class="mt-3">
        <div class="card-body bg-white">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="name">Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ Auth::user()->name }}" placeholder="Name" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ Auth::user()->email }}" placeholder="Email" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="date_of_birth">Date of Birth</label>
                                <input id="date_of_birth" type="date" class="form-control"
                                       name="date_of_birth" value="{{ Auth::user()->date_of_birth }}" placeholder="Date of birth" required >

                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="latitude">Latitude</label>
                            <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Latitude *" value="{{ Auth::user()->latitude }}" />
                        </div>
                        <div class="form-group">
                            <label for="longitude">Longitude</label>
                            <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Longitude *" value="{{ Auth::user()->longitude }}" />
                        </div>

                        <div class="form-group">
                            <div class="maxl">
                                <label class="radio inline">
                                    <input type="radio" name="gender" value="male" {{ Auth::user()->gender == 'male' ? 'checked' : '' }} >
                                    <span> Male </span>
                                </label>
                                <label class="radio inline">
                                    <input type="radio" name="gender" value="female" {{ Auth::user()->gender == 'female' ? 'checked' : '' }}>
                                    <span>Female </span>
                                </label>
                            </div>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                            @enderror
                        </div>


                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="file" name="photo">
                                @if( Auth::user()->photo)
                                    <img width="100" src="{{ url('public/storage/users/', Auth::user()->photo) }}" alt="">
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Your Profile') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            }
            function showPosition(position) {
                $('#latitude').val(position.coords.latitude)
                $('#longitude').val(position.coords.longitude)
            }

        });
    </script>
@endsection
