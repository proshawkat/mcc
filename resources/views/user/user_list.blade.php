@extends('home')

@section('user_content')
    <div class="container">
        <div class="row">
            @if(count($users)>0)
                @foreach($users as $user)
                    <div class="col-xl-6 col-md-6">
                        <div class="card user-list-card mb-3">
                            @if($user->photo)
                                <img src="{{ url('storage/users/', $user->photo) }}" class="card-img-top user-profile-img" alt="{{ $user->name }}">
                            @else
                                @if( $user->gender == 'male')
                                    <img src="{{ asset('assets/img/male.png') }}" class="card-img-top user-profile-img" alt="{{ $user->name }}">
                                @else
                                    <img src="{{ asset('assets/img/female.png') }}" class="card-img-top user-profile-img" alt="{{ $user->name }}">
                                @endif
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $user->name }}</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Distance: {{ $user->distance }} Km</li>
                                    <li class="list-group-item">Age: {{ $user->age }}</li>
                                    <li class="list-group-item">Gender: {{ $user->gender }}</li>
                                </ul>
                            </div>
                            <div class="card-footer user-profile-like">
                                @if($user->rating)
                                    <a href="#" class="card-link" onclick="ratingSubmit({{ $user->id .' , '. $user->rating->like_dislike }})">
                                        <i class="fa {{ $user->rating->like_dislike == 1 ? 'fa-thumbs-up active' : 'fa-thumbs-down active' }}"></i>
                                    </a>
                                @else
                                    <a href="#" class="card-link" onclick="ratingSubmit({{ $user->id .' , '. 1 }})">
                                        <i class="fa fa-thumbs-up"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-xl-12 col-md-12 text-center">
                    <p class="text-center">Your have no nearest users</p>
                </div>
            @endif
        </div>
    </div>
@endsection
@section('js')
    <script>
        function ratingSubmit(user_id, status) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            toastr.options = {
                "closeButton": true,
                "newestOnTop": true,
                "positionClass": "toast-top-right"
            };

            $.ajax({
                url: "{{ route('user.profile.rating') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    user_id:user_id,
                    status:status
                },
                success: function (data) {
                    if(data.success){
                        toastr.success(data.message);
                        setTimeout(function () {
                            location.reload()
                        },2000)
                    }
                    console.log()
                }
            })
        }
    </script>
@endsection
