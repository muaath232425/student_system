@extends('layouts.app')

@section('content')
    <style>
        .welcome-banner {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 20px;
            padding: 60px 30px;
            color: white;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
        }

        .welcome-banner h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .welcome-banner p {
            font-size: 1.2rem;
            margin-top: 10px;
        }

        .circle-effect {
            position: absolute;
            border-radius: 50%;
            opacity: 0.2;
            background: white;
            z-index: 0;
        }

        .circle-1 {
            width: 200px;
            height: 200px;
            top: -50px;
            left: -50px;
        }

        .circle-2 {
            width: 300px;
            height: 300px;
            bottom: -100px;
            right: -100px;
        }
    </style>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                toastr.success('{{ session('success') }}', 'Success');
            });
        </script>
    @endif

    <div class="container mt-5">
        <div class="welcome-banner position-relative">
            <div class="circle-effect circle-1"></div>
            <div class="circle-effect circle-2"></div>
            <h1>🎓 Welcome to Student Attendance Management</h1>
            <p>Manage students, subjects and attendance records easily with our system.</p>
        </div>
    </div>
@endsection
