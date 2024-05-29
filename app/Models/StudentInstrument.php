<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInstrument extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'instrument'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
