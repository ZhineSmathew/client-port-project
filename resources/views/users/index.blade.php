@extends('layouts.app')

@section('content')
    @auth
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">{{ __('Client Users Lists') }}</div>

                        <div class="card-body">
                            <a href="{{ route('users.create') }}" class="btn btn-primary mb-3"> Create Users</a>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">User Type</th>
                                        <th class="text-center" scope="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <button class="btn btn-success">{{ ucfirst($user->user_type) }}</button>
                                            </td>
                                            <td>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('users.edit', $user->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this user?')">
                                                        Delete
                                                    </button>
                                                    
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
    @guest
        <h1 class="text-3xl font-bold text-center">User Section is Experted </h1>
    @endguest
@endsection
