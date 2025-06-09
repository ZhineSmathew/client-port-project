@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Edit Value') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('assign.update', $assignedData->id) }}">
                            @csrf
                             @method('PUT')
                                <div class="mt-2">
                                    <label>Text box</label>
                                    <input type="text" class="form-control" name="value" value="{{ $assignedData->unique_value }}"
                                        placeholder="Enter any text or number" autocomplete="off">
                                    @error('value')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <h5 class="mb-2">User Lists:</h5>
                                   <div class="mb-3">
                                        <label for="user_list" class="form-label">Select Users</label>
                                        <select name="user_list[]" id="user_list" class="form-select" multiple>
                                            @foreach ($userList as $lists)
                                                <option value="{{ $lists->id }}"
                                                    {{ $assignedData->users->pluck('id')->contains($lists->id) ? 'selected' : '' }}>
                                                    {{ ucfirst($lists->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('user_list')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            <div class="d-flex justify-content-start gap-2 mt-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('assign.index') }}" class="btn btn-secondary">← Back</a>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
