@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Assign Value To Users') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('assign.store') }}">
                            @csrf
                            @csrf
                            <div class="mt-2">
                                <label>Text box</label>
                                <input type="text" class="form-control" name="value" value="{{ old('value') }}"
                                    placeholder="Enter any text or number" autocomplete="off">
                                @error('value')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                                <div class="mt-3">
                                    <label for="user_list" class="form-label">Select Users</label>
                                    <select name="user_list[]" id="user_list" class="form-select" multiple>
                                        @foreach ($userList as $lists)
                                            <option value="{{ $lists->id }}"
                                                {{ isset($assignedData) && $assignedData->users->pluck('id')->contains($lists->id) ? 'selected' : '' }}>
                                                {{ ucfirst($lists->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user_list')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            <div class="d-flex justify-content-start gap-2 mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('assign.index') }}" class="btn btn-secondary">← Back</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
