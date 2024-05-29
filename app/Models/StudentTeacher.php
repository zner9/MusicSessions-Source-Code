<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentTeacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'teacher'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
