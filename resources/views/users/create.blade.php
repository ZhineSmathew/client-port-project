@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Create Users') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.store') }}">
                            @csrf
                            <div class="mt-2">
                                <label>User Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                    placeholder="Enter name" autocomplete="off">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-2">
                                <label>Email address</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                    placeholder="Enter email" autocomplete="off">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-2">
                                <label>Select User Type</label>
                                <select name="user_type" class="form-control" placeholder="Select User Type">
                                    <option value="" disabled selected>-- Select User Type --</option>
                                    @foreach ($userTypes as $type)
                                        <option value="{{ $type }}" {{ old('user_type') == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                                    @endforeach
                                </select>
                                @error('user_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-2 position-relative">
                                <label>Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter new password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                               
                            </div>

                            <div class="d-flex justify-content-start gap-2 mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('users.index') }}" class="btn btn-secondary">← Back</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
