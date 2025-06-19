@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Attendance</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('attendances.store') }}" method="POST">
            @csrf

            <!-- Student Dropdown -->
            <div class="mb-3">
                <label for="student_id" class="form-label">Student *</label>
                <select name="student_id" id="student_id" class="form-select" required>
                    <option value="">Select Student</option>
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                    @endforeach
                </select>
            </div>


            <!-- Subject Dropdown (Initially Disabled) -->
            <div class="mb-3">
                <label for="subject_id" class="form-label">Subject *</label>
                <select name="subject_id" id="subject_id" class="form-select" required readonly>
                    <option value="">Select Student First</option>
                </select>
            </div>


            <!-- Date -->
            <div class="mb-3">
                <label for="attendance_date" class="form-label">Attendance Date *</label>
                <input type="date" class="form-control" name="attendance_date" id="attendance_date"
                    value="{{ old('attendance_date', date('Y-m-d')) }}" required>
            </div>

            <!-- Status Dropdown -->
            <div class="mb-3">
                <label for="status" class="form-label">Status *</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="present">Present</option>
                    <option value="absent">Absent</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Save Attendance</button>
            <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

 <!-- JavaScript to handle dynamic subject dropdown based on selected student -->
    <script>
        const students = @json($students);

        document.getElementById('student_id').addEventListener('change', function() {
            const studentId = this.value;
            const subjectDropdown = document.getElementById('subject_id');
            subjectDropdown.innerHTML = '';

            const student = students.find(s => s.id == studentId);

            if (student && student.subject) {
                const option = document.createElement('option');
                option.value = student.subject.id;
                option.text = student.subject.name;
                subjectDropdown.appendChild(option);
                subjectDropdown.removeAttribute('readonly');
            } else {
                const option = document.createElement('option');
                option.value = '';
                option.text = 'No subject found';
                subjectDropdown.appendChild(option);
                subjectDropdown.setAttribute('readonly', true);
            }
        });
    </script>

@endsection
