<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentInstrument;
use App\Models\StudentPayment;
use App\Models\StudentSchedule;
use App\Models\StudentSchedule2;
use App\Models\StudentTeacher;
use App\Models\TeacherSchedule;
use App\Models\TeacherSchedule2;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $instruments = StudentInstrument::all();
        return view('students.dashboard', compact('users', 'instruments'));
    }

    public function payments()
    {
        $users = User::all();
        return view('admins.payments', compact('users'));
    }

    public function students()
    {
        $selectedInstrument = request()->get('search', '');

        $usersQuery = User::where('is_teacher', 0)->where('is_admin', 0)->where('payment_status', 'paid');

        $instruments = StudentInstrument::all();

        $teachers = StudentTeacher::all();

        if ($selectedInstrument !== '') {
            $filteredUserIds = $instruments->where('instrument', $selectedInstrument)->pluck('student_id')->toArray();

            $usersQuery->whereIn('id', $filteredUserIds);
        }

        $users = $usersQuery->paginate(8); //

        return view('admins.students', compact('users', 'selectedInstrument', 'instruments', 'teachers'));
    }

    public function update(User $user)
    {
        $user->payment_status = 'paid';
        $user->update();

         // Sum the payments for the current user
        $totalPayments = StudentPayment::where('student_id', $user->id)->sum('amount');

        // Update the total_payments column in the users table
        User::where('id', $user->id)->update(['total_payments' => $totalPayments]);

        $teachers = User::all();
        $schedules = TeacherSchedule::all();
        $schedules2 = TeacherSchedule2::all();
        $student_schedules = StudentSchedule::all();
        $student_schedules2 = StudentSchedule2::all();

        $studentTeacher = $user->student_teachers->sortByDesc('created_at')->first();
        foreach ($teachers as $teacher) {
            if ($teacher->is_teacher) {
                if ($studentTeacher->teacher == $teacher->first_name) {
                    $id = $teacher->id;
                }
            }
        }

        if ($user->payment_status == 'paid') {
            foreach (['m1', 'm2', 'm3', 'm4', 'm5', 'm6', 'm7', 'm8', 'm9', 'm10', 'm11', 'm12', 't1', 't2', 't3', 't4', 't5', 't6', 't7', 't8', 't9', 't10', 't11', 't12', 'w1', 'w2', 'w3', 'w4', 'w5', 'w6', 'w7', 'w8', 'w9', 'w10', 'w11', 'w12'] as $key) {
                foreach ($schedules as $schedule) {
                    if ($schedule->teacher_id == $id);
                    foreach ($student_schedules as $student_schedule) {
                        if ($student_schedule->student_id == $user->id) {
                            if ($schedule->$key == $student_schedule->$key) {
                                TeacherSchedule::where('teacher_id', $id)->update([$key => 'Reserved']);
                            }
                        }
                    }
                }
            }
        }

        if ($user->payment_status == 'paid') {
            foreach (['th1', 'th2', 'th3', 'th4', 'th5', 'th6', 'th7', 'th8', 'th9', 'th10', 'th11', 'th12', 'f1', 'f2', 'f3', 'f4', 'f5', 'f6', 'f7', 'f8', 'f9', 'f10', 'f11', 'f12', 's1', 's2', 's3', 's4', 's5', 's6', 's7', 's8', 's9', 's10', 's11', 's12'] as $key) {
                foreach ($schedules2 as $schedule2) {
                    if ($schedule2->teacher_id == $id);
                    foreach ($student_schedules2 as $student_schedule2) {
                        if ($student_schedule2->student_id == $user->id) {
                            if ($schedule2->$key == $student_schedule2->$key) {
                                TeacherSchedule2::where('teacher_id', $id)->update([$key => 'Reserved']);
                            }
                        }
                    }
                }
            }
        }

        return redirect()->route('admin.payments')->with('verified', 'Student Payment Successful');
    }

    public function teachers()
    {
        $teachers = User::all();
        $instruments = TeacherSchedule::all();
        return view('admins.teachers', compact('teachers', 'instruments'));
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('admin.payments')->with('delete', 'Delete Successful!');
    }
}
