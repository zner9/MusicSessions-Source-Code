<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'teacher_id',
        'date', 'day', 'time',
        'Udate', 'Uday', 'Utime',
        'Tdate', 'Tday', 'Ttime',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
