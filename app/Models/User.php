<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     public function attendance() {
        return $this->hasMany(Attendance::class, 'teacher_id', 'id');
    }

    public function attendanceStudent() {
        return $this->hasMany(Attendance::class, 'student_id', 'id');
    }

    public function attendance_student() {
        return $this->hasMany(AttendanceStudent::class, 'student_id', 'id');
    }

    public function attendance_students() {
        return $this->hasMany(AttendanceStudent::class, 'teacher_id', 'id');
    }


    public function teacher_schedules() {
        return $this->hasMany(TeacherSchedule::class, 'teacher_id', 'id');
    }

    public function teacher_schedules2() {
        return $this->hasMany(TeacherSchedule2::class, 'teacher_id', 'id');
    }

    public function student_schedules() {
        return $this->hasMany(StudentSchedule::class, 'student_id', 'id');
    }

    public function my_students() {
        return $this->hasMany(StudentSchedule::class, 'teacher_id', 'id');
    }

    public function student_schedules2() {
        return $this->hasMany(StudentSchedule2::class, 'student_id', 'id');
    }

    public function student_instruments() {
        return $this->hasMany(StudentInstrument::class, 'student_id', 'id');
    }

    public function student_teachers() {
        return $this->hasMany(StudentTeacher::class, 'student_id', 'id');
    }

    public function student_payments() {
        return $this->hasMany(StudentPayment::class, 'student_id', 'id');
    }

    public function getImageURL() {
        if($this->image) {
            return url('storage/'.$this->image);
        }
        return asset('pictures/profile-default.jpg');
    }

    protected $fillable = [
        'image',
        'payment_status',
        'first_name',
        'last_name',
        'address',
        'contact',
        'age',
        'email',
        'password',
        'total_payments'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
