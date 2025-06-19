@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Attendance</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Student -->
            <div class="mb-3">
                <label for="student_id" class="form-label">Student *</label>
                <select name="student_id" id="student_id" class="form-select" required>
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}" {{ $attendance->student_id == $student->id ? 'selected' : '' }}>
                            {{ $student->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Subject -->
            <div class="mb-3">
                <label for="subject_id" class="form-label">Subject *</label>
                <select name="subject_id" id="subject_id" class="form-select" required>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}" {{ $attendance->subject_id == $subject->id ? 'selected' : '' }}>
                            {{ $subject->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Date -->
            <div class="mb-3">
                <label for="attendance_date" class="form-label">Attendance Date *</label>
                <input type="date" name="attendance_date" class="form-control"
                    value="{{ old('attendance_date', $attendance->attendance_date) }}" required>
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label for="status" class="form-label">Status *</label>
                <select name="status" class="form-select" required>
                    <option value="present" {{ $attendance->status == 'present' ? 'selected' : '' }}>Present</option>
                    <option value="absent" {{ $attendance->status == 'absent' ? 'selected' : '' }}>Absent</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
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
