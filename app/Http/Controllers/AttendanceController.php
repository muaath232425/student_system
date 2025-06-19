<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon; // Top of controller
class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendances = Attendance::with(['student', 'subject'])->latest()->get();
        return view('attendances.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::with('subject')->get(); // subject eager load
        return view('attendances.create', compact('students'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'attendance_date' => 'required|date',
            'status' => 'required|in:present,absent',
        ]);

        // 🔁 Convert to Sri Lanka Date
        $attendanceDate = Carbon::parse($request->attendance_date)
            ->setTimezone('Asia/Colombo')
            ->toDateString(); // eg: 2025-06-18

        // ✅ Check if already marked
        $exists = Attendance::where('student_id', $request->student_id)
            ->where('subject_id', $request->subject_id)
            ->where('attendance_date', $attendanceDate)
            ->exists();

        if ($exists) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['duplicate' => '📌 This student\'s attendance for this subject is already marked for today (Sri Lanka Date).']);
        }

        // ✅ Store attendance
        Attendance::create([
            'student_id' => $request->student_id,
            'subject_id' => $request->subject_id,
            'attendance_date' => $attendanceDate,
            'status' => $request->status,
        ]);

        return redirect()->route('attendances.index')->with('success', '✅ Attendance saved (Sri Lanka Date)');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {

        $students = Student::with('subject')->get();
        $subjects = Subject::all();
        return view('attendances.edit', compact('attendance', 'students', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'attendance_date' => 'required|date',
            'status' => 'required|in:present,absent',
        ]);

        $attendance->update([
            'student_id' => $request->student_id,
            'subject_id' => $request->subject_id,
            'attendance_date' => $request->attendance_date,
            'status' => $request->status,
        ]);

        return redirect()->route('attendances.index')->with('success', 'Attendance updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendances.index')->with('success', 'Attendance deleted successfully.');
    }
}
