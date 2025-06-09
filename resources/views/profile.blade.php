@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Update Profile</div>

                    <div class="card-body">
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- Email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" id="email" name="email" class="form-control" 
                                    value="{{ old('email', Auth::user()->email) }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Phone --}}
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" id="phone" name="phone" class="form-control" 
                                    value="{{ old('phone', Auth::user()->phone) }}">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div class="mb-3">
                                <label for="password" class="form-label">New Password</label>
                               <div class="input-group" style="max-width: 300%;">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                    <div class="input-group-text">
                                        <input type="checkbox" onclick="password.type = this.checked ? 'text' : 'password'" title="Show Password">
                                    </div>
                                </div>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Confirm Password --}}
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                            </div>

                            {{-- Profile Image --}}
                            <div class="mb-3">
                                <label for="image" class="form-label">Profile Image</label>
                                <input type="file" id="profile_image" name="profile_image" class="form-control">
                                @if (Auth::user()->profile_image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" 
                                            alt="Profile" class="img-thumbnail" width="100">
                                    </div>
                                @endif
                                @error('profile_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Submit --}}
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
