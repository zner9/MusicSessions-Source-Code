<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Schedule;
use App\Models\StudentSchedule;
use App\Models\StudentSchedule2;
use App\Models\StudentTeacher;
use App\Models\TeacherSchedule;
use App\Models\TeacherSchedule2;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GeneralController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('students.dashboard', compact('user'));
    }

    public function schedules(User $user)
    {
        $user = Auth::user();
        $students = User::all();
        $student_teachers = StudentTeacher::all();
        $student_schedules = StudentSchedule::all();
        $student_schedules2 = StudentSchedule2::all();
        $my_schedule = $user->teacher_schedules->where('teacher_id', $user->id);

        return view('teachers.schedules', compact('user', 'students', 'student_teachers', 'student_schedules', 'my_schedule', 'student_schedules2'));
    }

    public function editSchedule()
    {
        $user = auth()->user();
        $my_schedule = $user->teacher_schedules->where('teacher_id', $user->id);
        $my_schedule2 = $user->teacher_schedules2->where('teacher_id', $user->id);
        return view('teachers.show_schedules', compact('user', 'my_schedule', 'my_schedule2'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('teachers.profile', compact('user'));
    }

    public function edit_profile()
    {
        $user = Auth::user();
        return view('teachers.show_profile', compact('user'));
    }

    public function update_profile(User $user)
    {
        $validated = request()->validate([
            'first_name' => 'string',
            'last_name' => 'string',
            'contact' => 'string|min:11|max:11',
            'age' => 'integer',
            'image' => 'image',
            'address' => 'string',
        ]);

        if (request('image')) {
            $imagePath = request()->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;
            Storage::disk('public')->delete($user->image ?? '');
        }

        $user->update($validated);

        return redirect()->route('teacher.profile');
    }

    public function update()
    {
        $user = auth()->user();

        // Retrieve existing schedule data
        $existingSchedule = TeacherSchedule::where('teacher_id', $user->id)->first();
        $existingSchedule2 = TeacherSchedule2::where('teacher_id', $user->id)->first();

        // Merge the existing data with the new data
        $mergedSchedule = array_merge($existingSchedule ? $existingSchedule->toArray() : [], request()->except('_token', '_method'));
        $mergedSchedule2 = array_merge($existingSchedule2 ? $existingSchedule2->toArray() : [], request()->except('_token', '_method'));

        // Update or create the merged schedule data
        TeacherSchedule::updateOrCreate(['teacher_id' => $user->id], $mergedSchedule);

        TeacherSchedule2::updateOrCreate(['teacher_id' => $user->id], $mergedSchedule2);

        return redirect()->route('teacher.schedules')->with('success', 'Schedule updated successfully');
    }

    public function students()
    {
        $user = Auth::user();
        $students = User::all();
        $student_teachers = StudentTeacher::all();
        $studentIds = StudentTeacher::where('teacher', $user->first_name)->pluck('student_id')->toArray();
        $students = User::whereIn('id', $studentIds)->paginate(8);
        return view('teachers.students', compact('user', 'students', 'student_teachers'));
    }

    public function attendance()
    {
        $user = Auth::user();
        $students = User::all();
        $student_teachers = StudentTeacher::all();
        $schedules = StudentSchedule::all();
        $schedules2 = StudentSchedule2::all();
        $myAttendances = $user->attendance->where('teacher_id', $user->id)->sortByDesc('created_at');
        $attendances = $user->attendance_students->where('teacher_id', $user->id)->sortByDesc('created_at');

        return view('teachers.attendance', compact('user', 'students', 'student_teachers', 'attendances', 'schedules', 'schedules2', 'myAttendances'));
    }

    public function attendanceShow(User $student)
    {
        $user = Auth::user();
        $student_teachers = StudentTeacher::all();

        return view('teachers.attendance_show', compact('user', 'student', 'student_teachers'));
    }

    public function attendanceUpdate()
    {
        $user = Auth::user();

        $validated = request()->validate([
            'student_id' => 'required',
            'date' => 'nullable|date',
            'day' => 'nullable|string',
            'time' => 'nullable|string',

            'Udate' => 'nullable|date',
            'Uday' => 'nullable|string',
            'Utime' => 'nullable|string',

            'Tdate' => 'nullable|date',
            'Tday' => 'nullable|string',
            'Ttime' => 'nullable|string',
        ]);

        Attendance::create([
            'teacher_id' => $user->id,
            'student_id' => $validated['student_id'],
            'date' => $validated['date'],
            'day' => $validated['day'],
            'time' => $validated['time'],

            'Udate' => $validated['Udate'],
            'Uday' => $validated['Uday'],
            'Utime' => $validated['Utime'],

            'Tdate' => $validated['Tdate'],
            'Tday' => $validated['Tday'],
            'Ttime' => $validated['Ttime'],
        ]);

        return redirect()->route('teacher.attendance');
    }
}
