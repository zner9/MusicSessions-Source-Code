<?php

namespace App\Http\Controllers;

use App\Models\AttendanceStudent;
use App\Models\StudentInstrument;
use App\Models\StudentPayment;
use App\Models\StudentSchedule;
use App\Models\StudentSchedule2;
use App\Models\StudentTeacher;
use App\Models\TeacherSchedule;
use App\Models\TeacherSchedule2;
use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HeaderController extends Controller
{
    public function about_MusicSessions()
    {
        return view('students.about');
    }

    public function rates()
    {
        return view('students.rates');
    }

    public function instruments()
    {
        return view('students.instruments');
    }

    public function instrument_final()
    {
        return view('students.instrument_final');
    }

    public function profile_schedules()
    {
        $user = Auth::user();
        $schedules = $user->student_schedules->where('student_id', $user->id);
        $schedules2 = $user->student_schedules2->where('student_id', $user->id);
        return view('students.profile_schedules', compact('schedules', 'schedules2'));
    }

    public function profile()
    {
        $user = Auth::user();
        $payments = $user->student_payments->where('student_id', $user->id);
        $instruments = $user->student_instruments->where('student_id', $user->id);
        $levels = $user->student_payments->where('student_id', $user->id);
        $teachers = $user->student_teachers->where('student_id', $user->id);
        return view('students.profile', compact('user', 'payments', 'instruments', 'levels', 'teachers'));
    }

    public function edit_profile()
    {
        $user = Auth::user();
        $payments = $user->student_payments->where('student_id', $user->id);
        $instruments = $user->student_instruments->where('student_id', $user->id);
        $levels = $user->student_payments->where('student_id', $user->id);
        $teachers = $user->student_teachers->where('student_id', $user->id);
        return view('students.profile_show', compact('user', 'payments', 'instruments', 'levels', 'teachers'));
    }

    public function inbox()
    {
        $user = Auth::user();
        $teachers = $user->student_teachers->where('student_id', $user->id);
        return view('students.profile_inbox', compact('user', 'teachers'));
    }

    public function inbox_who()
    {
        $validated = request()->validate('tea');
        return redirect()->route('student.inbox.show');
    }
    public function inbox_show()
    {
        $user = Auth::user();
        $teachers = $user->student_teachers->where('student_id', $user->id);
        return view('students.profile_inbox_show', compact('user', 'teachers'));
    }

    public function update_profile()
    {
        $validated = request()->validate([
            'first_name' => 'string',
            'last_name' => 'string',
            'address' => 'string',
            'age' => 'integer',
            'contact' => 'string|min:11|max:11',
        ]);

        $user = Auth::user();
        $email = $user->email;

        User::updateOrCreate(
            ['email' => $email],
            [
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'age' => $validated['age'],
                'address' => $validated['address'],
                'contact' => $validated['contact'],
            ],
        );
        return redirect()->route('student.profile');
    }

    public function create()
    {
        // Validate the incoming request data
        $validated = request()->validate([
            'instrument' => 'string|required',
        ]);

        // Retrieve the authenticated user's ID
        $userId = auth()->id();

        // Use updateOrCreate to either update an existing record or create a new one
        StudentInstrument::updateOrCreate(
            // Attributes to find the record
            ['student_id' => $userId],
            // Data to update or create
            ['instrument' => $validated['instrument'] ?? ''],
        );

        return redirect()->route('student.teachers');
    }

    public function teachers()
    {
        $students = Auth::user();
        $studentInstrument = $students->student_instruments->sortByDesc('created_at')->first();
        $teachers = User::all();
        $teachers_schedules = TeacherSchedule::all();

        return view('students.teachers', compact('students', 'teachers_schedules', 'teachers', 'studentInstrument'));
    }

    public function teachers_create()
    {
        $userId = auth()->id();
        $validated = request()->validate([
            'teacher' => 'string|required',
        ]);

        StudentTeacher::updateOrCreate(
            // Attributes to find the record
            ['student_id' => $userId],
            // Data to update or create
            ['teacher' => $validated['teacher'] ?? ''],
        );

        return redirect()->route('student.schedules');
    }

    public function schedules()
    {
        $students = Auth::user();
        $studentTeacher = $students->student_teachers->sortByDesc('created_at')->first();
        $teachers = User::all();
        $teachers_schedules = TeacherSchedule::all();
        $teachers_schedules2 = TeacherSchedule2::all();
        return view('students.schedules', compact('students', 'teachers_schedules', 'teachers', 'studentTeacher', 'teachers_schedules2'));
    }

    public function schedules_create()
    {
        $validated = request()->validate([
            'm1' => 'string',
            'm2' => 'string',
            'm3' => 'string',
            'm4' => 'string',
            'm5' => 'string',
            'm6' => 'string',
            'm7' => 'string',
            'm8' => 'string',
            'm9' => 'string',
            'm10' => 'string',
            'm11' => 'string',
            'm12' => 'string',

            't1' => 'string',
            't2' => 'string',
            't3' => 'string',
            't4' => 'string',
            't5' => 'string',
            't6' => 'string',
            't7' => 'string',
            't8' => 'string',
            't9' => 'string',
            't10' => 'string',
            't11' => 'string',
            't12' => 'string',

            'w1' => 'string',
            'w2' => 'string',
            'w3' => 'string',
            'w4' => 'string',
            'w5' => 'string',
            'w6' => 'string',
            'w7' => 'string',
            'w8' => 'string',
            'w9' => 'string',
            'w10' => 'string',
            'w11' => 'string',
            'w12' => 'string',
        ]);

        $validated2 = request()->validate([
            'th1' => 'string',
            'th2' => 'string',
            'th3' => 'string',
            'th4' => 'string',
            'th5' => 'string',
            'th6' => 'string',
            'th7' => 'string',
            'th8' => 'string',
            'th9' => 'string',
            'th10' => 'string',
            'th11' => 'string',
            'th12' => 'string',

            'f1' => 'string',
            'f2' => 'string',
            'f3' => 'string',
            'f4' => 'string',
            'f5' => 'string',
            'f6' => 'string',
            'f7' => 'string',
            'f8' => 'string',
            'f9' => 'string',
            'f10' => 'string',
            'f11' => 'string',
            'f12' => 'string',

            's1' => 'string',
            's2' => 'string',
            's3' => 'string',
            's4' => 'string',
            's5' => 'string',
            's6' => 'string',
            's7' => 'string',
            's8' => 'string',
            's9' => 'string',
            's10' => 'string',
            's11' => 'string',
            's12' => 'string',
        ]);

        $user = auth()->user();

        StudentSchedule::updateOrCreate(
            ['student_id' => $user->id],
            [
                'm1' => $validated['m1'] ?? 'close',
                'm2' => $validated['m2'] ?? 'close',
                'm3' => $validated['m3'] ?? 'close',
                'm4' => $validated['m4'] ?? 'close',
                'm5' => $validated['m5'] ?? 'close',
                'm6' => $validated['m6'] ?? 'close',
                'm7' => $validated['m7'] ?? 'close',
                'm8' => $validated['m8'] ?? 'close',
                'm9' => $validated['m9'] ?? 'close',
                'm10' => $validated['m10'] ?? 'close',
                'm11' => $validated['m11'] ?? 'close',
                'm12' => $validated['m12'] ?? 'close',

                't1' => $validated['t1'] ?? 'close',
                't2' => $validated['t2'] ?? 'close',
                't3' => $validated['t3'] ?? 'close',
                't4' => $validated['t4'] ?? 'close',
                't5' => $validated['t5'] ?? 'close',
                't6' => $validated['t6'] ?? 'close',
                't7' => $validated['t7'] ?? 'close',
                't8' => $validated['t8'] ?? 'close',
                't9' => $validated['t9'] ?? 'close',
                't10' => $validated['t10'] ?? 'close',
                't11' => $validated['t11'] ?? 'close',
                't12' => $validated['t12'] ?? 'close',

                'w1' => $validated['w1'] ?? 'close',
                'w2' => $validated['w2'] ?? 'close',
                'w3' => $validated['w3'] ?? 'close',
                'w4' => $validated['w4'] ?? 'close',
                'w5' => $validated['w5'] ?? 'close',
                'w6' => $validated['w6'] ?? 'close',
                'w7' => $validated['w7'] ?? 'close',
                'w8' => $validated['w8'] ?? 'close',
                'w9' => $validated['w9'] ?? 'close',
                'w10' => $validated['w10'] ?? 'close',
                'w11' => $validated['w11'] ?? 'close',
                'w12' => $validated['w12'] ?? 'close',
            ],
        );

        StudentSchedule2::updateOrCreate(
            ['student_id' => $user->id],
            [
                'th1' => $validated2['th1'] ?? 'close',
                'th2' => $validated2['th2'] ?? 'close',
                'th3' => $validated2['th3'] ?? 'close',
                'th4' => $validated2['th4'] ?? 'close',
                'th5' => $validated2['th5'] ?? 'close',
                'th6' => $validated2['th6'] ?? 'close',
                'th7' => $validated2['th7'] ?? 'close',
                'th8' => $validated2['th8'] ?? 'close',
                'th9' => $validated2['th9'] ?? 'close',
                'th10' => $validated2['th10'] ?? 'close',
                'th11' => $validated2['th11'] ?? 'close',
                'th12' => $validated2['th12'] ?? 'close',

                'f1' => $validated2['f1'] ?? 'close',
                'f2' => $validated2['f2'] ?? 'close',
                'f3' => $validated2['f3'] ?? 'close',
                'f4' => $validated2['f4'] ?? 'close',
                'f5' => $validated2['f5'] ?? 'close',
                'f6' => $validated2['f6'] ?? 'close',
                'f7' => $validated2['f7'] ?? 'close',
                'f8' => $validated2['f8'] ?? 'close',
                'f9' => $validated2['f9'] ?? 'close',
                'f10' => $validated2['f10'] ?? 'close',
                'f11' => $validated2['f11'] ?? 'close',
                'f12' => $validated2['f12'] ?? 'close',

                's1' => $validated2['s1'] ?? 'close',
                's2' => $validated2['s2'] ?? 'close',
                's3' => $validated2['s3'] ?? 'close',
                's4' => $validated2['s4'] ?? 'close',
                's5' => $validated2['s5'] ?? 'close',
                's6' => $validated2['s6'] ?? 'close',
                's7' => $validated2['s7'] ?? 'close',
                's8' => $validated2['s8'] ?? 'close',
                's9' => $validated2['s9'] ?? 'close',
                's10' => $validated2['s10'] ?? 'close',
                's11' => $validated2['s11'] ?? 'close',
                's12' => $validated2['s12'] ?? 'close',
            ],
        );

        return redirect()->route('student.rates');
    }

    public function payments()
    {
        return view('students.payments');
    }

    public function payments_create()
    {
        $validated = request()->validate([
            'payment_method' => 'required|string',
            'amount' => 'integer|required|min:3',
            'reference' => 'required|string',
            'student_level' => 'required|string',
        ]);

        StudentPayment::create([
            'payment_method' => $validated['payment_method'],
            'amount' => $validated['amount'],
            'reference' => $validated['reference'],
            'student_level' => $validated['student_level'],
            'student_id' => auth()->user()->id,
        ]);

        return redirect()->route('auth.dashboard');
    }

    public function pay_again()
    {
        return view('students.pay_again');
    }

    public function pay_againCreate()
    {
        $validated = request()->validate([
            'payment_method' => 'required|string',
            'amount' => 'integer|required|min:3',
            'reference' => 'required|string',
            'student_level' => 'required|string',
        ]);

        StudentPayment::create([
            'payment_method' => $validated['payment_method'],
            'amount' => $validated['amount'],
            'reference' => $validated['reference'],
            'student_level' => $validated['student_level'],
            'student_id' => auth()->user()->id,
        ]);

        $user = Auth::user();

        User::where('id', $user->id)->update(['payment_status' => 'unpaid']);

        return redirect()->route('auth.dashboard');
    }

    public function attendance()
    {
        $user = Auth::user();
        $teacherAttendances = $user->attendanceStudent->where('student_id', $user->id)->sortByDesc('created_at');
        $attendances = $user->attendance_student->where('student_id', $user->id)->sortByDesc('created_at');
        return view('students.attendance', compact('user', 'attendances', 'teacherAttendances'));
    }

    public function attendanceShow()
    {
        $user = Auth::user();
        $teacherAttendances = $user->attendanceStudent->where('student_id', $user->id)->sortByDesc('created_at');
        $attendances = $user->attendance_student->where('student_id', $user->id)->sortByDesc('created_at');
        return view('students.attendance_show', compact('user', 'attendances', 'teacherAttendances'));
    }

    public function attendanceUpdate()
    {
        $user = Auth::user();
        $teachers = $user->student_teachers->where('student_id', $user->id);
        $peoples = User::all();
        $teacherID = null;

        foreach ($peoples as $people) {
            if ($people->is_teacher) {
                foreach ($teachers as $teacher) {
                    if ($people->first_name == $teacher->teacher) {
                        $teacherID = $people->id;
                        break 2;
                    }
                }
            }
        }


        
        // Validate the request data
        $validated = request()->validate([
            'date' => 'required|date',
            'day' => 'required|string',
            'time' => 'required|string',
        ]);

        // Create the attendance record
        AttendanceStudent::create([
            'student_id' => $user->id,
            'teacher_id' => $teacherID, // Assign the teacher ID
            'date' => $validated['date'],
            'day' => $validated['day'],
            'time' => $validated['time'],
        ]);

        return redirect()->route('student.attendance');
    }
}
