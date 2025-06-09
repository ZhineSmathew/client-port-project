@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Edit User') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mt-2">
                                <label>User Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}"
                                    placeholder="Enter name" autocomplete="off">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-2">
                                <label>Role:</label>
                                <select name="user_type" class="form-control">
                                    @foreach ($userTypes as $type)
                                        <option value="{{ $type }}" {{ $user->user_type == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-start gap-2 mt-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('users.index') }}" class="btn btn-secondary">← Back</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
