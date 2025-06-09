@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($assignedValue && count($assignedValue))
                @foreach ($assignedValue as $data)
                    <div class="card mb-4 border-0 shadow-lg rounded-4 text-center">
                        <div class="card-header text-white fw-bold rounded-top-4 py-3"
                            style="background: linear-gradient(90deg, #142850, #27496d); font-size: 1.5rem;">
                            🔹 Assigned Value 🔹
                        </div>
                        <div class="card-body bg-light rounded-bottom-4 p-4">
                            <h4 class="card-title fw-bold text-dark">{{ $data->unique_value }}</h4>
                            <p class="card-text text-secondary mt-2">
                                <strong>Assigned on:</strong>
                                {{ $data->created_at?->format('d M Y') ?? 'N/A' }}
                            </p>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-info text-center fw-semibold p-3">
                    No value assigned yet.
                </div>
            @endif
        </div>
    </div>
</div>

@endsection
