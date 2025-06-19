

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Teachers</h1>
    <a href="{{ route('teachers.create') }}" class="btn btn-primary mb-3">Add New Techer</a>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $teacher)
            <tr>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->email }}</td>
                <td>{{ $teacher->phone }}</td>
                <td>{{ $teacher->description }}</td>
                <td>
                    <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure want to delete this subject?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach

            @if($teachers->isEmpty())
            <tr>
                <td colspan="4" class="text-center">No subjects found.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
