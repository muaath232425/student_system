

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Teachers</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('teachers.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name *</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email *</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"
                    required>
            </div>


            <div class="mb-3">
                <label for="phone" class="form-label">Phone *</label>
                <input type="number" class="form-control" name="phone" id="phone" value="{{ old('phone') }}"
                    required>
            </div>


            <div class="mb-3">
                <label for="description" class="form-label">Description (Optional)</label>
                <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Add Teacher</button>
            <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection

