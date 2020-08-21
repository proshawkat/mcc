@extends('layouts.frontend')

@section('content')
    <style>
        .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
            color: #fff;
            background-color: #13171a;
        }
        a.nav-link{
            color: #4A4A4A;
        }
    </style>
    <section>
        <div class="container">
            <div class="row pt-3">
                <div class="col-3">
                    <div class="nav flex-column nav-pills user-nav" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link" href="">
                            <div>
                                @if( Auth::user()->photo)
                                    <img class="user-img" src="{{ url('public/storage/users/', Auth::user()->photo) }}" alt="">
                                @else
                                    @if( Auth::user()->gender == 'male')
                                        <img class="user-img" src="{{ asset('public/assets/img/male.png') }}" alt="">
                                    @else
                                        <img class="user-img" src="{{ asset('public/assets/img/female.png') }}" alt="">
                                    @endif
                                @endif
                                    {{ Auth::user()->name }}
                            </div>
                        </a>
                        <a class="nav-link" href="{{ route('user.user_list') }}">
                            <img src="{{ asset('public/assets/img/users_icon.png') }}" alt="">
                            User List
                        </a>
                        <a class="nav-link" href="{{ route('user.profile') }}">
                            <img class="user-img" src="{{ asset('public/assets/img/settings.png') }}" alt="">
                            Profile
                        </a>
                    </div>
                </div>
                <div class="col-9 user-list-container">
                    @yield('user_content')
                </div>
            </div>
        </div>
    </section>
@endsection
