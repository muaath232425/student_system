@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Attendance Records</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    toastr.success('{{ session('success') }}', 'Success');
                });
            </script>
        @endif


        <a href="{{ route('attendances.create') }}" class="btn btn-primary mb-3">+ Add Attendance</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Student</th>
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($attendances as $attendance)
                    <tr>
                        <td>{{ $attendance->id }}</td>
                        <td>{{ $attendance->student->name }}</td>
                        <td>{{ $attendance->subject->name }}</td>
                        <td>{{ $attendance->attendance_date }}</td>
                        <td>
                            <span class="badge bg-{{ $attendance->status === 'present' ? 'success' : 'danger' }}">
                                {{ ucfirst($attendance->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('attendances.edit', $attendance->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No attendance records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
