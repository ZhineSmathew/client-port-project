@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Assign Value to Users') }}</div>

                    <div class="card-body">
                        <a href="{{ route('assign.create') }}" class="btn btn-primary mb-3"> Assign Users Value</a>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" width="60">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Assigned Users</th>
                                    <th class="text-center" width="250px" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($assignedValues as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->unique_value }}</td>
                                        <td>
                                            @if ($data->users->count())
                                                <ul class="mb-0">
                                                    @foreach ($data->users as $user)
                                                        <li>{{ $user->name }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <span class="text-muted">No users assigned</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('assign.destroy', $data->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('assign.edit', $data->id) }}" class="btn btn-primary">Edit</a>
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this Value?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">
                                            <div class="text-center mb-0">
                                                No assigned values found.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
