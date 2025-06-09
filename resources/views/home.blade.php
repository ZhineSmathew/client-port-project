@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-header text-white fw-bold rounded-top-4" 
                     style="background: linear-gradient(135deg, #1e3c72, #2a5298); font-size: 1.4rem;">
                    {{ __('Dashboard') }}
                </div>

                <div class="card-body bg-light rounded-bottom-4 p-4">
                    @if (session('status'))
                        <div class="alert alert-success text-center fw-semibold" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5 class="text-dark fw-bold">{{ __('You are logged in!') }}</h5>

                    {{-- Show Admin Details if User is Admin --}}
                    @if (Auth::check() && Auth::user()->isAdmin())
                        <div class="mt-4 p-3 bg-white rounded shadow-sm">
                            <h4 class="text-primary fw-bold"><i class="fa-solid fa-user-tie"></i> Admin Details</h4>
                            <p class="text-muted"><strong>Name:</strong> {{ Auth::user()->name }}</p>
                            <p class="text-muted"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                            <p class="text-muted"><strong>Role:</strong> Admin</p>
                            <p class="text-muted"><strong>Status:</strong>  {{ ucfirst(Auth::user()->status) }}</p>

                            <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary btn-sm">
                                <i class="fa-solid fa-cogs"></i> Update Profile
                            </a>
                        </div>
                    @elseif(Auth::check() && Auth::user()->isClient())
                        <div class="mt-4 p-3 bg-white rounded shadow-sm">
                            <h4 class="text-success fw-bold"><i class="fa-solid fa-user"></i> Client Details</h4>
                            <p class="text-muted"><strong>Name:</strong> {{ Auth::user()->name }}</p>
                            <p class="text-muted"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                            <p class="text-muted"><strong>Role:</strong> Client</p>
                            <a href="{{ route('profile.edit') }}" class="btn btn-outline-success btn-sm">
                                <i class="fa-solid fa-clipboard-list"></i> Update Profile
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
