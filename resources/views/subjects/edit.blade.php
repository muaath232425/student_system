@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Teachers</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name *</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $subject->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="code" class="form-label">Code *</label>
            <input type="text" class="form-control" name="code" id="code" value="{{ old('code', $subject->code) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description (Optional)</label>
            <textarea class="form-control" name="description" id="description">{{ old('description', $subject->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Subject</button>
        <a href="{{ route('subjects.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
