@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Subjects</h1>
        <a href="{{ route('subjects.create') }}" class="btn btn-primary mb-3">Add New Subject</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $subject)
                    <tr>
                        <td>{{ $subject->name }}</td>
                        <td>{{ $subject->code }}</td>
                        <td>{{ $subject->description }}</td>
                        <td>
                            <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form id="deleteRecord-{{ $subject->id }}" action="{{ route('subjects.destroy', $subject->id) }}"
                                method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm" type="button"
                                    onclick="confirmDelete({{ $subject->id }})">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if ($subjects->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center">No subjects found.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>


    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteRecord-' + id).submit();
                }
            });
        }
    </script>
@endsection
